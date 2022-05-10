<?php
session_start();

require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (isset($_GET['token'])) {


    $token = $_GET['token'];

    $updatequery = "UPDATE  booksy_user SET status = 'active' WHERE token = '$token'";

    $query = mysqli_query($dbc, $updatequery);


    if ($query) {
        if (isset($_SESSION['msg'])) {
            $_SESSION['msg'] = "account updated succesfully";
            header('location:login.php');
        } else {
            $_SESSION['msg'] = "you are logged out";
            header('location:signup.php');
        }
    } else {
        echo 'error';
    }
}
