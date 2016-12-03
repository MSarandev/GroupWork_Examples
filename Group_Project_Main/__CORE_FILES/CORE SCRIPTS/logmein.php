<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 12:36 AM
 */
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = "";
    $pass = "";

    // check if the user submitted
    if(isset($_POST['submit'])){
        //Check if the fields are empty
        if(isset($_POST['username_field'])){
            if(isset($_POST['pass_field'])){
                // get the username
                $username = $_POST['username_field'];
                // get the pass
                $pass = $_POST['pass_field'];

                // now that we have the details,

            }else{
                echo '<script language="javascript">';
                echo 'alert("Password cannot be empty!")';
                echo '</script>';
            }
        }else{
            echo '<script language="javascript">';
            echo 'alert("Username cannot be empty!")';
            echo '</script>';
        }
    }
}