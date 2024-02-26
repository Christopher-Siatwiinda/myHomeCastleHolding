<?php
    include("classes2.php");

    // Session functions
    function mySessionReadDB($data){
        $session = new Session($data);
        return $session->readDB();
    }

    function mySessionStoreDB($data){
        $session = new Session($data);
        return $session->storeDB();
    }

    // UserHistory functions
    function myHistoryReadDB($data){
        $userHistory = new UserHistory($data);
        return $userHistory->readDB();
    }

    function myHistoryStoreDB($data){
        $userHistory = new UserHistory($data);
        return $userHistory->storeDB();
    }

    function myUserHistoryStatusUpdate($msisdn, $status){
        $userHistory = new UserHistory("");
        return $userHistory->updateStatusDB($msisdn, $status);
    }

    function myUserHistoryAnswerUpdate($msisdn, $enteredText, $status){
        $userHistory = new UserHistory("");
        return $userHistory->updateStatusDB($msisdn, $enteredText, $status);
    }

    function myUserHistoryUserCreate($msisdn, $status){
        $userHistory = new UserHistory("");
        return $userHistory->storePhoneAndStatus($msisdn, $status);
    }

    // Menu display 
    function myMenuDisplayReadDB($data, $menuId){
        $menuDisplay = new MenuDisplay($data);
        $menuDisplay->readDB($menuId);
    }
    
    /*function myDisplayMenu(){
        $menuDisplay = new MenuDisplay();
        return $menuDisplay->displayMenu(1, myMenuDisplayReadDB()); // Assuming you want to display menu with id 1
    }*/
?>