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
                <h3>Sigh In</h3>
                <span>to continue to Cin.derel.la</span>
            </div>

            <div class="loginForm">
                <form action="signIn.php">
                    <input type="text" name = "username" placeholder="Username" require autocomplete="0ff">
                    <input type="password" name = "password" placeholder="Password" require >
                    <input type="submit" name = "submitButton" value="SUBMIT">
                </form>

            </div>
            <a class="signInMessage" href = "signUp.php">Need an account? Sign up here!</a>
        </div>

    </div>
    </body>

</html>