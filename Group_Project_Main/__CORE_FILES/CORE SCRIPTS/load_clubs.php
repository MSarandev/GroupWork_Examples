<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 5:58 PM
 */

$club_array = array(); // init
$current_club = ""; //init

// get the user ID from the session
$userID = $_SESSION['userID'];

// connect to the database to pull the clubs
include("../core_db_connect.php");

// test the conn
if ($db->connect_errno) {
    die ('Connection Failed :'.$db->connect_error );
}

// grab all the subscriptions the user has
$sql = "SELECT clubID FROM subscription WHERE userID = '"
    .mysqli_real_escape_string($db, $userID)."'";

//DEBUG
echo '<script language="javascript">alert("'.$userID.'")</script>';

// parse as res
$result = $db->query($sql);

// run the query
if(mysqli_query($db, $sql)){
    // check the return amount
    if ($result->num_rows > 0) {
        // data checks out
        while($row = $result->fetch_assoc()) {
            // store all ids in an array
            array_push($club_array, $row["clubID"]);

            //DEBUG
            echo '<script language="javascript">alert("'.count($club_array).'")</script>';
            echo '<script language="javascript">alert("'.$row['clubID'].'")</script>';
        }
    } else {
        // data false, reload
        echo '<script language="javascript">alert("404 - Data Not Found")</script>';
    }
}else{
    // SQL error
    echo '<script language="javascript">alert("SQL ERROR!")</script>';
    echo mysqli_error($db);
}

// now we have all club IDs the user is subbed to
// - - - - - -

// before we run the query, assign the current club to the first arr. element
if(count($club_array) != 0){
    // the clubs array has 1+ elements
    // - - - -
    // prepare the variables
    $club_name = "";
    $creator_ID = "";
    $age_group = "";
    $contact_info = "";
    $location = "";
    $long_desc = "";
    $header_img = "";
    $bck_img = "";
    $short_desc = "";

    //DEBUG
    echo '<script language="javascript">alert("1")</script>';

    foreach($club_array as $arr_val){
        //DEBUG
        echo '<script language="javascript">alert("2")</script>';

        // create another query to pull the clubs' details & gen HTML
        $sql = "SELECT * FROM clubs WHERE clubID = '"
            .mysqli_real_escape_string($db, $arr_val)."'";

        // parse as res
        $result = $db->query($sql);

        // run the query to get the club data
        if(mysqli_query($db, $sql)){
            //DEBUG
            echo '<script language="javascript">alert("3")</script>';


            // check the return amount
            if ($result->num_rows > 0) {
                // data checks out

                //DEBUG
                echo '<script language="javascript">alert("4")</script>';

                while($row = $result->fetch_assoc()) {
                    //DEBUG
                    echo '<script language="javascript">alert("5")</script>';

                    // start filling in the variables
                    $club_name = $row["clubname"];
                    $creator_ID = $row["creatorID"];
                    $age_group = $row["age_group"];
                    $contact_info = $row["contact"];
                    $location = $row["location"];
                    $long_desc = $row["longDescr"];
                    $header_img = $row["headerImg"];
                    $bck_img = $row["backgroundImg"];
                    $short_desc = $row["shortDescr"];

                    // now we have the clubs' details
                    // - - - - - - -

                    //DEBUG
                    echo '<script language="javascript">alert("6")</script>';

                    // echo the html to show the club as a tab
                    echo '
                    <li class="clubs_container_li">
                        <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                        <!-- /\/\/\/\/\/\/\/\/\/\ -->
                        <!-- Description section -->
                        <div class="clubs_container_li_main_d">
                            <div class="clubs_container_int_heading_top">
                                <p class="clubs_container_int_heading_par">'.$club_name.'</p>
                            </div>
                            <div class="clubs_container_int_d_top">
                                <p class="clubs_container_int_d_par">'
                                    .$long_desc.
                                '</p>
                            </div>
                        </div>
                        <!-- Image section -->
                        <div class="clubs_container_li_left_d">
                            <img class="clubs_container_img_lg" src="'.$header_img.'"/>
                        </div>
                        <!-- Button Section -->
                        <div class="clubs_container_int_d_btn">
                            <a href="" class="clubs_container_btn">Join Club</a>
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
        }else{
            // SQL error
            echo '<script language="javascript">alert("SQL ERROR!")</script>';
            echo mysqli_error($db);
        }
    }
}else{
    // Empty array error
    echo '<script language="javascript">alert("Empty clubs array - are you subbed?")</script>';
}


// close the connection
$db->close();