<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 9:56 PM
 */

// fetch the access level from the session
$user_a_lvl = $_SESSION["user_ac_lvl"];

// check to see if the user is an admin
if($user_a_lvl != 0 && $user_a_lvl > 1){
    // the user is an admin
    // generate the divs
    echo "<div id='admin_div_panel'>";
    echo "<button type='button'>BTN1</button>";
    echo "</div>";
}