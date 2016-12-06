<?php
/**
 * Created by PhpStorm.
 * User: 1406519
 * Date: 05/12/2016
 * Time: 15:40
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure that the register form is calling

    /**
     * Ok, so there's a bit of magic happening below
     * There's a loop that goes through all post calling elements in the page
     * and looks for partial matches.
     * The reason is -> the button names are a mixture of a string
     * and the club's ID. This helps identify which club should be
     * approved/deleted
     * I realise this might be so far away from standard practice, it's in
     * a different galaxy. Buuut - as a wise dev once said ->
     * "If it works, don't ask why".
     * Seriously though - there's no security issues associated with this.
     * The clubID is already visible, as it forms the URL for that club.
     * So in theory everything should be fine. (famous last words)
     *
     * I take full responsibility if you want to revoke my "dev licence"
     * Max Sarandev
    */

    foreach($_POST as $key => $value) {
        if (strpos($key, 'admin_approve') === 0) {
            echo 'Approve '.$key;
        }elseif (strpos($key, 'admin_delete') === 0){
            echo 'Delete '.$key;
        }
    }
}