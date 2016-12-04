<?php
session_start();
// !!!!!!!!!!
// DO NOT ADD ANY CODE ABOVE. THE SESSION MUST START
// !!!!!!!!!!
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clubs</title>
    <!-- External CSS + JS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>

    <!-- WAVES FILES BELOW -->

    <link rel="stylesheet" type="text/css" href="../CORE%20WAVES/waves.min.css"/>
    <script type="text/javascript" src="../CORE%20WAVES/waves.min.js"></script>

    <!-- WAVES FILES END   -->
    <!-- JQUERY IMPORT -->
    <!-- VERY IMPORTANT -->
    <script src="../jquery.min.js"></script>
    <!-- JQUERY IMPORT -->
    <!-- VERY IMPORTANT -->

    <!-- AJAX Start -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- AJAX End -->
</head>
<body>
<div class="HEADER_DIV" id="div_header_slot">
    <!-- DYNAMIC HEADER CODE HERE -->
    <?php echo "<p>Ready to create a club ".$_SESSION["user_fname"]."?</p>";?>
</div>

<div class="MAIN_DIV" id="div_main_slot">
    <!-- HOLDS THE SIDEBAR -->
    <div class="MAIN_DIV" id="div_main_sidebar">
        <div>
            <br>
            <!-- Controls -->
            <label class="label_gen">Club Name</label>
            <input class="input_field"
                   type="text"
                   placeholder="Club Name"
                   id="club_name_txt"
                   onkeyup="clubNameChange()"/>
            <br>
            <label class="label_gen">Short Description</label>
            <input class="input_field"
                   type="text"
                   placeholder="Short Description"
                   id="short_des_txt"
                   onkeyup="shortDescChange()"/>
            <br>
            <label class="label_gen">Contact Info</label>
            <input class="input_field"
                   type="text"
                   placeholder="Contact Info"
                   id="contact_txt"
                   onkeyup="contactChange()"/>
            <br>
            <label class="label_gen">Location</label>
            <input class="input_field"
                   type="text"
                   placeholder="Location"
                   id="location_txt"
                   onkeyup="locationChange()"/>
            <br>
            <label class="label_gen">Long Description</label>
            <textarea
                    class="input_field"
                    cols="40"
                    rows="5"
                    placeholder="Long Description"
                    id="long_desc_txt"
                    onkeyup="longDescChange()"></textarea>
            <br>
            <label class="label_gen">Creator</label>
            <br>
            <input class="input_field"
                   type="text"
                   placeholder="Creator"
                   id="creator_txt"
                   onkeyup="creatorChange()"/>
            <br>
            <label class="label_gen">Background Image</label>
            <input class="input_field"
                   type="url"
                   placeholder="Background image"
                   id="bck_img_txt"
                   onkeyup="bckImgChange()"/>
            <br>
            <div id="color_pic_div">
                <label class="label_gen">Header Colour</label>
                <input type="color"
                       placeholder="Header COLOUR"
                       id="header_c_txt"
                       onchange="headCChange()"/>
                <br>
                <label class="label_gen">Footer Colour</label>
                <input type="color"
                       placeholder="Footer COLOUR"
                       id="footer_c_txt"
                       onchange="footCChange()"/>
                <br>
                <label class="label_gen">Text Colour</label>
                <input type="color"
                       placeholder="Text COLOUR"
                       id="text_c_txt"
                       onchange="textCChange()"/>
            </div>
            <br>
            <br>
            <a href=""
               id="preview_submit_btn"
               class="preview_btn"
               onclick="submitMe()">Submit</a>
            <!--
                SO, THE CLEAR BTN IS NOT BEHAVING. WELL THEN

            <a href=""
               id="preview_cancel_btn"
               onclick="clearMe()"
               class="preview_btn">Clear</a>

            -->
        </div>
    </div>
    <!-- HOLDS THE LIVE PREVIEW -->
    <div class="MAIN_DIV" id="div_main_preview">
        <div id="preview_head_div">
            <h2 id="preview_head">Club Name</h2>
            <hr>
            <h3 id="preview_short">Short Description</h3>
        </div>
        <div id="preview_mid_div">
            <p id="preview_contact">Contact info</p>
            <p id="preview_location">Location</p>
            <br>
            <br>
            <p id="preview_long">Long Description</p>
            <hr>
        </div>
        <div id="preview_foot_div">
            <p id="preview_creator">Creator</p>
        </div>
    </div>
</div>

<div class="FOOTER_DIV" id="div_footer_slot">
    <!-- DYNAMIC FOOTER CODE HERE -->
    <?php include("../__CORE_DOM_Elements/footer.php"); ?>
</div>
</body>
</html>