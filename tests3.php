<?php
    include ("functions.php");
    $caseOne = "260978776397";
    $caseTwo = "260778776397";
    $caseThree = "260968033654";
    $caseFour = "260768033654";
    $caseFive = "260957788774";
    $caseSix = "260757788774";
    $caseSeven = "260998776397";

    $json = json_decode(checkJSONProvider($caseOne));
    $provider = $json->provider;

    echo $caseOne;
    if($provider =="Airtel"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json = json_decode(checkJSONProvider($caseTwo));
    $provider = $json->provider;
    echo $caseTwo;
    if($provider=="Airtel"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json = json_decode(checkJSONProvider($caseThree));
    $provider = $json->provider;
    echo $caseThree;
    if($provider=="MTN"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json = json_decode(checkJSONProvider($caseFour));
    $provider = $json->provider;
    echo $caseFour;
    if($provider=="MTN"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json = json_decode(checkJSONProvider($caseFive));
    $provider = $json->provider;
    echo $caseFive;
    if($provider=="Zamtel"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json = json_decode(checkJSONProvider($caseSix));
    $provider = $json->provider;
    echo $caseSix;
    if($provider=="Zamtel"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json = json_decode(checkJSONProvider($caseSeven));
    $provider = $json->provider;
    echo $caseSeven;
    if($provider=="Unknown"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";
?>