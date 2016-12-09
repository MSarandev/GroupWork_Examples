<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09-Dec-16
 * Time: 9:02 PM
 */

if($_POST['action'] == 'add_new_club') {
    // Fetch the criteria
    $clubID = $_POST['clubID'];
    $event_text = $_POST['event_text'];
    $event_day = $_POST['event_day'];
    $event_time = $_POST['event_time'];

    // In the name of laziness, no functions will be written

    // Do the standard security checks on all values
    if($clubID != "" && $clubID !== "" && ctype_digit($clubID)){
        // clubID is ok

        if($event_text != "" &&
            $event_text !== ""){
            //event text is ok

            if($event_day != "" &&
                $event_day !== "" &&
                ctype_alnum($event_day)){
                //event day is ok

                if($event_time != "" &&
                    $event_time !== ""){
                    // event time is ok

                    // ALL VARS ARE OK - proceed

                    // Connect to the DB
                    include("../core_db_connect.php");

                    // test our connection
                    if ($db->connect_errno) {
                        die ('Connection Failed :'.$db->connect_error );
                    }

                    // Encapsulate in try/catch
                    try{

                        // generate the sql
                        $sql = "INSERT INTO club_events (clubID, eventDescr, eventDay, eventTime, approved) VALUES ('"
                            .mysqli_real_escape_string($db, $clubID)."','"
                            .mysqli_real_escape_string($db, $event_text)."','"
                            .mysqli_real_escape_string($db, $event_day)."','"
                            .mysqli_real_escape_string($db, $event_time).
                            "','0')";

                        // attach the query and execute
                        if(mysqli_query($db, $sql)){
                            // DONE
                            echo "Event added to the database";
                            // stop execution
                            exit();
                        }else{
                            // SQL Error
                            echo "SQL ERROR - " . mysqli_error($db);
                            // stop execution
                            exit();
                        }

                    }catch (PDOException $e){
                        echo "ERROR - ".$e->getMessage();
                        // stop execution
                        exit();
                    }

                    // close the conn
                    $db->close();
                }else{
                    echo "ERROR - Event time contains invalid characters";
                    // stop execution
                    exit();
                }
            }else{
                echo "ERROR - Event day contains invalid characters
                If the event spans over several days - create separate events";
                // stop execution
                exit();
            }
        }else{
            echo "ERROR - Event text contains invalid characters";
            // stop execution
            exit();
        }
    }else{
        echo "ERROR - Club ID is not a digit";
        // stop execution
        exit();
    }

}