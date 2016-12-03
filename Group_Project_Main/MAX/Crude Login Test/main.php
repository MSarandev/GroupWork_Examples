<?php
include("logmein.php");
// !!!!!!!!!!
// DO NOT ADD ANY CODE ABOVE. THE SESSION MUST START
// !!!!!!!!!!
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Card Flip</title>
</head>
<body>
<div class="card">
    <div class="front">
        <!-- LOGIN FORM -->
        <form method="post">
            <input name="user" type="text">
            <input name="pass" type="password">
            <input name="submit" type="submit" value="Submit"/>
        </form>
    </div>
</div>
</body>
</html>
