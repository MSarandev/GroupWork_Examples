<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body>
<div class="HEADER_DIV" id="div_header_slot">
    <!-- DYNAMIC HEADER CODE HERE -->
    <?php echo "<p>Ready to create a club ".$_SESSION["user_fname"]."?</p>";?>
</div>
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
<div class="FOOTER_DIV" id="div_footer_slot">
    <!-- DYNAMIC FOOTER CODE HERE -->
    <?php
    echo "Version 2.3 | ";
    include("../__CORE_DOM_Elements/footer.php");
    ?>
</div>
</body>
</html>