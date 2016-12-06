<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 9:56 PM
 */

// fetch the access level from the session
$user_a_lvl = $_SESSION["user_ac_lvl"];

// check to see if the user is an admin
if($user_a_lvl != 0 && $user_a_lvl > 1){
    // the user is an admin
    // generate the divs

    // prepare the vars
    $club_name = "";
    $age_group = "";
    $url = "";
    // ADD THE MARKER DETAILS HERE

    // link to to db
    include("../core_db_connect.php");

    // test the conn
    if ($db->connect_errno) {
        die ('Connection Failed :'.$db->connect_error );
    }

    // create the query
    $sql = "SELECT * FROM clubs WHERE approved = '0'";

    // parse as row
    $result = $db->query($sql);

    // run the query
    if (mysqli_query($db, $sql)) {
        // check the return amount
        if ($result->num_rows > 0) {
            // data OK
            while ($row = $result->fetch_assoc()) {
                // fetch the data for each club
                $club_name = $row["clubname"];
                $age_group = $row["age_group"];
                $url = $row["clubID"];

                // generate the HTML
                echo "
                <div id='admin_inner_section'>
                    <p class='admin_p'>Club name: <em>".$club_name."</em>, </p>
                    <br>
                    <p class='admin_p'>Age Group: <em>".$age_group."</em>, </p>
                    <br>
                    <a href='".$url."'><em>LINK</em></a>
                    <br>
                    <form id='admin_btn_form' action='' method='post'>
                        <input type='submit' name='admin_approve?".$row['clubID']."' id='admin_approve' value='Approve'/>
                        <input type='submit' name='admin_delete?".$row['clubID']."' id='admin_delete' value='Delete'>
                    </form>
                    <p id='admin_version_p'><strong>v. 2.9</strong></p>
                </div>
                ";
            }
        }else{
            // data false, reload
            echo '<script language="javascript">alert("Data retrieval error!")</script>';
        }
    }else {
        // SQL error
        echo '<script language="javascript">alert("SQL ERROR!")</script>';
        echo mysqli_error($db);
    }
}