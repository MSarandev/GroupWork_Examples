<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09-Dec-16
 * Time: 3:04 AM
 */
session_start();

if($_POST['action'] == 'show_my_clubs') {
    echo "Hello Buddy, ".$_POST['param1'];

}elseif($_POST['action'] == 'show_AG1') {
    echo "New Clubs, ".$_POST['param1'];

}elseif($_POST['action'] == 'show_AG2') {
    echo "Even newer clubs, ".$_POST['param1'];

}elseif($_POST['action'] == 'show_AG3') {
    echo "The newest clubs, ".$_POST['param1'];

}