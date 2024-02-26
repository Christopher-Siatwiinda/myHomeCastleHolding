<?php
    echo time();
    echo "<br>";
    echo $today = date("Y-m-d H:i:s");  
    echo "<br>";
    echo  gmdate("y m d H:i:s");  
    echo "<br>";
    echo strtotime("now");
    echo "<br>";

    /*$mobile = "260971234567";
    $json = json_decode(checkJSONProvider($mobile));
    var_dump($json);
    echo "<br>";
    echo $json->provider;
    echo "<br>";

    $json = json_decode(checkJSONProvider($mobile), true);
    var_dump($json);
    echo "<br>";
    echo $json["provider"];
    echo "<br>";*/
    
    //https://www.epochconverter.com/

?>