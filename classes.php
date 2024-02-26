<?php
    include("testmysql.php");
    class Record
    {
        private $id;
        private $question;
        private $questionType;
        private $answers;
        private $rightAnswer;
        private $allowedTime;
        private $allowedAttempts;
        
        function __construct($json)
        {
            $data = json_decode($json);
            $this->id=$data->id;
            $this->question=$data->question;
            $this->questionType=$data->questionType;
            $this->answers=$data->answers;
            $this->rightAnswer=$data->rightAnswer;
            $this->allowedTime=$data->allowedTime??10;
            $this->allowedAttempts=$data->allowedAttempts;
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
            // Call the function to establish database connection
            $conn = connectToMySQL();

            $mySession = "Test project";

            $sql = "SELECT * FROM session where  = '$mySession'"; // added quotes around $mySession

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc(); // Fetch the result row
                    $id = $row['id']; // Assuming 'id' is the primary key column of the session table
                    $sql = "UPDATE session SET text='Record Updated' WHERE id = $id";
                } else {
                    $sql = "INSERT INTO session (question, questionType, answers, rightAnswer, allowedTime, allowAttempts)
                    VALUES ('$this->question', '$this->questionType', '$this->answers', '$this->rightAnswer', '$this->allowedTime', $this->allowedAttempts)";
                }
                if ($conn->query($sql) === TRUE) {
                    echo "ok";
                } else {
                    echo "fail";
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
            
        }
    }  
    
    class Session
    {
        private $id;
        private $sessionid;
        Private $msisdn;
        Private $text;

        function __construct($json)
        {
            //log($json);
            //log("fff");
        }

        Function storeDB()
        {
            
        }

        
        Function readDB()
        {
            
        }
    }

    class UserHistory
    {
        private $id;
        private $mobile;
        function __construct($mobile)
        {

        }

        Function storeDB()
        {
            
        }
        Function readDB()
        {

        }

    }

    Class MenuDisplay
    {
        //private
        Function _construct($json)
        {
        }
        Function storeDB()
        {
        }
        Function ReadDB()
        {
        }
        Function showMenu($id)
        {
        //Select * from menus where ‘id’=$id
        //$content= get the field content
        return $content;
        }
        Function displayMenu($id)
        {
        // Select * from menus where ‘id’=$id
        //$content= get the field content
        return $this->id .$this->content.$this->notes;
        }

    }
?>