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

// grab all the values
$club_name = $_POST["club_name_txt"];
$short_des = $_POST["short_des_txt"];
$contact_info = $_POST["contact_txt"];
$location_info = $_POST["location_txt"];
$long_desc = $_POST["long_desc_txt"];
$creator_info = $_POST["creator_txt"];
$bck_img_url = $_POST["bck_img_txt"];