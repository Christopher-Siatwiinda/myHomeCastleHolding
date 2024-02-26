<?php
    include("functions.php");
    $question1='{"id":1,"question":"What country has a football team called Chipolopolo?","questionType":"1","answers":[{"a":"Zambia"},{"b":"Congo"}], "rightAnswer":"a", "allowedTime":10, "allowedAttempts":1}';  //“answers”:[{“a”:”Zambia”},{”b”:”Congo”}]
    Echo storeRecord($question1);
    echo "<br>";
    $question2='{"id":1,"question":"When did Zambia get its indipendence?","questionType":"2","answers":[{"a":"1994"},{"b":"1964"}], "rightAnswer":"a", "allowedTime":10, "allowedAttempts":1}';  //“answers”:[{“a”:”Zambia”},{”b”:”Congo”}]
    Echo storeRecord($question2);
    echo "<br>";
    $question3='{"id":1,"question":"What is Zambias capital city?","questionType":"1","answers":[{"a":"Livingstone"},{"b":"Lusaka"}], "rightAnswer":"a", "allowedTime":10, "allowedAttempts":1}';  //“answers”:[{“a”:”Zambia”},{”b”:”Congo”}]
    Echo storeRecord($question3);

    //$answers=array("a"=>"Zambia","b"=>"Congo");
    //1/multi 1 answer 2/ mul few answers 3/yes/no 4 /empty
?>