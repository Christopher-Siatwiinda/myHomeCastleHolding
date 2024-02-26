<?php
    include("classes2.php");
    
    $data1='{"sessionId":"sess0001", "msisdn":260971234597, "text":"a"}';
    $data2='{"sessionId":"sess0001", "msisdn":260971234597, "text":"1"}';
    $data3='{"sessionId":"sess0002", "msisdn":260971234597, "text":"b"}';
    $question1 = '{"question":"What country has a football team called Chipolopolo?","questionType":"1","answers":[{"a":"Zambia"},{"b":"Congo"}], "rightAnswer":[{"a":"Zambia"}], "allowedTime":"00.00.00", "allowedAttempts":1}';
    $question2 = '{"question":"What country has a football team called Chipolopolo?","questionType":"1","answers":[{"a":"Zambia"},{"b":"Congo"}], "rightAnswer":[{"a":"Zambia"}], "allowedTime":"00.00.00", "allowedAttempts":5}';
    $question3= '{"question":"When did Zambia get its indipendence?","questionType":"2","answers":[{"a":"1994"},{"b":"1964"}], "rightAnswer":"a", "allowedTime":10, "allowedAttempts":1}';  
    
    $history1 = '{"questionId":1, "msisdn":260971234597, "questionStartTime":"10.27.37.", "questionTime":10, "questionsAsked":"1, 5,7", "answersGivenPerQuesAksed":[{"1":"Zambia"}, {"5":"1964"}], "status":"questionAskedP1"}';
    $menu = '{"content":"Welcome to Castle Holding quiz Press", "choices":[{"1":"To Continue"}, {"2":"To Exit"}]}';

    //$userHistory = new UserHistory($history1);
   // $userHistory->storeDB();

    $menuDisplay = new MenuDisplay($menu);
    //var_dump($menu);
    $menuDisplay->storeDB();

    
    //$myRecord = new Record($question1);
    //$myRecord->storeDB();

    //$myRecord = new Record($question2);
    //$myRecord->storeDB();

    //$myRecord = new Record($question3);
    //$myRecord->storeDB();

    //$myRecord->readFromDB();
    //echo $myRecord->showAll();

    
    //$mySession = new Session($data1);
    //$mySession->storeDB();

    //$mySession = new Session($data2);
    //$mySession->storeDB();

    //$mySession = new Session($data3);
    //$mySession->storeDB();

    //$mySession->readDB()
    
    /*var_dump($history1);
    $json = json_decode($history1);
    var_dump($json->questionsAsked);
    var_dump($json->answersGivenPerQuesAksed);*/
    
?>

