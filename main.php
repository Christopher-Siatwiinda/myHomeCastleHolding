<?php
  include("functions2.php");

  function mainLoop($data)
  {
    if(mySessionReadDB($data) == true){

      //When the user has already stated the quiz  
      mySessionStoreDB($data);

      $textNum = json_decode($data);
      $enteredText = $textNum->text;
      $msisdn = $textNum->msisdn;

      // Checking for the status of the current user in the database
      $myStatus = myHistoryReadDB($data);

      // Select a menu to display based on the status of the user
      if($myStatus == "init"){
        if($enteredText == ""){
          $status = "continued";
          myUserHistoryStatusUpdate($msisdn, $status); // Status updated to continued
          myMenuDisplayReadDB($data, 1);// Welcome menu is displayed
        }
      }elseif($myStatus == "Continued"){
        if($enteredText == "1"){
          // myUserHistory($msisdn); // Status updated to answered 
          myMenuDisplayReadDB($data, 4); // Menu is with question is displayed
        }elseif($enteredText == "2"){
          $status = "paused";
          myUserHistoryStatusUpdate($msisdn, $status);// Status is updated to paused
          echo "Thank you for exiting"; // giving a menu for goodbye
        }else{
          // The status of the question should be ""
          echo "Invalid input please try again";// for invalid input
        }
      }elseif($myStatus == "answered"){
        if($enteredText == "0"){
          $status = "paused";
          myUserHistoryStatusUpdate($msisdn, $status);// Status is updated to paused
          echo "Thank you for exiting"; // giving a menu for goodbye
        }else{
          $status = "continued";
          myUserHistoryAnswerUpdate($msisdn, $enteredText, $status); // Status updated to continued
          myMenuDisplayReadDB($data, 3); // Menu is with question is displayed
        }
      }elseif($myStatus == "paused"){
        if($enteredText == ""){
          $status = "continued";
          myUserHistoryStatusUpdate($msisdn, $status);// Status is updated to continued
          myMenuDisplayReadDB($data, 2);
        }
      }elseif($myStatus == "finished"){
        myMenuDisplayReadDB($data, 5);
      }
    }else{
      // Create new session whenthe number is new
      mySessionStoreDB($data);

      // Update user history phone number and status
      $msisdn = json_decode($data);
      $msisdn = $msisdn->msisdn;
      $status = "init";
      myUserHistoryUserCreate($msisdn, $status);

      // Recursive mainloop to deal with the statuses
      mainLoop($data);
    }
  }

?>