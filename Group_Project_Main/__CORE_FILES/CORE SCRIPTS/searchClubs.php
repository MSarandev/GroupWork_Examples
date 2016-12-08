<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06-Dec-16
 * Time: 6:19 PM
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure to respond to the search bar ONLY
    if (isset($_POST['search_club_btn'])) {
        // prepare the values
        $club_name = "";
        $clubID = "";
        $age_group = "";

        // fetch the criteria
        $search_criteria = $_POST['search_club_txt'];

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
                        <div class='search_res_inner'>
                        <p>".$club_name."</p>
                        <p>".$age_group."</p>
                        <a href='../CORE_DISP_CLUB/index.php?cid=".$clubID."' 
                        class='search_res_btn_link'>LINK</a>
                        </div>
                        ";
                    }
                }else{
                    // no data
                    echo "No data found";
                }
            }else{
                // SQL error

                echo '<script language="javascript">alert("SQL ERROR!")</script>';

                echo mysqli_error($db);
            }

            // close the conn
            $db->close();
        }else{
            // Alert the user
            echo '<script language="javascript">
alert("The search you have entered contains invalid characters. Please try again using only numbers and letters.")
</script>';
        }
    }
}