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
                    $club_name = "";
                    $short_des = "";
                    $contact_info = "";
                    $location_info = "";
                    $long_desc = "";
                    $creator_info = "";
                    $bck_img_url = "";
                    $header_c_value = "";
                    $footer_c_value = "";
                    $text_c_value = "";
                    $age_group = "";

                    // check if club found
                    $is_404 = 0;

                    // yes, we check for hackers
                    $is_hacker = 0;

                    // THIS IS GET, GET IS SUPER DANGEROUS
                    // Perform ALL the security checks to
                    // protect against SQL Injection
                    // .. .. .. .. .. .. .. .. .. ..

                    // DEFCON 1 - clubID is a number AND ONLY A NUMBER
                    if(ctype_digit($club_ID)){
                        // the id is a digit

                        // let's check the DB for more details

                        // connect to the db
                        include("../core_db_connect.php");

                        // test the conn
                        if ($db->connect_errno) {
                            die ('Connection Failed :' . $db->connect_error);
                        }

                        // prep the query
                        $sql = "SELECT * FROM clubs WHERE clubID = '"
                            .mysqli_real_escape_string($db, $club_ID)."'";
                        //parse as res
                        $result = $db->query($sql);

                        // run the query
                        if (mysqli_query($db, $sql)) {
                            // check the return amount
                            if ($result->num_rows > 0) {
                                // check each entry for dupes
                                while ($row = $result->fetch_assoc()) {
                                    // club exists
                                    // - - - - - -
                                    // Show club name in the title
                                    echo $row['clubname'];

                                    // - - - - - -
                                    // Pass the other values as
                                    $club_name = $row['clubname'];
                                    $short_des = $row['shortDescr'];
                                    $contact_info = $row['contact'];
                                    $location_info = $row['location'];
                                    $long_desc = $row['longDescr'];
                                    $creator_info = $row['creatorID'];
                                    $bck_img_url = $row['backgroundImg'];
                                    $header_c_value = $row['headerImg'];
                                    $footer_c_value = $row['footerC'];
                                    $text_c_value = $row['textC'];
                                    $age_group = $row['age_group'];

                                    // check if bck image is empty
                                    if($bck_img_url == "" || $bck_img_url === ""){
                                        // set to DEF
                                        $bck_img_url = "../CORE_IMG/dark-blue-texture-14411.jpg";
                                    }
                                }
                            } else {
                                // No club found
                                echo "404 - Club Not Found";

                                $is_404 = 1;
                            }
                        } else {
                            // SQL error
                            echo '<script language="javascript">alert("SQL ERROR!")</script>';
                            // echo the error
                            echo mysqli_error($db);
                        }

                        // close the conn
                        $db->close();
                    }else{
                        // SOUND THE ALARM
                        $is_hacker = 1;

                        // echo a failed message - HEX for something
                        echo "59 6f 75 72 20 68 61 63 6b 20 69 73 20
                              62 61 64 20 61 6e 64 20 79 6f 75 20 73 
                              68 6f 75 6c 64 20 66 65 65 6c 20 62 61 64";
                    }
                }
            }
        ?>
    </title>
</head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body style="
<?php
    if($is_hacker == 1){
        echo "background-color: rgb(255, 0, 0);";
    }
?>
">
<div class="HEADER_DIV" id="div_header_slot">
    <!-- DYNAMIC HEADER CODE HERE -->
    <?php echo "<p>Browse all the clubs ".$_SESSION["user_fname"]."</p>";?>
</div>
<div class="MAIN_DIV"
     id="div_main_preview"
     style="
     <?php
     if($is_404 == 0){
        if($is_hacker == 1){
            echo "background-image: url('https://s30.postimg.org/l9l7z3tcx/this1.jpg'); 
            background-color: #000;
            color: #fff;";
        }else if($is_hacker == 0){
            echo "background-image: url('".$bck_img_url."'); 
            background-color: #000;
            color: ".$text_c_value."";
        }
     }
     ?>">
    <div id="preview_head_div" style="
        <?php
            if($is_hacker == 0){
                echo "background-color: ".$header_c_value.";";
            }
        ?>
        ">
        <h2 id="preview_head"
            style="
             <?php
                if($is_hacker == 1){
                    echo "background-image: url('https://s30.postimg.org/l9l7z3tcx/this1.jpg'); 
                    background-color: #000;";
                }
            ?>">
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    if ($is_hacker == 0) {
                        if($is_404 == 0){
                            echo $club_name;
                        }else{
                            echo "404 - Club not found";
                        }
                    } else if ($is_hacker == 1) {
                        // echo a failed message - HEX for something
                        echo "59 6f 75 72 20 68 61 63 6b 20 69 73 20
                              62 61 64 20 61 6e 64 20 79 6f 75 20 73 
                              68 6f 75 6c 64 20 66 65 65 6c 20 62 61 64";
                    }
                }
            ?>
        </h2>
        <hr>
        <h3 id="preview_short">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if ($is_hacker == 0) {
                    echo $short_des;
                } else if ($is_hacker == 1) {
                    // echo a failed message - HEX for something
                    echo "59 6f 75 72 20 68 61 63 6b 20 69 73 20
                              62 61 64 20 61 6e 64 20 79 6f 75 20 73 
                              68 6f 75 6c 64 20 66 65 65 6c 20 62 61 64";
                }
            }
            ?>
        </h3>
    </div>
    <div id="preview_mid_div">
        <p id="preview_contact">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if ($is_hacker == 0) {
                    echo $contact_info;
                } else if ($is_hacker == 1) {
                    // echo a failed message - HEX for something
                    echo "59 6f 75 72 20 68 61 63 6b 20 69 73 20
                              62 61 64 20 61 6e 64 20 79 6f 75 20 73 
                              68 6f 75 6c 64 20 66 65 65 6c 20 62 61 64";
                }
            }
            ?>
        </p>
        <p id="preview_location">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if ($is_hacker == 0) {
                    echo $location_info;
                } else if ($is_hacker == 1) {
                    // echo a failed message - HEX for something
                    echo "59 6f 75 72 20 68 61 63 6b 20 69 73 20
                              62 61 64 20 61 6e 64 20 79 6f 75 20 73 
                              68 6f 75 6c 64 20 66 65 65 6c 20 62 61 64";
                }
            }
            ?></p>
        <br>
        <br>
        <p id="preview_long">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if ($is_hacker == 0) {
                    if($is_404 == 0){
                        echo $long_desc;
                    }else{
                        echo "Club with ID: ".$club_ID." doesn't exist.";
                        echo "<br>";
                        echo "How did you get here anyway??";
                    }
                } else if ($is_hacker == 1) {
                    // echo a failed message - HEX for something
                    echo "59 6f 75 72 20 68 61 63 6b 20 69 73 20
                              62 61 64 20 61 6e 64 20 79 6f 75 20 73 
                              68 6f 75 6c 64 20 66 65 65 6c 20 62 61 64";
                }
            }
            ?>
        </p>
        <hr>
    </div>
    <div id="preview_foot_div" style="
        <?php
            if($is_hacker == 1){
                echo "background-image: url('https://s30.postimg.org/l9l7z3tcx/this1.jpg'); 
                            background-color: #000;";
            }else if($is_hacker == 0){
                echo "background-color: ".$footer_c_value.";";
            }
        ?>">
        <p id="preview_creator">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if ($is_hacker == 0) {
                    echo $creator_info;
                } else if ($is_hacker == 1) {
                    // echo a failed message - HEX for something
                    echo "59 6f 75 72 20 68 61 63 6b 20 69 73 20
                              62 61 64 20 61 6e 64 20 79 6f 75 20 73 
                              68 6f 75 6c 64 20 66 65 65 6c 20 62 61 64";
                }
            }
            ?>
        </p>
    </div>
</div>
<div class="FOOTER_DIV" id="div_footer_slot">
    <!-- DYNAMIC FOOTER CODE HERE -->
    <?php
    echo "Version 1.14 | ";
    include("../__CORE_DOM_Elements/footer.php");
    ?>
</div>
</body>
</html>