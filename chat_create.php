<?php
session_start();

$ch = curl_init();
echo($_SESSION["user_id"]);
$field = array(
    "user_id" => $_SESSION["user_id"]
);

curl_setopt($ch, CURLOPT_URL,"http://34.101.203.39:2345/chat/create");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = json_decode(curl_exec($ch), true);

curl_close ($ch);

var_dump($server_output);
if($server_output["act_status"]) {
    $_SESSION["chatroom_id"] = $server_output["data"]["chatroom"]["id"];
    $_SESSION["chatroom_room_id"] = $server_output["data"]["chatroom"]["room_id"];
    header('Location: /chat.php');
    exit();
}