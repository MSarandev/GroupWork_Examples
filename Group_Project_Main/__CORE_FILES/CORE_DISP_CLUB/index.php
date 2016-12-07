<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['cid'])) {
                    // fetch the club ID
                    $club_ID = $_GET['cid'];


                    // THIS IS GET, GET IS SUPER DANGEROUS
                    // Perform ALL the security checks to
                    // protect against SQL Injection
                    // .. .. .. .. .. .. .. .. .. ..

                    // DEFCON 1 - clubID is a number AND ONLY A NUMBER
                    if(ctype_digit($club_ID)){
                        // the id is a digit

                        echo $club_ID;
                    }else{
                        // echo a failed message - HEX for something
                        echo "596f7572206861636b2069732062616420616420796f752073686f756c64206665656c20626164";
                    }
                }
            }
        ?>
    </title>
</head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body>
<div class="HEADER_DIV" id="div_header_slot">
    <!-- DYNAMIC HEADER CODE HERE -->
    <?php echo "<p>Browse all the clubs ".$_SESSION["user_fname"]."</p>";?>
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
    echo "Version 1.5 | ";
    include("../__CORE_DOM_Elements/footer.php");
    ?>
</div>
</body>
</html>