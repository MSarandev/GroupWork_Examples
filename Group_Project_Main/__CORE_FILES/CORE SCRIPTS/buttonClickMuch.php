<?php
/**
 * Created by PhpStorm.
 * User: 1406519
 * Date: 05/12/2016
 * Time: 15:40
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure that the register form is calling
    if (isset($_POST['approve_club_btn'])) {
        echo '<script language="javascript">alert("Approving clubs I see")</script>';
    }

    // else
    if (isset($_POST['approve_markers_btn'])) {
        echo '<script language="javascript">alert("Approving markers I see")</script>';
    }
}