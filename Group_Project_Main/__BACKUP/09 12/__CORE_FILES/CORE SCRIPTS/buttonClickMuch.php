<?php
/**
 * Created by PhpStorm.
 * User: 1406519
 * Date: 05/12/2016
 * Time: 15:40
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /**
     * Ok, so there's a bit of magic happening below
     * There's a loop that goes through all post calling elements in the page
     * and looks for partial matches.
     * The reason is -> the button names are a mixture of a string
     * and the club's ID. This helps identify which club should be
     * approved/deleted
     * I realise this might be so far away from standard practice, it's in
     * a different galaxy. Buuut - as a wise dev once said ->
     * "If it works, don't ask why it works".
     * Seriously though - there's no security issues associated with this.
     * The clubID is already visible, as it forms the URL for that club.
     * So in theory everything should be fine. (famous last words)
     * Plus it's 5AM, this needed to work yesterday, so behind schedule
     * is a kind way of putting it. I'm desperate at this point KAAAY?
     *
     * I take full responsibility if you want to revoke my "dev licence"
     * Max Sarandev
    */

    /**
     * Update (2 mins later) -> IT WORKS YAAAAY
     */

    foreach($_POST as $key => $value) {
        if (strpos($key, 'admin_approve') === 0) {
            // the key variable contains the ID - find it
            $index_of_q = strpos($key, "?"); // find where the q mark is
            // we add 1 to the index to push it PAST the question mark
            // we then get the substring and like clockwork - we have the club ID
            $clubID_final = substr($key, $index_of_q+1, strlen($key));

            // to approve the club read on

            // link to to db
            include("../core_db_connect.php");

            // test the conn
            if ($db->connect_errno) {
                die ('Connection Failed :'.$db->connect_error );
            }

            // create the query
            $sql = "UPDATE clubs SET approved = 1 WHERE clubID = '"
                .mysqli_real_escape_string($db, $clubID_final)."'";

            // try to run the query
            try {
                // attach the query to the conn and run it
                if (mysqli_query($db, $sql)) {
                    // insert OK
                    echo '<script language="javascript">alert("Club approved. Refreshing");';
                    // reload
                    echo 'window.location = "../CORE_CLUBS/index.php";</script>';
                } else {
                    // SQL error
                    echo '<script language="javascript">alert("SQL ERROR!")</script>';
                    // echo the error
                    echo mysqli_error($db);
                }
            } catch (PDOException $e) {
                // error while adding record
                echo $sql . "<br>" . $e->getMessage();
            }

            // close the conn
            $db->close();

        }elseif (strpos($key, 'admin_delete') === 0){
            // the key variable contains the ID - find it
            $index_of_q = strpos($key, "?"); // find where the q mark is
            // we add 1 to the index to push it PAST the question mark
            // we then get the substring and like clockwork - we have the club ID
            $clubID_final = substr($key, $index_of_q+1, strlen($key));

            // to delete the club read on

            // link to to db
            include("../core_db_connect.php");

            // test the conn
            if ($db->connect_errno) {
                die ('Connection Failed :'.$db->connect_error );
            }

            // create the query
            $sql = "DELETE FROM clubs WHERE clubID = '"
                .mysqli_real_escape_string($db, $clubID_final)."'";

            // try to run the query
            try {
                // attach the query to the conn and run it
                if (mysqli_query($db, $sql)) {
                    // insert OK
                    echo '<script language="javascript">alert("Club deleted. Refreshing");';
                    // reload
                    echo 'window.location = "../CORE_CLUBS/index.php";</script>';
                } else {
                    // SQL error
                    echo '<script language="javascript">alert("SQL ERROR!")</script>';
                    // echo the error
                    echo mysqli_error($db);
                }
            } catch (PDOException $e) {
                // error while adding record
                echo $sql . "<br>" . $e->getMessage();
            }

            // close the conn
            $db->close();
        }
    }
}