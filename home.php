<!DOCTYPE html>
<html class="has-background-grey-darker" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>

    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
</head>

<body style="margin-left: 10%; margin-right: 10%;">
    <figure class="image" style="margin-left: 25%; margin-right: 25%; margin-bottom: 15px; margin-top: 15px">
        <img src="Logo.png" style=" border-radius: 25px;">
    </figure>
    <div class="columns">
        <div class="column">
            <div class="box" style="background-color: black">
                <h2 class="title has-text-centered has-text-warning">
                    Registration
                </h2>
                <hr>
                <form action="registration" method="POST">
                    <div class="field">
                        <label class="label has-text-warning is-4">Username</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input has-background-grey has-text-white" type="text" minlength="6"
                                maxlength="16" size="16" pattern="[A-Za-z0-9]{6,16}" name="reg_username">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-warning is-4">Secure Password</label>
                        <p class="control has-icons-left">
                            <input class="input has-background-grey has-text-white" type="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="" name="reg_password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            <p class="help is-danger">Must contain at least one number and one uppercase and lowercase
                                letter, and at least 8 or more characters</p>
                        </p>
                    </div>
                    <br>

                    <div class="field has-addons has-addons-right">
                        <p class="control">
                            <input type="submit" class="button is-danger" value="Sign Me Up">
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="column">
            <div class="box" style="background-color: black">
                <h2 class="title has-text-centered has-text-warning">
                    Login
                </h2>
                <hr>
                <form action="login" method="POST">
                    <div class="field">
                        <label class="label has-text-warning is-4">Username</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input has-background-grey has-text-white" type="text" minlength="6"
                                maxlength="16" size="16" pattern="[A-Za-z0-9]{6,16}" name="log_username">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-warning is-4">Password</label>
                        <p class="control has-icons-left">
                            <input class="input has-background-grey has-text-white" type="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="" name="log_password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            <p class="help is-danger">Must contain at least one number and one uppercase and lowercase
                                letter, and at least 8 or more characters</p>
                        </p>
                    </div>
                    <br>

                    <div class="field has-addons has-addons-right">
                        <p class="control">
                            <input type="submit" class="button is-danger" value="Sign Me Up">
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>