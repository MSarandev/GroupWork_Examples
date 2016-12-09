<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09-Dec-16
 * Time: 3:04 AM
 */
session_start();

// the functions are the same, as they were before AJAX
function userSubbedClubs(){
    // echo to the user as to what they are seeing
    echo "Clubs you have subbed to";
    echo "<hr><br>";

    $club_array = array(); // init

    // XSS vars
    $_SESSION["GLOBAL_club_names"] = array();
    $_SESSION["GLOBAL_club_ids"] = array();
    // XSS

    // get the user ID from the session
    $userID = $_SESSION['userID'];

    // connect to the database to pull the clubs
    include("../core_db_connect.php");

    // test the conn
    if ($db->connect_errno) {
        die ('Connection Failed :' . $db->connect_error);
    }

    // grab all the subscriptions the user has
    $sql = "SELECT clubID FROM subscription WHERE userID = '"
        . mysqli_real_escape_string($db, $userID) . "'";

    // parse as res
    $result = $db->query($sql);

    // run the query
    if (mysqli_query($db, $sql)) {
        // check the return amount
        if ($result->num_rows > 0) {
            // data checks out
            while ($row = $result->fetch_assoc()) {
                // store all ids in an array
                array_push($club_array, $row["clubID"]);
            }
        } else {
            // data false, reload
            //echo '<script language="javascript">alert("404 - Data Not Found")</script>';
        }
    } else {
        // SQL error
        echo '<script language="javascript">alert("SQL ERROR!")</script>';
        echo mysqli_error($db);
    }

    // now we have all club IDs the user is subbed to
    // - - - - - -

    // before we run the query, assign the current club to the first arr. element
    if (count($club_array) != 0) {
        // the clubs array has 1+ elements
        // - - - -

        foreach ($club_array as $arr_val) {
            // create another query to pull the clubs' details & gen HTML
            $sql = "SELECT * FROM clubs WHERE clubID = '"
                . mysqli_real_escape_string($db, $arr_val) . "'";

            // parse as res
            $result = $db->query($sql);

            // run the query to get the club data
            if (mysqli_query($db, $sql)) {
                // check the return amount
                if ($result->num_rows > 0) {
                    // data checks out

                    while ($row = $result->fetch_assoc()) {
                        // start filling in the variables
                        $club_name = $row["clubname"];
                        $long_desc = $row["longDescr"];
                        $clubID = $row["clubID"];

                        // parse to GLOBAL
                        array_push($_SESSION["GLOBAL_club_names"], $club_name);
                        array_push($_SESSION["GLOBAL_club_ids"], $clubID);

                        // now we have the clubs' details
                        // - - - - - - -
                        // echo the html to show the club as a tab
                        echo '
                    <li class="clubs_container_li">
                        <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                        <!-- /\/\/\/\/\/\/\/\/\/\ -->
                        <!-- Description section -->
                        <div class="clubs_container_li_main_d">
                            <div class="clubs_container_int_heading_top">
                                <p class="clubs_container_int_heading_par">' . $club_name . '</p>
                            </div>
                            <div class="clubs_container_int_d_top">
                                <p class="clubs_container_int_d_par">'
                            . $long_desc .
                            '</p>
                            </div>
                        </div>
                        <!-- Image section -->
                        <div class="clubs_container_li_left_d">
                            <img class="clubs_container_img_lg" src="../CORE_IMG/newClubLogo.png"/>
                        </div>
                        <!-- Button Section -->
                        <div class="clubs_container_int_d_btn">
                            <a 
                            href="../CORE_DISP_CLUB/index.php?cid=' . $clubID . '" 
                            class="clubs_container_btn">Club Page</a>
                        </div>
                        <!-- /\/\/\/\/\/\/\/\/\/\ -->
                        <!-- DO NOT CHANGE THE STRUCTURE ABOVE -->
                    </li>
                    ';
                    }
                } else {
                    // data false, reload
                    echo '<script language="javascript">alert("404 - Data Not Found")</script>';
                }
            } else {
                // SQL error
                echo '<script language="javascript">alert("SQL ERROR!")</script>';
                echo mysqli_error($db);
            }
        }
    } else {
        // Empty array error
        echo '<p>You have not subbed to any clubs</p>';
    }


    // close the connection
    $db->close();
}


if($_POST['action'] == 'show_my_clubs') {
    // Call the function
    userSubbedClubs();

}elseif($_POST['action'] == 'show_AG1') {
    echo "New Clubs, ".$_POST['param1'];

}elseif($_POST['action'] == 'show_AG2') {
    echo "Even newer clubs, ".$_POST['param1'];

}elseif($_POST['action'] == 'show_AG3') {
    echo "The newest clubs, ".$_POST['param1'];

}