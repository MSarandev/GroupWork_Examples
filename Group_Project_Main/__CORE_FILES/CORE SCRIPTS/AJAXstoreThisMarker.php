<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10-Dec-16
 * Time: 7:46 PM
 */

if($_POST['action'] == 'store_a_marker') {
    // Fetch the values
    $image_url = $_POST['img_u'];
    $descr_text = $_POST['des_txt'];
    $coordinates = $_POST['coor'];

    echo $image_url.", ".$descr_text.",".$coordinates;
    /*

    // Standard string checks
    if($image_url != "" && $image_url !== ""){
        // img ok

        if($descr_text != "" && $descr_text !== ""){
            // desc ok

            if($coordinates != "" && $coordinates !== ""){
                // all values OK

                // Connect to the DB
                include("../core_db_connect.php");

                // test our connection
                if ($db->connect_errno) {
                    die ('Connection Failed :'.$db->connect_error );
                }

                // Encapsulate in try/catch
                try{

                    // generate the sql
                    $sql = "INSERT INTO map (markerName, markerType, markerCoor, markerImg, markerDescript) VALUES ('"
                        .'userSubmitted'."','"
                        .'external'."','"
                        .mysqli_real_escape_string($db, $coordinates)."','"
                        .mysqli_real_escape_string($db, $image_url)."','"
                        .mysqli_real_escape_string($db, $descr_text).
                        "')";

                    // attach the query and execute
                    if(mysqli_query($db, $sql)){
                        // DONE
                        echo "SUCCESS - Marker submitted for approval";
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
                echo "ERROR - Right click on the map to place the marker";
                exit();
            }
        }else{
            echo "ERROR - Please enter a marker description";
            exit();
        }
    }else{
        echo "ERROR - Please take a picture and re-submit";
        exit();
    }
    */
}