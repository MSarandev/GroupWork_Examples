<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09-Dec-16
 * Time: 1:46 AM
 */

if($_POST['action'] == 'sub_me_now') {
    // get the user ID
    $userID = $_SESSION["userID"];

    echo $userID;
}