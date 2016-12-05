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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure that the register form is calling
    if (isset($_POST['submit_btn'])) {
        // grab all the values
        $club_name = $_POST["club_name_txt"];
        $short_des = $_POST["short_des_txt"];
        $contact_info = $_POST["contact_txt"];
        $location_info = $_POST["location_txt"];
        $long_desc = $_POST["long_desc_txt"];
        $creator_info = $_POST["creator_txt"];
        $bck_img_url = $_POST["bck_img_txt"];
        $header_c_value = $_POST["header_c_txt"];
        $footer_c_value = $_POST["footer_c_txt"];
        $text_c_value = $_POST["text_c_txt"];

        echo $club_name;
        echo $short_des;
        echo $contact_info;
        echo $location_info;
        echo $long_desc;
        echo $creator_info;
        echo $bck_img_url;
        echo $header_c_value;
        echo $footer_c_value;
        echo $text_c_value;

    }
}