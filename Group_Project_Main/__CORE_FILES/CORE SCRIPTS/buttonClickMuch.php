<?php
/**
 * Created by PhpStorm.
 * User: 1406519
 * Date: 05/12/2016
 * Time: 15:40
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure that the register form is calling
    if (isset($_POST['admin_approve'])) {
        echo '<script language="javascript">alert("Approve")</script>';
    }

    // else
    if (isset($_POST['admin_delete'])) {
        echo '<script language="javascript">alert("Delete")</script>';
    }
}