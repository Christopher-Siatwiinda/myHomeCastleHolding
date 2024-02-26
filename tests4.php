<?php
    include ("functions.php");

    $caseOne = "+260978776397";
    $caseTwo = "+260778776397";
    $caseThree = "0968033654";
    $caseFour = "768033654";
    $caseFive = "260957788774";

    $caseSix = 260978776397;
    $caseSeven = 260778776397;
    $caseEight = 968033654;
    $caseNine = 768033654;

    $caseTen = "xxxxxxxxxx";
    $caseEleven = 957788;
    $caseTwelve = "";
    $caseThirteen = "26097xxxxxxx";

    $caseFourteen = null;
    $caseFifteen = "(260) 978776397";
    $caseSixteen = "(+260) 978776397";
    $caseSeventeen = "(260) 97 8776397";
    $caseEighteen = "(260) 97-877-6397";

    $json=json_decode(checkJSONMobile($caseOne));
    $provider= $json->provider;
    $status=$json->status;

    echo $caseOne;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel"))
    {
        echo " = Test passed!";

    }else{
        echo " = Test failed!";
    }
    echo "<br>";


    $json=json_decode(checkJSONMobile($caseTwo));
    $provider= $json->provider;
    $status=$json->status;

    echo $caseTwo;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel"))
    {
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";


    $json=json_decode(checkJSONMobile($caseThree));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseThree;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";


    $json=json_decode(checkJSONMobile($caseThree));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseFour;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";


    $json=json_decode(checkJSONMobile($caseFive));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseFive;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";


    $json=json_decode(checkJSONMobile($caseSix));
    $provider= $json->provider;
    $status=$json->status;
    // interger numbers
    echo $caseSix;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";


     $json=json_decode(checkJSONMobile($caseSeven));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseSeven;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json=json_decode(checkJSONMobile($caseEight));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseEight;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";


    $json=json_decode(checkJSONMobile($caseNine));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseNine;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json=json_decode(checkJSONMobile($caseTen));
    $provider= $json->provider;
    $status=$json->status;
    // Wrong numbers
    echo $caseTen;
    if($status=="failure"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json=json_decode(checkJSONMobile($caseEleven));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseEleven;
    if($status=="failure"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";


    $json=json_decode(checkJSONMobile($caseTwelve));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseTwelve;
    if($status=="failure"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";


    $json=json_decode(checkJSONMobile($caseThirteen));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseThirteen;
    if($status=="failure"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";


    $json=json_decode(checkJSONMobile($caseFourteen));
    $provider= $json->provider;
    $status=$json->status;
    //New trials
    echo $caseFourteen;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json=json_decode(checkJSONMobile($caseFifteen));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseFifteen;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json=json_decode(checkJSONMobile($caseSixteen));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseSixteen;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    
    $json=json_decode(checkJSONMobile($caseSeventeen));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseSeventeen;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    $json=json_decode(checkJSONMobile($caseEighteen));
    $provider= $json->provider;
    $status=$json->status;
    echo $caseEighteen;
    if($status=="success" && ($provider=="Airtel" || $provider=="MTN" || $provider=="Zamtel")){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";
?>