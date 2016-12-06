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
        // fetch the criteria
        $search_criteria = $_POST['search_club_txt'];

        echo $search_criteria;
    }
}