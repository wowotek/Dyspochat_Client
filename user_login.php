<?php

$ch = curl_init();

$field = array(
    "log_username" => $_POST["log_username"],
    "log_password" => $_POST["log_password"]
);

curl_setopt($ch, CURLOPT_URL,"http://34.101.203.39:2345/user/login");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field));

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = json_decode(curl_exec($ch), true);

curl_close ($ch);

if($server_output["act_status"]) {
    session_start();
    $_SESSION["user_id"] = $server_output["user"]["id"];
    $_SESSION["user_name"] = $server_output["user"]["username"];
    header('Location: /action.php');
} else {
    header('Location: /');
}
exit();