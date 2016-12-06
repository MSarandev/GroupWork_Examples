<?php
/**
 * Created by PhpStorm.
 * User: 1406519
 * Date: 05/12/2016
 * Time: 13:36
 */

session_start();
// !!! Do not add anything above. THE SESSION MUST START

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$vals_ok = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure that the register form is calling
    if (isset($_POST['submit_btn'])) {
        // grab all the values
        $club_name = trim($_POST["club_name_txt"]);
        $short_des = trim($_POST["short_des_txt"]);
        $contact_info = trim($_POST["contact_txt"]);
        $location_info = trim($_POST["location_txt"]);
        $long_desc = trim($_POST["long_desc_txt"]);
        $creator_info = trim($_POST["creator_txt"]);
        $bck_img_url = trim($_POST["bck_img_txt"]);
        $header_c_value = trim($_POST["header_c_txt"]);
        $footer_c_value = trim($_POST["footer_c_txt"]);
        $text_c_value = trim($_POST["text_c_txt"]);
        $age_group = trim($_POST["age_group_txt"]);

        //check if the vals are empty
        if($club_name != "" &&
            $short_des != ""&&
            $contact_info != ""&&
            $location_info != ""&&
            $long_desc != ""&&
            $creator_info != ""&&
            $bck_img_url != ""&&
            $header_c_value != ""&&
            $footer_c_value != ""&&
            $text_c_value != ""&&
            $age_group != ""){

            // values OK, fill in
            $vals_ok = 1;
        }else{
            //echo '<script language="javascript">alert("Check your values")</script>';
        }

        //default the approved to 0
        $approved = 0;

        // check if the user changed the colours
        // DEFs are #000000
        if($header_c_value == "#000000"){
            // default value, set to black
            $header_c_value = "#000000";
        }
        if($footer_c_value == "#000000"){
            // default value, set to black
            $footer_c_value = "#000000";
        }
        if($text_c_value == "#000000"){
            // default value, set to WHITE
            $text_c_value = "#FFFFFF";
        }

        // vals have been checked, proceed with the SQL
        if($vals_ok == 1) {

            // connect to the db
            include("../core_db_connect.php");

            // test the conn
            if ($db->connect_errno) {
                die ('Connection Failed :'.$db->connect_error );
            }

            // create sql query
            try {
                $sql = "INSERT INTO clubs (clubname,
                    creatorID,
                    age_group,
                    contact,
                    location,
                    longDescr,
                    headerImg,
                    backgroundImg,
                    shortDescr,
                    approved) VALUES ('"
                    . mysqli_real_escape_string($db, $club_name) . "','"
                    . mysqli_real_escape_string($db, $creator_info) . "','"
                    . mysqli_real_escape_string($db, $age_group) . "','"
                    . mysqli_real_escape_string($db, $contact_info) . "','"
                    . mysqli_real_escape_string($db, $location_info) . "','"
                    . mysqli_real_escape_string($db, $long_desc) . "','"
                    . mysqli_real_escape_string($db, $header_c_value) . "','"
                    . mysqli_real_escape_string($db, $bck_img_url) . "','"
                    . mysqli_real_escape_string($db, $short_des) . "','"
                    . mysqli_real_escape_string($db, $approved) .
                    "')";

                // attach the query to the conn and run it
                if (mysqli_query($db, $sql)) {
                    // insert OK
                    echo '<script language="javascript">alert("Club submitted for verification. Sit tight");';
                    // reload
                    echo 'window.location = "../CORE_CLUBS/index.php";</script>';
                } else {
                    // SQL error
                    echo '<script language="javascript">alert("SQL ERROR!")</script>';
                    // echo the error
                    echo mysqli_error($db);
                }
            } catch (PDOException $e) {
                // error while adding record
                echo $sql . "<br>" . $e->getMessage();
            }

            // close the conn
            $db->close();
        }else{
            //echo '<script language="javascript">alert("Something in your values is not OK. Try again!")</script>';
            $error_message = "Something in your values is not OK. Try fixing them.";
            trigger_error($error_message, E_USER_ERROR);
        }
    }
}
