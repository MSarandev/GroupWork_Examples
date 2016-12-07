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
                                    echo $row['clubname'];
                                }
                            } else {
                                // No club found
                                echo "404 - Club Not Found";
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
    echo "Version 1.6 | ";
    include("../__CORE_DOM_Elements/footer.php");
    ?>
</div>
</body>
</html>