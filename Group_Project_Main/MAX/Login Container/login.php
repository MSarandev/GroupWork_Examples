<!DOCTYPE html>
<html lang="en">
<head>
    <!--

    FLIP CODE: http://pingmin-tech.com/flipcardjs

    -->
    <meta charset="UTF-8">
    <title>Login Card Flip</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
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
        <form>
            <img src="https://s21.postimg.org/wap8gtk1j/logo_blue.png"
                 id="logo_img"/>
            <br>
            <br>
            <label class="generic_label"
                   id="front_label1">Username</label>
            <br>
            <input class="generic_txt_input"
                   id="front_text1"
                   type="text"/>
            <br>
            <label class="generic_label"
                   id="front_label2">Password</label>
            <br>
            <input class="generic_txt_input"
                   id="front_text2"
                   type="password">
            <br>
            <br>
            <input class="btn" type="submit">
        </form>
        <button class="btn" onclick="rotate()">Register</button>
    </div>
    <div class="back">
        <!-- REGISTER FORM -->
        <form>
            <label class="top_label">Register here</label>
            <br>
            <br>
            <label class="generic_label">First Name</label>
            <br>
            <input class="generic_txt_input" type="text"/>
            <br>
            <label class="generic_label">Surname</label>
            <br>
            <input class="generic_txt_input" type="text"/>
            <br>
            <label class="generic_label">Email</label>
            <br>
            <input class="generic_txt_input" type="text"/>
            <br>
            <label class="generic_label">Username</label>
            <br>
            <input class="generic_txt_input" type="text"/>
            <br>
            <label class="generic_label">Password</label>
            <br>
            <input class="generic_txt_input" type="password"/>
            <br>
            <label class="generic_label">Password - repeat</label>
            <br>
            <input class="generic_txt_input" type="password"/>
            <br>
            <label class="generic_label">Security Question</label>
            <br>
            <input class="generic_txt_input" list="questions">
            <datalist id="questions">
                <option value="What was the make of your first car?">
                <option value="What is your favourite phone?">
                <option value="What was your first postcode?">
                <option value="What was the name of your first pet?">
            </datalist>
            <br>
            <label class="generic_label">Security Answer</label>
            <br>
            <input class="generic_txt_input" type="text"/>
            <br>
            <br>
            <input class="btn" type="submit">
        </form>
        <button class="btn" onclick="rotate()">Back To Login</button>
    </div>
</div>
</body>
</html>