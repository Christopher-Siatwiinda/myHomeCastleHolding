<?php
    include("config2.php"); // Include the file containing the function definition
    
    class Session {
        private $id;
        private $sessionid;
        Private $msisdn;
        Private $text;

        function __construct($json)
        {
           $json = json_decode($json);
           $this->sessionid = $json->sessionId;
           $this->msisdn = $json->msisdn;
           $this->text = $json->text;
        }

        Function storeDB()
        {
            // Call the function to establish database connection
            $conn = connectToMySQL();

            $sql = "SELECT * FROM session where msisdn = $this->msisdn"; // added quotes around $mySession

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc(); // Fetch the result row
                    $id = $row['id']; // Assuming 'id' is the primary key column of the session table
                    $sql = "UPDATE session SET sessionId='$this->sessionid', enteredText='$this->text' WHERE id = $id";
                } else {
                    $sql = "INSERT INTO session (sessionId, msisdn, enteredText)
                    VALUES ('$this->sessionid', $this->msisdn, '$this->text')";
                }
                if ($conn->query($sql) === TRUE) {
                    return true;
                } else {
                    echo "fail: ". $conn->error;
                }
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
        }

        function getMsisdn(){
            return $this->msisdn;
        }

        function readDB()
        {
            $conn = connectToMySQL();

            $sql = "SELECT msisdn FROM session where msisdn = $this->msisdn";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    return true;

                    /*while ($row = $result->fetch_assoc()) {
                        foreach ($row as $key => $value) {
                            echo $key . ': ' . $value . '<br>';
                        }
                        echo '<br>';
                    }*/
                }
            }
        }
    }


    class Record
    {
        private $id;
        private $question;
        private $questionType;
        private $answers;
        private $rightAnswer;
        private $allowedTime;
        private $allowedAttempts;
        private $questions = [];
        
        function __construct($json)
        {
            $data = json_decode($json);
            if (json_last_error() === 0) {
                // JSON is valid
            }
            $this->question=$data->question??"";
            $this->questionType=$data->questionType??"0";
            $this->answers=$data->answers??"";
            $this->rightAnswer=$data->rightAnswer??"";
            $this->allowedTime=$data->allowedTime??10;
            $this->allowedAttempts=$data->allowedAttempts??2;
        }
        
        function showQuestion()
        {
            return $this->question;
        }
       
        function showAll()
        {
            $allInfor = array("id"=>$this->id, "question"=>$this->question, "questionType"=> $this->questionType, "answer"=>$this->answers, "rightAnswer"=>$this->rightAnswer, "allowedTime" =>$this->allowedTime, "allowedAttempts"=>$this->allowedAttempts);
            return json_encode($allInfor);
        }
        
        Function storeDB()
        {
            if($this->question == ""){
                return;
            }
            // Call the function to establish database connection
            $conn = connectToMySQL();

            $sql = "SELECT * FROM records where question = '$this->question'"; // added quotes around $mySession

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc(); // Fetch the result row
                    $id = $row['id']; // Assuming 'id' is the primary key column of the session table
                    $sql = "UPDATE records SET allowedAttempts = $this->allowedAttempts WHERE id = $id";
                } else {
                    $this->answers = json_encode($this->answers);
                    $this->rightAnswer = json_encode($this->rightAnswer);
                    $sql = "INSERT INTO records (question, questionType, answers, rightAnswer, allowedTime, allowedAttempts)
                    VALUES ('$this->question', '$this->questionType', '$this->answers', '$this->rightAnswer', '$this->allowedTime' + 30, $this->allowedAttempts)";
                }
                if ($conn->query($sql) === TRUE) {
                    return true;
                } else {
                    echo "fail".$conn->error;
                }
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
        }

        function checkQuestType(){
            $types = '{"one":"Multiple Choice", "two":"One word answer", "three":"Yes or No","four":"Explanation"}';
            $json = json_decode($types);
            if($this->questionType == "1"){
                return $json->one;
            }
            if($this->questionType == "2"){
                return $json->two;
            }
            if($this->questionType == "3"){
                return $json->three;
            }
            if($this->questionType == "4"){
                return $json->four;
            }
        }
        
        Function readDB()
        {
            $conn = connectToMySQL();

            $sql = "SELECT * FROM records";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Extract ID from the row
                        $id = $row['id'];
            
                        // Check if the ID already exists in the grouped details array
                        if (!isset($this->questions[$id])) {
                            // If not, initialize an array for this ID
                            $this->questions[$id] = array();
                        }
            
                        // Add all details of this row to the array for this ID
                        foreach ($row as $key => $value) {
                            $this->questions[$id][$key] = $value;
                        }
                    }
                }
            }
            return $this->questions;
        }

        Function readFromDB()
        {
            $conn = connectToMySQL();

            $sql = "SELECT * FROM records";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $this->id=$row['id'];
                        $this->question=$row['question'];
                        $this->questionType=$row['questionType'];
                        $this->answers=$row['answers'];
                        $this->rightAnswer=$row['rightAnswer'];
                        $this->allowedTime=$row['allowedTime'];
                        $this->allowedAttempts=$row['allowedAttempts'];
                    }
                }
            }
        }
    }  

    class UserHistory{
        private $id;
        private $questionId;
        private $msisdn;
        private $quizStartTime;
        private $questionTime;
        private $questionsAsked;
        private $answersGivenPerQuesAksed;
        private $status;

        function __construct($json)
        {
            $json = json_decode($json);
            if (json_last_error() === 0) {
                // JSON is valid
            }
            $this->questionId = $json->questionId??0;
            $this->questionTime = $json->questionTime??0;
            $this->questionsAsked = $json->questionsAsked??"";
            $this->status = $json->status??"";

        }

        function storeDB($msisdn)
        {
            if($this->questionId == 0){
                return;
            }
            // Call the function to establish database connection
            $conn = connectToMySQL();

            $sql = "SELECT * FROM userHistory where msisdn = '$msisdn'";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id = $row['id'];
                    $sql = "UPDATE userHistory SET questionId = $this->questionId, questionTime = '$this->questionTime', questionsAsked = '$this->questionsAsked', status='$this->status' WHERE id = $id";
                } 
                if ($conn->query($sql) === TRUE) {
                    return true;
                } else {
                    echo "fail ".$conn->error;
                }
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
        }

        function storePhoneAndStatus($msisdn, $status)
        {
            if($msisdn == 0){
                return;
            }
            // Call the function to establish database connection
            $conn = connectToMySQL();

            $sql = "SELECT * FROM userHistory where msisdn = $msisdn";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id = $row['id'];
                    $sql = "UPDATE userHistory SET status = $status WHERE id = $id";
                }else {
                    $sql = "INSERT INTO userHistory (msisdn, status)
                        VALUES ($msisdn,'$status')";
                } 

                if ($conn->query($sql) === TRUE) {
                    return true;
                } else {
                    echo "fail ".$conn->error;
                }
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
        }

        function updateStatusDB($msisdn, $status)
        {
            if($msisdn == 0){
                return;
            }
            // Call the function to establish database connection
            $conn = connectToMySQL();

            $sql = "SELECT * FROM userHistory where msisdn = $msisdn";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id = $row['id'];
                    $sql = "UPDATE userHistory SET status = $status WHERE id = $id";
                } 

                if ($conn->query($sql) === TRUE) {
                    return true;
                } else {
                    echo "fail ".$conn->error;
                }
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
        }

        function updateAnswerDB($msisdn, $enteredText, $status)
        {
            if($msisdn == 0){
                return;
            }
            // Call the function to establish database connection
            $conn = connectToMySQL();
            $questionId = 0;
            $qestionsAndAnswers = "";

            $sql = "SELECT * FROM userHistory where msisdn = $msisdn";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $questionId = $row['questionId'];
                    $qestionsAndAnswers = ['answersGivenPerQuesAksed'];
                }
            }

            $answer = "";
            if($qestionsAndAnswers == ""){
                if(!($questionId==0)){
                    $answer = "$questionId:$enteredText, ";
                }else{
                    return;
                }
            }else{
                if(!($questionId == 0)){
                    $answer = $qestionsAndAnswers.$questionId.":".$enteredText.", ";
                }
            }

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id = $row['id'];
                    $sql = "UPDATE userHistory SET status = $status, questionsAndAnswers=$answer WHERE id = $id";
                } 
                
                if ($conn->query($sql) === TRUE) {
                    return true;
                } else {
                    echo "fail ".$conn->error;
                }
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
        }


        function readDB()
        {
            $conn = connectToMySQL();

            $sql = "SELECT * FROM userHistory where msisdn = $this->msisdn";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return $row['status'];
                }
            }
            $conn->close();
        }

        function readDBQA($msisdn)
        {
            $conn = connectToMySQL();

            $sql = "SELECT * FROM userHistory where msisdn = $msisdn";

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return $row['questionsAsked'];
                }
            }
            $conn->close();
        }
    }


    class MenuDisplay {
        private $id = [];
        private $content;
        private $choices;
        private $msisdn;
        private $randomKey;
        
        function __construct($json)
        {
            $json = json_decode($json);
            //var_dump($json);
            if (json_last_error() === 0) {
                // JSON is valid
            }
            
            $this->msisdn = $json->msisdn??0;
            //$this->choices = $json->choices??"";*/
        }
    
        function storeDB()
        {
            if ($this->content == "") {
                return;
            }
    
            // Call the function to establish database connection
            $conn = connectToMySQL();
    
            $sql = "SELECT * FROM menuDisplay WHERE content = '$this->content'";
    
            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id = $row['id'];
                    $sql = "UPDATE menuDisplay SET choices = '$this->choices' WHERE id = $id";
                } else {
                    $this->choices = json_encode($this->choices);
                    $sql = "INSERT INTO menuDisplay (content, choices) VALUES ('$this->content', '$this->choices')";
                }
    
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated/inserted successfully.";
                } else {
                    echo "Error updating/inserting record: " . $conn->error;
                }
            } else {
                echo "Error executing query: " . $conn->error;
            }
    
            $conn->close();
        }
    

        function updateDb($id, $content, $choices)
        {
            
            if ($content == "") {
                return;
            }
    
            // Call the function to establish database connection
            $conn = connectToMySQL();
    
            $sql = "SELECT * FROM menuDisplay WHERE id = '$id'";
    
            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $id = $row['id'];
                    $sql = "UPDATE menuDisplay SET content = '$content', choices = '$choices', status = '' WHERE id = $id";
                }
    
                if ($conn->query($sql) === TRUE) {
                    return true;
                } else {
                    echo "Error updating/inserting record: " . $conn->error;
                }
            } else {
                echo "Error executing query: " . $conn->error;
            }
    
            $conn->close();
        }


        function readDB($id)
        {
          $conn = connectToMySQL();

          $sql = "SELECT * FROM menuDisplay";
          if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                // Store the id from each row into the array
                $this->id[] = $row['id'];
                $this->displayMenu($id);
            }
          }
          $conn->close();
        }

        Function showMenu($id)
        {
        //Select * from menus where ‘id’=$id
        //$content= get the field content
        return $content;
        }

        function displayMenu($id)
        {
            $conn = connectToMySQL();
            $content = "";

            // Flag to check if the ID is found
            $idFound = false;

            // Loop through each ID
            for ($i = 0; $i < count($this->id); $i++) {
                if ($this->id[$i] == $id) {
                    // Set the flag indicating ID is found
                    $idFound = true;

                    if ($id == 4) {
                        // Handle special case for ID 4
                        $status = "";

                        $sql = "SELECT * FROM menuDisplay WHERE id=$id";
                        if ($result = $conn->query($sql)) {
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $status = $row['status'];
                            }
                        }

                        if ($status == "answered") {
                            // Handle if status is "answered"
                            $record = new Record("");
                            $myQuestions = $record->readDB();
                            
                            // Randomly select a key (ID) from $groupedDetails
                            $this->randomKey = array_rand($myQuestions, 1);
                            $this->randomKey = (string) $this->randomKey;

                            $userHistory = new UserHistory("");
                            $questionsAnswered = $userHistory->readDBQA($this->msisdn); 
                            $questionsAnswered = explode(",", $questionsAnswered);

                            // Check if the random ID exists in the array
                            do {
                                if (!in_array($this->randomKey, $questionsAnswered)) {
                                    break;
                                }
                                // If it exists, generate a new random ID
                                $this->randomKey = array_rand($myQuestions, 1); // Your method to generate a random ID
                            } while (in_array($this->randomKey, $questionsAnswered));

                            // Get the details corresponding to the randomly selected key
                            $randomGroupedDetails = $myQuestions[$this->randomKey];
                            
                            // update menu for menu display
                            $this->updateDb($id, $randomGroupedDetails['question'], $randomGroupedDetails['answers']);
                            
                            // add the question id to the list of question asked and answered
                            array_push($questionsAnswered, $randomGroupedDetails["id"]);

                            // Convert the array of questions asked to string for storage in the database
                            $newQuestionsAsked = implode(",", $questionsAnswered);

                            // update user history with the information from the asked question
                            $allInfor = array("questionId"=>$randomGroupedDetails['id'], "questionTime"=>$randomGroupedDetails['allowedTime'], "questionsAsked"=> $newQuestionsAsked, "status"=>"answered");
                            $myQue = json_encode($allInfor);

                            $userHistory = new UserHistory($myQue);
                            $userHistory->storeDB($this->msisdn);
                        }

                    }

                    // No need to continue the loop if the desired ID is found
                    break;
                }
            }

            // If the ID is not found, display an error message
            if (!$idFound) {
                $content = "ID not found.";
            }

            // Fetch and display content based on the ID
            $sql = "SELECT * FROM menuDisplay WHERE id=$id";
            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $content .= $row['content'] . "<br>";
                    // Decode JSON string into associative array
                    $choices = json_decode($row['choices'], true);
                
                    // Check if choices is not null
                    if ($choices !== null) {
                        // Loop through each choice
                        foreach ($choices as $choice) {
                            // Append each choice to content
                            for ($i = 0; $i < count($choice); $i++) {
                                $content .= $i + 1 . " " . $choice[$i];
                                $content .= "<br>";
                            }
                        }
                    }
                }
            }

            // Close the connection
            $conn->close();

            // Output the content
            echo $content;
       }

       
    }
    

?>