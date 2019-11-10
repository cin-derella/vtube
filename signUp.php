<?php require_once("includes/config.php");?>
<!DOCTYPE html>
<html>
    <head>
        <title>VideoTube</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link  rel = "stylesheet" type = "text/css" href ="assets/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="signInContainer">
        <div class="column">
            <div class="header">
                <h2>Cin.derel.la<img src="assets/images/icons/video.png" title = "logo" alt = "Site logo"></h2>
                <h3>Sigh Up</h3>
                <span>to continue to Cin.derel.la</span>
            </div>

            <div class="loginForm">
                <form action="signUp.php" method = "POST">
                    <input type="text" name = "firstName" placeholder = "First name" autocomplete = "off" required>
                    <input type="text" name = "lastName" placeholder = "Last name" autocomplete = "off" required>
                    <input type="text" name = "username" placeholder = "Username" autocomplete = "off" required>

                    <input type="email" name = "email" placeholder = "Email" autocomplete = "off" required>
                    <input type="email2" name = "email2" placeholder = "Confirm email" autocomplete = "off" required>

                    <input type="password" name = "password" placeholder = "Password" autocomplete = "off" required>
                    <input type="password2" name = "password2" placeholder = "Confirm password" autocomplete = "off" required>

                    <input type="submit" name="submitButton" value="SUBMIT">
                </form>

            </div>
            <div class="signInMessage" href = "signIn.php">Already have an account? Sign in here!</div>
        </div>

    </div>
    </body>

</html>