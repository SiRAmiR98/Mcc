<?php
require "function.php";
connectToMysql();

$query = "SELECT wp_users.display_name , wp_bp_messages_messages.date_sent , wp_bp_messages_messages.message 
FROM wp_users INNER JOIN wp_bp_messages_messages 
ON wp_users.sender_id = wp_bp_messages_messages.sender_id ORDER BY date_sent";
$result = $db->query($query);
//var_dump($result);
//die();
if ($result == false) {
    echo "Query error";
    exit();
}
$massages = $result->fetch_all(MYSQLI_ASSOC);
foreach ($massages as $massage) {
    echo "$massage[display_name]   <br><br>   $massage[message]  <br><br>   $massage[date_sent] <br>";
}


