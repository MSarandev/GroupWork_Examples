<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 12:36 AM
 */

// SECURITY ADDED ON 03/12 @ 4:15

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure that the register form is calling
    if (isset($_POST['submit_register'])) {
        // Init all vars
        $first_name = "";
        $last_name = "";
        $email = "";
        $username = "";
        $password = "";
        $pass_conf = "";
        $sec_q = "";
        $sec_a = "";
        $access = 0; // default for security
        $user_dupe = 0; // check if username exists (DEF = 0)
        $email_dupe = 0; // check if the email exists (DEF = 0)
        $vals_check_out = 0; // data redundancy check (DEF = 0)
        $err_txt = "Generic Error"; // tell the user where the issue was

        //Check if all fields are filled in
        if(
            isset($_POST["first_name_txt"])
            and
            isset($_POST["last_name_txt"])
            and
            isset($_POST["email_txt"])
            and
            isset($_POST["username_txt"])
            and
            isset($_POST["password_txt"])
            and
            isset($_POST["password_txt_2"])
            and
            isset($_POST["sec_q_txt"])
            and
            isset($_POST["sec_a_txt"])
        ){

            // store data in vars
            $username = trim($_POST["username_txt"]);
            $first_name = trim($_POST["first_name_txt"]);
            $last_name = trim($_POST["last_name_txt"]);
            $email = trim($_POST["email_txt"]);

            $sec_q = trim($_POST["sec_q_txt"]);
            $sec_a = trim($_POST["sec_a_txt"]);

            // now check if the passwords match
            if($_POST["password_txt"] == $_POST["password_txt_2"]){
                // passwords match
                // - - - -
                // store the pass in a var
                $password = trim($_POST["password_txt"]);


                // Added on 06/12 after testing
                // -- -- -- -- -- -- --
                // The nesting if/else should be changed if we have the time (MS)
                // -- -- -- -- -- -- --
                // Check all fields for empty chars
                if($first_name !== "" &&
                    ctype_alpha($first_name) &&
                    $first_name != ""){
                    // first name OK
                    if($last_name !== "" &&
                        ctype_alpha($last_name) &&
                        $last_name != ""){
                        // last name OK
                        if($email != "" &&
                            $email !== "" &&
                            strpos($email, '@') !== false &&
                            strpos($email, '.') !== false){
                            // email OK
                            if($username != "" &&
                                $username !== "" &&
                                ctype_alpha($username)){
                                // username OK
                                if($password != "" &&
                                    strlen($password) >= 6 &&
                                    $password !== ""){
                                    // password OK
                                    if($sec_a != "" &&
                                        $sec_a !== ""){
                                        // sec ans OK
                                        // |*|*|*|*|
                                        // Everything OK
                                        $vals_check_out = 1;
                                    }else{
                                        $err_txt = "The security answer field is blank. Please answer the security question and try again.";
                                    }
                                }else{
                                    $err_txt = "The password you entered is invalid. Your password must be at least 6 characters long. Please try again.";
                                }
                            }else{
                                $err_txt = "The username you entered is invalid. Your username cannot be left blank or contain numbers. Please try again.";
                            }
                        }else{
                            $err_txt = "The email you have entered is not a valid email address. Please try again.";
                        }
                    }else{
                        $err_txt = "The last name that you entered is invalid. The last name cannot be left blank or contain numbers. Please try again.";
                    }
                }else{
                    $err_txt = "The first name that you entered is invalid. The last name cannot be left blank or contain numbers. Please try again.";
                }


                if($vals_check_out == 1) {
                    // SECURITY

                    // edit the email to remove the @ symbol
                    $email = str_replace("@", "AT", $email);

                    // edit the email to remove the @ symbol
                    $email = str_replace(".", "DOT", $email);


                    // connect to the db
                    include("../core_db_connect.php");

                    // test the conn
                    if ($db->connect_errno) {
                        die ('Connection Failed :' . $db->connect_error);
                    }

                    // grab all usernames
                    $sql = "SELECT * FROM userlogin";
                    // parse as res
                    $result = $db->query($sql);

                    // run the query
                    if (mysqli_query($db, $sql)) {
                        // check the return amount
                        if ($result->num_rows > 0) {
                            // check each entry for dupes
                            while ($row = $result->fetch_assoc()) {
                                // loop through res
                                if ($username == $row["username"]) {
                                    $user_dupe = 1; // username repeats
                                } else if ($email == $row["email"]) {
                                    $email_dupe = 1; // email repeats
                                }
                            }
                        } else {
                            // general get error
                            echo '<script language="javascript">alert("Interesting, you broke something I see");';
                            // reload
                            echo 'window.location = "../CORE_LOGIN/login.php";</script>';

                            // session storage fix
                            exit();
                        }
                    } else {
                        // SQL error
                        echo '<script language="javascript">alert("SQL ERROR!")</script>';
                        // echo the error
                        echo mysqli_error($db);
                    }

                    // check if the username exists
                    if ($user_dupe == 1) {
                        // Alert the user to the issue
                        echo '<script language="javascript">
alert("The username that you have entered is already in use. Please enter another username and try again.");';
                        // reload
                        echo 'window.location = "../CORE_LOGIN/login.php";</script>';

                        // session storage fix
                        exit();
                    }else if($email_dupe == 1){
                        // Alert the user to the issue
                        echo '<script language="javascript">
alert("The email address you entered is already registered. Please log in with your existing account or enter another email address and try again.");';
                        // reload
                        echo 'window.location = "../CORE_LOGIN/login.php";</script>';

                        // session storage fix
                        exit();
                    }else {
                        // Username is ok, email ok, values ok -> insert the data
                        // - - - - - -
                        // create sql query
                        try {
                            $sql = "INSERT INTO USERLOGIN (username,pass,accessLvl,email,secQues,secAns,firstName,lastName)
                            VALUES ('" . mysqli_real_escape_string($db, $username) . "','"
                                . mysqli_real_escape_string($db, $password) . "','"
                                . mysqli_real_escape_string($db, $access) . "','"
                                . mysqli_real_escape_string($db, $email) . "','"
                                . mysqli_real_escape_string($db, $sec_q) . "','"
                                . mysqli_real_escape_string($db, $sec_a) . "','"
                                . mysqli_real_escape_string($db, $first_name) . "','"
                                . mysqli_real_escape_string($db, $last_name) .
                                "')";

                            // attach the query to the conn and run it
                            if (mysqli_query($db, $sql)) {
                                // insert OK
                                echo '<script language="javascript">alert("Registration complete. Please login");';
                                // reload
                                echo 'window.location = "../CORE_LOGIN/login.php";</script>';

                                // session storage fix
                                exit();
                            } else {
                                // SQL error
                                echo '<script language="javascript">alert("SQL ERROR!")</script>';
                                // echo the error
                                echo mysqli_error($db);
                            }
                        } catch (PDOException $e) {
                            // error while adding record
                            echo $sql . "<br>" . $e->getMessage();
                        }
                    }

                    //finally, close the conn
                    $db->close();
                }else{
                    // data didn't pass the redundancy tests, display the error
                    echo '<script language="javascript">alert("'.$err_txt.'");';
                    // reload
                    echo 'window.location = "../CORE_LOGIN/login.php";</script>';
                    // session storage fix
                    exit();
                }
            }else{
                // Passwords don't match
                echo '<script language="javascript">
alert("The passwords that you have entered do not match. Please try again.");';
                // reload
                echo 'window.location = "../CORE_LOGIN/login.php";</script>';

                // session storage fix
                exit();
            }
        }
    }
    // -------------------------------------------
    // LOGIN BELOW |*|*|*|*|*|*|*|*|*|*|*|*|*|*|*|
    // -------------------------------------------

    // check if login
    if(isset($_POST['submit_login'])){
        $username = "";
        $pass = "";
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

                // form the query
                // !! Added security features - guard against injection
                $sql = "SELECT * FROM userlogin WHERE username = '"
                    .mysqli_real_escape_string($db, $username)."' AND pass = '"
                    .mysqli_real_escape_string($db, $pass). "'";
                // parse as res
                $result = $db->query($sql);


                // run the query
                if(mysqli_query($db, $sql)){
                    // check the return amount
                    if ($result->num_rows > 0) {
                        // data checks out
                        // parse the user's details to the session
                        while($row = $result->fetch_assoc()) {
                            $_SESSION["user_ac_lvl"] = $row["accessLvl"];
                            $_SESSION["user_fname"] = $row["firstName"];
                            $_SESSION["user_lname"] = $row["lastName"];
                            $_SESSION["userID"] = $row["userID"];
                        }
                        // open the clubs page
                        header("location: ../CORE_CLUBS/index.php");
                    } else {
                        echo '<script language="javascript">alert("Username or Password incorrect")</script>';
                        // data false, reload

                        header("location: ../CORE_LOGIN/login.php");

                        // session storage fix
                        exit();
                    }
                }else{
                    // SQL error
                    echo '<script language="javascript">alert("SQL ERROR!")</script>';

                    echo mysqli_error($db);
                }

                // close the conn
                $db->close();
            }
        }
    }
}