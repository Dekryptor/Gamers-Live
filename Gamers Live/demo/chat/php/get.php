<?php
error_reporting(0);

$inc_path = $_SERVER['DOCUMENT_ROOT'];
$inc_path .= "/config.php";
include_once($inc_path);include_once("".$conf_site_url."/files/check.php");

$channel_id = $_GET['channel'];

$get_msg = mysql_query("SELECT * FROM chat_msg WHERE channel_id='$channel_id' ORDER BY id") or die(mysql_error());

while($row = mysql_fetch_array($get_msg)){
    $username = $row['sender'];
    $msg = $row['msg'];
    $date = $row['date'];
    $type = $row['type'];
    if($type == "0"){
        $type_msg = " ";
    }
    if($type == "1"){
        $type_msg = " MOD - ";
    }
    if($type == "2"){
        $type_msg = " STAFF - ";
    }
    if($type == "3"){
        $type_msg = " OWNER - ";
    }

    echo '<img src="'.$conf_site_url.'/user/'.$username.'/avatar.png" alt="'.$username.'" height="15" width="15"><i>'.$type_msg.'</i><b><a href="'.$conf_site_url.'/account/channel/chat/ban.php?username='.$username.'&channel='.$channel_id.'" target="_blank" title="'.$date.'">'.$username.'</a></b>: '.$msg.'<br>';
}
exit;
?>