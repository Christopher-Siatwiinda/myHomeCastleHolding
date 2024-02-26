<?php
    $status = "Failure";
    $provider = "Airtel";
    $error = $status == "Success" ? "" : "Invalid provider";

    $parameters = array("status" => $status, "provider" => $provider, "error" => $error);
    $json = json_encode($parameters);

    //var_dump($json);

    //This is treated as an object
    $data = json_decode($json);
    //var_dump($data);
    //echo $data->status;

    //
    $data = json_decode($json, true);
    //var_dump($data);
    echo $data["status"]."<br>";
    echo $data["provider"]."<br>";
    echo $data["error"]."<br>";

?>
