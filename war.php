<?php


require_once('startsession.php');
include_once('dbconnect.php');


if (isset($_SESSION['username'])) {
    if (isset($_GET['pid']) and isset($_GET['total']) and isset($_GET['quantity'])) {
        $uid = $_SESSION['username'];
        $pid = $_GET['pid'];
        $amount = $_GET['total'];
        $quantity = $_GET['quantity'];



        $query = "INSERT INTO order_info (pid, customer, method,price,quantity,status) VALUES ('$pid', '$uid', 'paytm','$amount','$quantity','pending')";
        mysqli_query($con, $query);
    }
}
print_r($uid);

print_r($pid);
print_r($quantity);
print_r($amount);
print_r($quantity);
$j_query = "SELECT order_id from order_info where pid = '$pid' and customer = '$uid' and status = 'pending'";
$j_result = mysqli_query($con, $j_query);

if (mysqli_num_rows($j_result) > 0) {
    while ($j_row = mysqli_fetch_assoc($j_result)) {
        $order_id =  $j_row["order_id"];
    }
}

print_r($order_id);
