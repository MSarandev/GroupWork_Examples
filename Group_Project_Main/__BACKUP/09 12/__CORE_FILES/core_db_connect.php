<?php
/**
 * Created by PhpStorm.
 * User: 0702555
 * Date: 07/11/2016
 * Time: 14:05
 */




// connect to your Azure server and select database (remember you connection details are all on the azure portal
$db = new mysqli(
    'eu-cdbr-azure-north-e.cloudapp.net',
    'bc3bbc9f5fc3c2',
    '0d11dcd6',
    'goportlethen_db' );

// test our connection
if ($db->connect_errno) {
    die ('Connection Failed :'.$db->connect_error );
    $db->close();
}
?>
