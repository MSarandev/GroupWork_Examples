<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09-Dec-16
 * Time: 1:46 AM
 */
session_start();

if($_POST['action'] == 'sub_me_now') {
    // get the user ID
    $userID = $_SESSION["userID"];

    // get the club ID
    $clubID = $_POST['id'];

    // Security cleanup for the clubID
    if($clubID != "" &&
        $clubID !== "" &&
        ctype_digit($clubID)){
        // The club ID is fine

        // Standard procedure from here on

        // link to to db
        include("../core_db_connect.php");

        // test the conn
        if ($db->connect_errno) {
            die ('Connection Failed :'.$db->connect_error );
        }

        // try/catch
        try {
            // build the SQL query
            $sql = "INSERT INTO subscription (userID, clubID)
                            VALUES ('" . mysqli_real_escape_string($db, $userID) . "','"
                . mysqli_real_escape_string($db, $clubID) .
                "')";

            // attach the query to the conn and run it
            if (mysqli_query($db, $sql)) {
                // insert OK
                echo "You are now subscribed";
            } else {
                // SQL error
                echo "SQL Error"."<br>".mysqli_error($db);
            }
        } catch (PDOException $e){
            // error while adding record
            echo "Script error"."<br>".$e->getMessage();
        }
    }else{
        // Alert to the user
        echo "The club ID is corrupt. Refresh the page and try again";
    }
}