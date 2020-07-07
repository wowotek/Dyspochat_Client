<!DOCTYPE html>
<html class="has-background-grey-darker" lang="en">
<?php

include 'intermediate/__config.php';

session_start();

$ch = curl_init();
$field = array(
    "room_id" => $_SESSION["chatroom_room_id"]
);

curl_setopt($ch, CURLOPT_URL, $host . "/chat/get_room_recipient");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = json_decode(curl_exec($ch), true);

curl_close ($ch);

$recipient = $server_output["recipients"];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatroom</title>

    <script defer src="rsc/fontawesome.js"></script>
    <link rel="stylesheet" href="rsc/bulma.css">
    <style>
        * {
            word-wrap: break-word;
        }

        html,
        body {
            overflow: hidden;
            height: 100vh
        }
        
        .msgline {
            margin-bottom: -25px; margin-top: -25px;
        }
        
        .recipient-name {
            font-size: 12px;
        }

        .recipient-holder {
            background-color: #444; border-radius: 5px 5px; padding:.25em; text-align: left; font-family: monospace;
        }

        .sender-holder {
            background-color: #444; border-radius: 5px 5px; padding:.25em; text-align: right; font-family: monospace;
        }
    </style>
</head>
<body style="height: 100vh" onload="register()">
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
                <div class="box has-background-black has-text-success" style="height: 92%; overflow-x: auto; clear: both" id="chatbox">

                <!-- Pesan -->

                </div>
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input class="input" type="text" placeholder="Find a repository" id="message_content" name="message_content">
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
<script>
    var room_id = "<?php echo($_SESSION["chatroom_room_id"]); ?>" ;
    var user_id = <?php echo($_SESSION["user_id"]); ?> ;

    var message_reciever = new WebSocket("ws://127.0.0.1:5678/");    

    message_reciever.onmessage = function (event) {
        // Content Parser
        var message_content = event.data;


        // Content Preparator
        var chatbox = document.getElementById('chatbox');

        var column1 = document.createElement("div");
        column1.className = "column";
        var column2 = document.createElement("div");
        column2.className = "column";

        var recipient_name = document.createElement('i');
        recipient_name.className = "recipient-name";
        recipient_name.innerHTML = "{recipient-other}";

        var msg_content = document.createElement('p');
        msg_content.className = "sender-holder";
        msg_content.innerHTML = message_content;

        var msg_holder = document.createElement('div');
        msg_holder.className = "columns msgline";
        
        column1.appendChild(recipient_name);
        column1.appendChild(msg_content);

        msg_holder.appendChild(column2);
        msg_holder.appendChild(column1);

        chatbox.appendChild(msg_holder);
    };

    var message_sender = new WebSocket("ws://127.0.0.1:5679/");
    function sendMessage(){
        var message_content = {
            "room_id": room_id,
            "user_id": user_id,
            "content": document.getElementById("message_content").value
        };
        console.log(message_content);
        message_sender.send(JSON.stringify(message_content));
    }
</script>
</html>