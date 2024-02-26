<?php
include ("main.php");

$data1='{"sessionId":"sess003","msisdn":260971234597,"text":""}';
$menu = '{"content":"Welcome to Castle Holding quiz Press", "choices":[{"1":"To Continue"}, {"2":"To Exit"}]}';
$userHistory='{"rec":[{"myPhone":260971234567},{"questionsAttempted":7},{"status":"pending"}], "recs":[{"myPhone":260971234597},{"questionsAttempted":20},{"status":"complete"}]}';

 mainLoop($data1);
?>