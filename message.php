<?php
//require "thread.php";
require "function.php";
connectToMysql();
$ID = $_GET['massageId'];
$text = $db->query("SELECT message FROM wp_bp_messages_messages WHERE thread_id = '$ID'");
if ($text == false) {
    echo "Query error";
    exit();
}
$massages = $text->fetch_all(MYSQLI_ASSOC);
foreach ($massages as $massage) {
    echo "$massage[message]<br><br>";
}
