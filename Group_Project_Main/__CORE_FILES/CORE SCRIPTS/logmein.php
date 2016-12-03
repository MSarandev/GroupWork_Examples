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

            // edit the email to remove the @ symbol
            $email = str_replace("@", "AT", $email);

            $sec_q = trim($_POST["sec_q_txt"]);
            $sec_a = trim($_POST["sec_a_txt"]);

            // now check if the passwords match
            if($_POST["password_txt"] == $_POST["password_txt_2"]){
                // passwords match
                // - - - -
                // store the pass in a var
                $password = trim($_POST["password_txt"]);

                // connect to the db
                include("../core_db_connect.php");

                // test the conn
                if ($db->connect_errno) {
                    die ('Connection Failed :'.$db->connect_error );
                }

                // grab all usernames
                $sql = "SELECT * FROM userlogin";
                // parse as res
                $result = $db->query($sql);

                // run the query
                if(mysqli_query($db, $sql)){
                    // check the return amount
                    if ($result->num_rows > 0) {
                        // check each entry for dupes
                        while($row = $result->fetch_assoc()) {
                            if(
                                $username == $row["username"]
                            ){
                                $user_dupe = 1; // username repeats
                            }
                        }
                    } else {
                        // general get error
                        echo '<script language="javascript">alert("Interesting, you broke something I see")</script>';
                    }
                }else{
                    // SQL error
                    echo '<script language="javascript">alert("SQL ERROR!")</script>';
                    // echo the error
                    echo mysqli_error($db);
                }

                // check if the username exists
                if($user_dupe == 1){
                    // Alert the user to the issue
                    echo '<script language="javascript">alert("Username Taken. Pick another one")</script>';
                    // reload
                    header("location: ../CORE_LOGIN/login.php");
                }else{
                    // Username is ok, insert the data
                    // - - - - - -
                    // create sql query
                    try {
                        $sql = "INSERT INTO USERLOGIN (username,pass,accessLvl,email,secQues,secAns,firstName,lastName)
                            VALUES ('".$username."','"
                            .$password."','"
                            .$access."','"
                            .$email."','"
                            .$sec_q."','"
                            .$sec_a."','"
                            .$first_name."','"
                            .$last_name.
                            "')";

                        // attach the query to the conn and run it
                        if(mysqli_query($db, $sql)){
                            // insert OK
                            echo '<script language="javascript">alert("Registration complete. Please login")</script>';
                            // reload
                            header("location: ../CORE_LOGIN/login.php");
                        }else{
                            // SQL error
                            echo '<script language="javascript">alert("SQL ERROR!")</script>';
                            // echo the error
                            echo mysqli_error($db);
                        }
                    }catch(PDOException $e){
                        // error while adding record
                        echo $sql . "<br>" . $e->getMessage();
                    }
                }

                //finally, close the conn
                $db->close();
            }else{
                // Passwords don't match
                echo '<script language="javascript">alert("Passwords are different")</script>';
                // reload
                header("location: ../CORE_LOGIN/login.php");
            }
        }
    }

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
                        }
                        // open the clubs page
                        header("location: ../CORE_CLUBS/index.php");
                    } else {
                        // data false, reload
                        header("location: ../CORE_LOGIN/login.php");
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