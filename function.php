<?php

function connectToMysql()
{
    global $db;
    $db = @mysqli_connect('localhost', 'root', '', 'test');
    if ($db === false) {
        echo "MySQL conection error";
    }
    $db->query("SET NAMES 'utf8'");
}
function changeIDtoName ($ID)
{
    global $db;
   $query = "SELECT wp_users.display_name , wp_bp_messages_messages.sender_id  
                FROM wp_users INNER JOIN wp_bp_messages_messages 
                ON wp_users.sender_id = wp_bp_messages_messages.sender_id WHERE thread_id = '$ID'";
   $result = $db -> query($query);
    if ($result == false) {
        echo "Query error";
        exit();
    }
    $names = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($names as $name) {
        echo "$name[display_name]<br>";
    }

}