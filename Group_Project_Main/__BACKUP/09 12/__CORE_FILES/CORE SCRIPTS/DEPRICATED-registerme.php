<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 3:43 AM
 */

// the session is already running from the login script

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
                $sql = "SELECT username FROM userlogin";
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
                    echo '<script language="javascript">alert("Pick another username")</script>';
                }else{
                    // Username is ok, insert the data
                    // - - - - - -
                    // create sql query
                    try {
                        $sql = "INSERT INTO USERLOGIN (username,password,accessLVL,email,sedQuestion,secAnswer,firstName,lastName)
                    VALUES ($username, $password, $access, $email, $sec_q, $sec_a, $first_name, $last_name)";

                        //finally, close the conn
                        $db->close();

                        echo '<script language="javascript">alert("Registration complete. Please login")</script>';
                    }catch(PDOException $e){
                        // error while adding record
                        echo $sql . "<br>" . $e->getMessage();
                    }
                }
            }
        }
    }
}