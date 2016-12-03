<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 6:51 PM
 */

// We have the clubs' IDS and Names stored in the sessions already
// in: $_SESSION["GLOBAL_club_names"] and "GLOBAL_club_ids"

foreach($_SESSION["GLOBAL_club_names"] as $var){
    echo '<script language="javascript">alert("'.$var.'")</script>';
}

foreach($_SESSION["GLOBAL_club_ids"] as $var){
    echo '<script language="javascript">alert("'.$var.'")</script>';
}