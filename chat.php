<!DOCTYPE html>
<html class="has-background-grey-darker" lang="en">
<?php session_start();

$ch = curl_init();
$field = array(
    "room_id" => $_SESSION["chatroom_room_id"]
);

curl_setopt($ch, CURLOPT_URL,"http://34.101.203.39:2345/chat/get_room_recipient");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = json_decode(curl_exec($ch), true);

curl_close ($ch);

$recipient = $server_output["recipients"]

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatroom</title>

    <script defer src="jquery.js"></script>
    <script defer src="fontawesome.js"></script>
    <link rel="stylesheet" href="bulma.css">
    <style>
        * {
            word-wrap: break-word;
        }

        html,
        body {
            overflow: hidden;
            height: 100vh
        }
    </style>
</head>
<script>
    function sendMessage() {

    }
</script>

<body style="height: 100vh">
    <div class="columns" style="margin-left: 1%; margin-right: 1%; margin-top: 0.5%">
        <div class="column is-one-quarter">
            <div class="box has-background-grey" style="height: 96vh; padding: 0; box-shadow: 0 0 5px 5px yellow;">
                <figure class="image">
                    <img src="Logo.png">
                </figure>
                <hr style="margin-bottom: 5px; margin-right: 6px; margin-left: 6px; background-color: black">
                <h3 class="title is-3 has-text-centered has-text-warning" style="margin-bottom: 15px">Recipients</h3>
                <?php
                foreach($recipient as $i){
                    echo('<div class="box" style="margin-bottom: 15px; margin-right: 10px; margin-left: 10px; padding: 3%">');
                    echo('<span class="icon is-small is-left" style="margin-right: 5px;"><i class="fas fa-user"></i></span>');
                    echo($i['username']);
                    echo('</div>');
                }
                ?>
                <hr style="margin-right: 6px; margin-left: 6px; background-color: black">
                <h3 class="title is-3 has-text-centered has-text-warning" style="margin-bottom: 15px">Session ID</h3>
                <p class="has-background-white has-text-centered" style="text-align: center"><i><?php echo($_SESSION["chatroom_room_id"]); ?></i></p>
            </div>
        </div>
        <div class="column" style="overflow-y: auto; overflow-x: auto;">
            <div class="box has-background-grey" style="height: 96vh; box-shadow: 0 0 5px 5px red;">
                <div class="box has-background-black has-text-success"
                    style="height: 92%; overflow-x: auto; clear: both">

                    <div class="columns" style="margin-bottom: -25px; margin-top: -25px;">
                        <div class="column"></div>
                        <div class="column">
                            <i style="font-size: 12px;">{recipient-other}</i>
                            <p style="background-color: #444; border-radius: 5px 5px; padding:.25em; text-align: right; font-family: monospace;">
                                ini adalah sebuah pesan dari dia
                            </p>
                        </div>
                    </div>
                    <div class="columns" style="margin-bottom: -25px; margin-top: -25px;">
                        <div class="column">
                            <i style="font-size: 12px;">{recipient-self}</i>
                            <p style="background-color: #444; border-radius: 5px 5px; padding:.25em; text-align: left;">
                                ini adalah sebuah pesan dari dia
                            </p>
                        </div>
                        <div class="column"></div>
                    </div>

                </div>
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input class="input" type="text" placeholder="Find a repository">
                    </div>
                    <div class="control">
                        <button class="button is-success" onclick="sendMessage()">
                            <span>Send</span>
                            <span class="icon is-small">
                                <i class="fas fa-airplane"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>