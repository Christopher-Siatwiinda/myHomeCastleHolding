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

    // String numbers
    echo $caseOne;
    if(checkNumber($caseOne)=="Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseTwo;
    if(checkNumber($caseTwo)=="Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseThree;
    if(checkNumber($caseThree)=="Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseFour;
    if(checkNumber($caseFour)=="Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseFive;
    if(checkNumber($caseFive)=="Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    // interger numbers
    echo $caseSix;
    if(checkNumber($caseSix)=="Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseSeven;
    if(checkNumber($caseSeven)=="Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseEight;
    if(checkNumber($caseEight)=="Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseNine;
    if(checkNumber($caseNine)=="Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    // Wrong numbers
    echo $caseTen;
    if(checkNumber($caseTen)=="No"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseEleven;
    if(checkNumber($caseEleven) == "No"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseTwelve;
    if(checkNumber($caseTwelve) == "No"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseThirteen;
    if(checkNumber($caseThirteen) == "No"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    //New trials
    echo $caseFourteen;
    if(checkNumber($caseFourteen) == "No"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseFifteen;
    if(checkNumber($caseFifteen) == "Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseSixteen;
    if(checkNumber($caseSixteen) == "Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseSeventeen;
    if(checkNumber($caseSeventeen) == "Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseEighteen;
    if(checkNumber($caseEighteen) == "Yes"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";
?>
