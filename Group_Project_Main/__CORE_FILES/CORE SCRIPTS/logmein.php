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

                // now that we have the details, connect to the DB

                // Connect to the DB
                include("../core_db_connect.php");

                // test our connection
                if ($db->connect_errno) {
                    die ('Connection Failed :'.$db->connect_error );
                }

                // form the sql query
                $sql = "SELECT username, pass FROM USERLOGIN WHERE username LIKE '$username' AND pass LIKE '$pass'";

                // run the query
                if(mysqli_query($db, $sql)){
                    // show clubs
                    header("location: ../CORE_CLUBS/index.php");
                }else{
                    echo '<script language="javascript">alert("NO DATA FOUND!")</script>';

                    echo mysqli_error($db);

                    // re-load login
                    //header("location: ../CORE_LOGIN/login.php");
                }

                // close the conn
                $db->close();
            }
        }
    }
}