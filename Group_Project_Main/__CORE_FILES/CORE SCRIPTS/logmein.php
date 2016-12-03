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
        $username = isset($_POST['username_field']);
        $pass = isset($_POST['pass_field']);

        echo $username;
        echo $pass;
    }
}