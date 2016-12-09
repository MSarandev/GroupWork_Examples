<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09-Dec-16
 * Time: 3:58 AM
 */

// for the sake of tidiness
function searchMyClubs($param){
    // The majority of this function is from the pre-AJAX PHP file

    // fetch the criteria
    $search_criteria = $param;

    // see if the criteria value is OK
    if($search_criteria !== ""
        && $search_criteria != ""
        && ctype_alnum($search_criteria)){
        // string OK

        // Connect to the DB
        include("../core_db_connect.php");

        // test our connection
        if ($db->connect_errno) {
            die ('Connection Failed :'.$db->connect_error );
        }

        // generate the sql
        // |*|*|*|*|*|*|*|*|
        // In this case we are using LIKE + wildcards
        // This will return all matches (even partial ones)
        // |*|*|*|*|*|*|*|*|
        $sql = "SELECT * FROM clubs WHERE clubname LIKE '%"
            .mysqli_real_escape_string($db, $search_criteria)."%'";

        // parse as res
        $result = $db->query($sql);

        // run the query
        if(mysqli_query($db, $sql)){
            // check the return amount
            if($result->num_rows > 0){
                // data OK
                while($row = $result->fetch_assoc()){
                    // set the var names
                    $club_name = $row["clubname"];
                    $clubID = $row["clubID"];
                    $age_group = $row["age_group"];

                    // generate the div result box
                    echo "
                        <p>".$club_name."</p>
                        <p>".$age_group."</p>
                        <a href='../CORE_DISP_CLUB/index.php?cid=".$clubID."' 
                        class='search_res_btn_link'>LINK</a>
                        ";
                }
            }else{
                // no data
                echo "No data found";
            }
        }else{
            // SQL error

            echo "SQL ERROR! <br>".mysqli_error($db);
        }

        // close the conn
        $db->close();
    }else{
        // Alert the user
    echo "ERROR - The search you have entered contains invalid characters.";
    }
}


if($_POST['action'] == 'search_my_clubs') {
    // Fetch the criteria
    $criteria = $_POST['val'];

    // Call the function
    searchMyClubs($criteria);
}