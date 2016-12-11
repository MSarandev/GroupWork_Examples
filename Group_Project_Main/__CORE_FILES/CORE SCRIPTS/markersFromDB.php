<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 11-Dec-16
 * Time: 9:15 PM
 */

// setup vars
$array_descr = array();
$array_img = array();
$array_coor = array();

// Connect to the DB
include("../core_db_connect.php");

// test our connection
if ($db->connect_errno) {
    die ('Connection Failed :'.$db->connect_error );
}

// sql
$sql = "SELECT * FROM map WHERE markerType = 'external'";
// parse as row
$result = $db->query($sql);

// attach the query and execute
if(mysqli_query($db, $sql)){
    // DONE
    // check the return amount
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // setup vars
            $markerDesc = $row['markerDescript'];
            $markerImg = $row['markerImg'];
            $coor = $row['markerCoor'];

            // push to array
            array_push($array_descr, $markerDesc);
            array_push($array_img, $markerImg);
            array_push($array_coor, $coor);
        }

        foreach($array_descr as $i){
            echo "user_m_descr.push('".$i."');";
        }

        foreach($array_img as $i){
            echo "user_m_img.push('".$i."');";
        }

        foreach($array_coor as $i){
            $coma_at = strpos($i, ",");
            $lat = substr($i, 1, $coma_at-1);
            $lng = substr($i, $coma_at+2, strlen($i));

            // push to JS
            echo "user_m_lat.push('".$lat."');";
            echo "user_m_lng.push('".$lng."');";

        }
    }else{
        // NO DATA
    }

    // close the conn
    $db->close();
}else{
    // SQL Error
    echo "SQL ERROR - " . mysqli_error($db);
    // stop execution
    exit();
}