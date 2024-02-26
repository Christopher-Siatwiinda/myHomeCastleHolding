<?php
    include ("functions.php");
    $caseOne = "260978776397";
    $caseTwo = "260778776397";
    $caseThree = "260968033654";
    $caseFour = "260768033654";
    $caseFive = "260957788774";
    $caseSix = "260757788774";
    $caseSeven = "260998776397";

    echo $caseOne;
    if(checkProvider($caseOne)=="Airtel"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseTwo;
    if(checkProvider($caseTwo)=="Airtel"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";
    
    echo $caseThree;
    if(checkProvider($caseThree)=="MTN"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";

    echo $caseFour;
    if(checkProvider($caseFour)=="MTN"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";
    
    echo $caseFive;
    if(checkProvider($caseFive)=="Zamtel"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";
    
    echo $caseSix;
    if(checkProvider($caseSix)=="Zamtel"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";
    
    echo $caseSeven;
    if(checkProvider($caseSeven)=="Unknown"){
        echo " = Test passed!";
    }else{
        echo " = Test failed!";
    }
    echo "<br>";
    
?>