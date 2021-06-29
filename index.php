<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="container">
                <div class="form-group"></br>
                <b>Sign up:</b></br></br>
                Username: <input class="form-control" type="text" id="user" name="user">
                Password: <input class="form-control" type="password" id="password" name="password">
                Repeat Password: <input class="form-control" type="password" name="repeat">
            </div>
            <button type="submit" name="signup" class="">Sign up</button><br/>
            <div class="row" id="printArea"></div>
            </div>
            </form></br></br>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="container">
                <div class="form-group"></br>
                <b>Log in:</b></br></br>
                Username: <input class="form-control" type="text" id="userLogIn" name="userLogIn">
                Password: <input class="form-control" type="password" id="passLogIn" name="passLogIn">
            </div>
            <button type="submit" name="logIn" class="">Log in</button><br/>
            <div class="row" id="printArea2"></div>
            </div>
            </form></br></br>

<?php
    require 'login.php'; 
?>

</body>
</html>