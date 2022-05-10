<!DOCTYPE html>
<html lang="en">

<head>
    <title>confirm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>


<?php


require_once('startsession.php');
require_once('nav.php');
include_once('dbconnect.php');


?>











<?php
if (isset($_GET['pid']) and isset($_GET['total']) and isset($_GET['quantity']) and isset($_GET['title'])   and isset($_GET['price'])) {

    $pid = $_GET['pid'];
    $total = $_GET['total'];
    $quantity = $_GET['quantity'];
    $title = $_GET['title'];
    $price = $_GET['price'];




    echo '
    <br><br><br>
    <table class="table">
    <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>

    <tr>
        <td>' . $title . '</td>
        <td>' . $price  . '</td>
        <td>' .  $quantity  . '</td>
        <td>' . $total . '</td>
    </tr>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>' .  $quantity  . '</th>
        <th>' . $total . '</th>
    </tr>
</table>';
    echo "<br><br><br>";


    echo '<div class="row">
<div class="col-xs-8 col-xs-offset-2  col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-3">
     <a href="instapayment.php?pid=' . $pid . '&total=' . $total . '&quantity=' .  $quantity .  '" class="btn btn-lg" style="background:darkcyan;color:white;font-weight:800;">ONLINE PAYMENT</a>
</div>
<div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-1 col-lg-4 ">
<a href="cod.php?pid=' . $pid . '&total=' . $total . '&quantity=' .  $quantity .    '" class="btn btn-lg" style="background:darkcyan;color:white;font-weight:800;margin-top:5px;">CASH ON DELIVERY</a>
</div>
</div>';
}

echo "<br><br><br>";













$ass = $_SESSION['username'];
$query12 = "SELECT *from user_info where username = '$ass'";
$result = mysqli_query($con, $query12);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    $n = $row['full_name'];
    $a = $row['address'];
    $c = $row['city'];
    $s = $row['state'];
    $nu = $row['number'];
}



?>




<div class="container" style="center">

    <div class="card-columns">
        <div class="card bg-light">
            <div class="card-body text-center">

                <p class="card-text">

                    <strong style="text-align: center;">ADDRESS</strong><br>
                    Name: <?php echo "$n";  ?><br>
                    Contact: <?php echo "$nu"; ?><br>
                    Address: <?php echo "$a"; ?><br>
                    City: <?php echo "$c"; ?><br><br><br>


                </p>
            </div>
        </div>
    </div>
</div>




<?php





















?>