<?php
    include("functions.php");
    

    $case1='{"transaction":{"status_code":"TS","code":"DP008001001","airtel_money_id":"MP230602.0207.L31766","id":"vIvPmMYi1H","message":"Txn. ID : MP230602.0207.L31766. Payment of ZMW 98.00 to CB ZAMBIA, Till Number CB ZAMBIA is successful. Your Airtel Money balance is ZMW 0.14"}}';

    $case2='{"transaction":{"status_code":"TF","code":"DP008001013","id":"fwkjbUc7Gz","message":"Transaction id is invalid"}}';

    $case3='{"transaction":{"status_code":"TF","code":"DP008001021","airtel_money_id":"MP230602.0409.M32734","id":"mEZSIMQoNX","message":"Dear Customer, Transaction Failed with TXN Id : MP230602.0409.M32734, Dear Customer, you have insufficient funds to complete this transaction. Kindly top up and try again. Thank you.. Please try again later. Thank you."}}';

    $case4='{"transaction":{"status_code":"TF","code":"DP008001023","airtel_money_id":"MP230602.2012.N05081","id":"LsdoPZE2jn","message":"The Pin you have entered is incorrect. Please type your correct four digit Pin. 5 unsuccessful attempts will lock your account. Dial *115# option 6 then option 1 for forgotten PIN"}}';
    
    echo checkTransaction($case1);
    echo "<br>";
    echo checkTransaction($case2);
    echo "<br>";
    echo checkTransaction($case3);
    echo "<br>";
    echo checkTransaction($case4);

?>