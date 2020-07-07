<?php
include '__config.php';

$ch = curl_init();

$field = array(
    "reg_username" => $_POST["reg_username"],
    "reg_password" => $_POST["reg_password"]
);

curl_setopt($ch, CURLOPT_URL, $host . "/user/registration");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field));

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

if($server_output["act_status"]) {
    header('Location: /');
    exit();
}