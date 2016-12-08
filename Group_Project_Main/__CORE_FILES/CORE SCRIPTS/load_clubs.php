<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 5:58 PM
 */

// UPDATED  ON 08/12
// .. .. .. .. .. ..
// the script now loads data with a callback from a btn


// THE FUNCTION BELOW NEEDS A RE-MASTER.
// It works, but it could work more efficiently.
// If we have the time we should re-write it.
// M.S. ON 08/12
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

    unset($_POST);
}

function ageGroupClubs($param){
    // display a message to the user, as to what they are seeing
    if($param == 1){
        echo "Age Group 1 (00-12)";
        echo "<hr><br>";
    }else if($param == 2){
        echo "Age Group 2 (12-18)";
        echo "<hr><br>";
    }else if($param == 3){
        echo "Age Group 3 (18-99)";
        echo "<hr><br>";
    }


    // connect to the database to pull the clubs
    include("../core_db_connect.php");

    // test the conn
    if ($db->connect_errno) {
        die ('Connection Failed :' . $db->connect_error);
    }

    // prepare the sql
    /**
     *
     * The query below contains a "naked" param. There's no security checks for injection.
     * This is done deliberately, as the function is only called from WITHIN.
     * If a hacker can change the param into an SQL Injection string - that means the server is breached.
     * The hacker would literary need to have access to the source code to inject into this query.
     * Should I explain further??
     *
     * M.S.
     */
    $sql = "SELECT clubname, clubID, shortDescr FROM clubs WHERE age_group = 'group_".$param."'";
    // parse as res
    $result = $db->query($sql);

    // run the query
    if (mysqli_query($db, $sql)) {
        // check the return amount
        if ($result->num_rows > 0) {
            // data checks out
            while ($row = $result->fetch_assoc()) {
                // fill in the variables
                $club_name = $row['clubname'];
                $clubID = $row['clubID'];
                $short_desc = $row['shortDescr'];

                // dynamically fill the HTML
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
                    . $short_desc .
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
            // No clubs matching criteria
            echo "<br>No clubs found that match the criteria. Sorry";
        }
    } else {
        // SQL error
        echo '<script language="javascript">alert("SQL ERROR!")</script>';
        echo mysqli_error($db);
    }

    // close the conn
    $db->close();

    unset($_POST);
}


// Go to the callback
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // We have a callback from the filter buttons
    // Establish which one is requesting info
    if (isset($_POST['my_clubs_call_btn'])) {
        // Load the initial data in view --> The clubs the user is a sub to already
        // Call the function

        userSubbedClubs();
    }else if(isset($_POST['age_group_1_call_btn'])){
        // The user requested all clubs with AGE GROUP 1 as a param
        // Call the function and parse the age group as a param

        ageGroupClubs(1);
    }else if(isset($_POST['age_group_2_call_btn'])){
        // The user requested all clubs with AGE GROUP 2 as a param
        // Call the function and parse the age group as a param

        ageGroupClubs(2);
    }else if(isset($_POST['age_group_3_call_btn'])){
        // The user requested all clubs with AGE GROUP 3 as a param
        // Call the function and parse the age group as a param

        ageGroupClubs(3);
    }
    // |*|*|*|*|*|*|*|*|*|*|*|*|*|*|*|*|
    // The code below loads w/o an event
    // |*|*|*|*|*|*|*|*|*|*|*|*|*|*|*|*|
}else {
    // Call the function

    userSubbedClubs();
}