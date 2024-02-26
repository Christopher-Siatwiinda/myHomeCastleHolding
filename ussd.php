<?php
    /*include("classes.php");
    $json='{"id":1,"question":"What country has a football team called Chipolopolo?","questionType":"1","answers":[{"a":"Zambia"},{"b":"Congo"}], "rightAnswer":"a", "allowedTime":10, "allowedAttempts":1}';
    
    $record = new Record($json);
    // Reads the variables sent via POST
    $sessionId   = $_POST["sessionId"];  
    $serviceCode = $_POST["serviceCode"];  
    $text = $_POST["text"];
    //This is the first menu screen
    if ( $text == "" ) {
        //$response  = "CON Hi welcome, are you ready to take the quiz? \n";
        $response = "CON Welcome to Castle holding\n ";
        $response .= "1. ".$json->answers->a;
    }
    // Menu for a user who selects '1' from the first menu
    // Will be brought to this second menu screenelse 
    if ($text == "1") {
        $response  = "CON ".$record->showQuestion()."\n ";
        $response .= "1. Table for 2 \n";
        $response .= "2. Table for 4 \n";
        $response .= "3. Table for 6 \n";
        $response .= "4. Table for 8 \n";
    }
    //Menu for a user who selects '1' from the second menu above
    // Will be brought to this third menu screenelse 
    if ($text == "1*1") {
        $response = "CON You are about to book a table for 2 \n";
        $response .= "Please Enter 1 to confirm \n";
    }else if ($text == "1*1*1") {
        $response = "CON Table for 2 cost -N- 50,000.00 \n";
        $response .= "Enter 1 to continue \n";
        $response .= "Enter 0 to cancel";
    }else if ($text == "1*1*1*1") {
        $response = "END Your Table reservation for 2 has been booked";
    }else if ($text == "1*1*1*0") {
        $response = "END Your Table reservation for 2 has been canceled";
    }
    // Menu for a user who selects "2" from the second menu above
    // Will be brought to this fourth menu screenelse 
    if ($text == "1*2") {
        $response = "CON You are about to book a table for 4 \n";
        $response .= "Please Enter 1 to confirm \n";
    }
    // Menu for a user who selects "1" from the fourth menu screenelse 
    if ($text == "1*2*1") {
        $response = "CON Table for 4 cost -N- 150,000.00 \n";
        $response .= "Enter 1 to continue \n";
        $response .= "Enter 0 to cancel";
    }else if ($text == "1*2*1*1") {
        $response = "END Your Table reservation for 4 has been booked";
    }else if ($text == "1*2*1*0") {
        $response = "END Your Table reservation for 4 has been canceled";
    }
    // Menu for a user who enters "3" from the second menu above
    // Will be brought to this fifth menu screenelse 
    if ($text == "1*3") {
        $response = "CON You are about to book a table for 6 \n";
        $response .= "Please Enter 1 to confirm \n";
    }
    // Menu for a user who enters "1" from the fifth menuelse 
    if ($text == "1*3*1") {
        $response = "CON Table for 6 cost -N- 250,000.00 \n";
        $response .= "Enter 1 to continue \n";
        $response .= "Enter 0 to cancel";
    }else if ($text == "1*3*1*1") {
        $response = "END Your Table reservation for 6 has been booked";
    }else if ($text == "1*3*1*0") {
        $response = "END Your Table reservation for 6 has been canceled";
    }
    // Menu for a user who enters "4" from the second menu above
    // Will be brought to this sixth menu screenelse 
    if ($text == "1*4") {
        $response = "CON You are about to book a table for 8 \n";
        $response .= "Please Enter 1 to confirm \n";
    }
    // Menu for a user who enters "1" from the sixth menuelse 
    if ($text == "1*4*1") {
        $response = "CON Table for 8 cost -N- 250,000.00 \n";
        $response .= "Enter 1 to continue \n";
        $response .= "Enter 0 to cancel";
    }else if ($text == "1*4*1*1") {
        $response = "END Your Table reservation for 8 has been booked";
    }else if ($text == "1*4*1*0") {
        $response = "END Your Table reservation for 8 has been canceled";
    }
    //echo response
    header('Content-type: text/plain');
    echo $response;*/
?>