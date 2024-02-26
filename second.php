<?php
    //variable declaration
    $mob = "+20049839";
    $b = 968033;
    $x = "+260968033654";
    $y = "xxxxxxxxxxxxx";
    $z = 968033654;

    // all the functions
    function myFun($data){
       if(strlen($data) == 13){
        $data = (int) $data;
        if(is_numeric($data) && (strlen($data) == 12 || strlen($data) == 9)){
            
        }
       }
        
    }
 
    // print streams
    var_dump($mob);
    echo "<br>";
    $mob = (int) $mob;
    var_dump($mob); 

    // fuunction calls
    myFun();
?>