<?php
include("../CORE SCRIPTS/logmein.php");
// !!!!!!!!!!
// DO NOT ADD ANY CODE ABOVE. THE SESSION MUST START
// !!!!!!!!!!
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--

    FLIP CODE: http://pingmin-tech.com/flipcardjs

    -->
    <meta charset="UTF-8">
    <title>Login Card Flip</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="../jquery.min.js"></script>
    <script>
        // JQUERY CODE TO FLIP THE CARD

        function rotate() {
            $('.card').toggleClass('flipped');
        }
    </script>
</head>
<body>

<div class="card">
    <div class="front">
        <!-- LOGIN FORM -->
        <form action=""
              method="post"
              name="login_form">
            <img src="https://s21.postimg.org/wap8gtk1j/logo_blue.png"
                 id="logo_img"/>
            <label class="generic_label"
                   id="front_label1">Username</label>
            <input class="generic_txt_input"
                   id="front_text1"
                   type="text"
                   name="username_field"
                   placeholder="Username"/>
            <label class="generic_label"
                   id="front_label2">Password</label>
            <input class="generic_txt_input"
                   id="front_text2"
                   name="pass_field"
                   type="password"
                   placeholder="*****">
            <input name="submit_login" type="submit" class="btn"/>
        </form>
        <button class="btn" onclick="rotate()">Register</button>
    </div>
    <div class="back">
        <!-- REGISTER FORM -->
        <form action=""
              method="post"
              name="register_form">
            <label class="top_label">Register here</label>
            <br>
            <br>
            <label class="generic_label">First Name</label>
            <input class="generic_txt_input"
                   type="text"
                   name="first_name_txt"/>
            <label class="generic_label">Surname</label>
            <input class="generic_txt_input"
                   type="text"
                   name="last_name_txt"/>
            <label class="generic_label">Email</label>
            <input class="generic_txt_input"
                   type="text"
                   name="email_txt"/>
            <label class="generic_label">Username</label>
            <input class="generic_txt_input"
                   type="text"
                   name="username_txt"/>
            <label class="generic_label">Password</label>
            <input class="generic_txt_input"
                   type="password"
                   name="password_txt"/>
            <label class="generic_label">Password - repeat</label>
            <input class="generic_txt_input"
                   type="password"
                   name="password_txt_2"/>
            <label class="generic_label">Security Question</label>
            <select id="questions"
                      name="sec_q_txt">
                <option value="What was the make of your first car">
                    What was the make of your first car
                </option>
                <option value="What is your favourite phone">
                    What is your favourite phone
                </option>
                <option value="What is your favourite colour">
                    What is your favourite colour
                </option>
                <option value="What was the name of your first pet">
                    What was the name of your first pet
                </option>
            </select>
            <label class="generic_label">Security Answer</label>
            <input class="generic_txt_input"
                   type="text"
                   name="sec_a_txt"/>
            <input class="btn" type="submit" name="submit_register">
        </form>
        <button class="btn" onclick="rotate()">Back To Login</button>
    </div>
</div>
</body>
</html>