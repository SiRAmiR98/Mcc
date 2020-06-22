<?php
require "function.php";
connectToMysql();

$threadID = $db->query("SELECT thread_id , sender_id  FROM wp_bp_messages_messages GROUP BY thread_id");
$IDs = $threadID->fetch_all(MYSQLI_ASSOC);
foreach ($IDs as $ID) {
    echo "<td><a href='message.php?massageId=$ID[thread_id]' target='_blank'>$ID[thread_id]</a>
            <br></td>".changeIDtoName($ID['thread_id']);
}
