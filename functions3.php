<?php
     $url = "https://www.google.com";
     $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL,$url);
           curl_setopt($ch, CURLOPT_HEADER, 1);
    $data = curl_exec($ch);
      curl_close($ch);
    var_dump($data);
?>