<?php
session_start();

include '__config.php';

$ch = curl_init();

$field = array(
    "room_id" => $_POST["room_join_id"],
    "user_id" => $_SESSION["user_id"]
);

curl_setopt($ch, CURLOPT_URL, $host . "/chat/join");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = json_decode(curl_exec($ch), true);

curl_close ($ch);
var_dump($server_output);
if($server_output["act_status"]) {
    $_SESSION["chatroom_room_id"] = $server_output["chatroom"]["room_id"];
    header('Location: /chat.php');
} else {
    header('Location: /action.php?'.$server_output["cause"].'=1');
}
exit();