<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 6:51 PM
 */

// We have the clubs' IDS and Names stored in the sessions already
// in: $_SESSION["GLOBAL_club_names"] and "GLOBAL_club_ids"
// .. .. .. .. .. .. .. .. ..
// the items in both array correspond to each other
// the first ID in ids === the first name in names

// we need to grab the events details from the DB

// prep the variables
$eventID = "";
$event_descr = "";
$event_day = "";
$event_time = "";
$index_var = 0;
$club_name = "";

// link to to db
include("../core_db_connect.php");

// test the conn
if ($db->connect_errno) {
    die ('Connection Failed :'.$db->connect_error );
}

foreach($_SESSION["GLOBAL_club_ids"] as $clubID){
    // for each id generate a query
    // .. .. .. .. .. .. .. ..

    // create the query
    $sql = "SELECT * FROM club_events WHERE clubID = '"
        .mysqli_real_escape_string($db, $clubID)."'";

    // parse as row
    $result = $db->query($sql);

    // run the query
    if(mysqli_query($db, $sql)){
        // check the return amount
        if($result->num_rows > 0){
            // data OK
            while($row = $result->fetch_assoc()){
                // get all the data for each event for this club
                $eventID = $row["eventID"];
                $event_descr = $row["eventDescr"];
                $event_day = $row["eventDay"];
                $event_time = $row["eventTime"];

                // now to get the club name:
                $index_var = array_search($clubID,
                    $_SESSION["GLOBAL_club_ids"]);

                // get the assoc name
                $club_name = $_SESSION["GLOBAL_club_names"][$index_var];

                // generate the HTML
                echo '
                 <li class="events_container_li">
                    <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                    <!-- /\/\/\/\/\/\/\/\/\/\ -->
                    <!-- Description section -->
                    <div class="events_container_li_main_d">
                        <div class="events_container_int_heading_top">
                            <p class="events_container_int_heading_par">'.$club_name.'</p>
                        </div>
                        <div class="events_container_int_d_top">
                            <p class="events_container_int_d_par">'
                                .$event_descr.'<br>'.$event_day." at ".$event_time.
                            '</p>
                        </div>
                    </div>
                    <!-- Button Section -->
                    <div class="events_container_int_d_btn">
                        <a href="" class="events_container_btn">Hide</a>
                    </div>
                    <!-- /\/\/\/\/\/\/\/\/\/\ -->
                    <!-- DO NOT CHANGE THE STRUCTURE ABOVE -->
                </li>
                ';
            }
        }else{
            // data false, reload
            echo '<p>No events found</p>';
        }
    }else{
        // SQL error
        echo '<script language="javascript">alert("SQL ERROR!")</script>';
        echo mysqli_error($db);
    }
}