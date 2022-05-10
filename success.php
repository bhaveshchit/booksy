<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>


<body>


    <?php
    include_once('startsession.php');


    include_once('dbconnect.php');
    include_once('gmail.php');






    $j_query = "SELECT order_id from order_info where pid = '$pid' and customer = '$customer' and status = 'pending'";
    $j_result = mysqli_query($con, $j_query);

    if (mysqli_num_rows($j_result) > 0) {
        while ($j_row = mysqli_fetch_assoc($j_result)) {
            $order_id =  $j_row["order_id"];


            $updatequery = "UPDATE order_info set status = 'success' where order_id = '$order_id'";
            $query = mysqli_query($con, $updatequery);









            $to_email = $_SESSION['email'];
            $subject = "Order Placed";
            $body = "Hi $customer, Your order has been placed. your order-id: $order_id and your books worth of Rs.$price is on the way. THANKS FOR THE SHOPPING";


            if (gmail($to_email, $subject, $body, $body)) {

                echo '
    
    <div style="text-align: center; padding-top:100px">
    
    <H2>thanks for shooping with us </H2>
    
    <div class="row">
    <div class="col-xs-8 col-xs-offset-2  col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-3">
        <a href="index.php" class="btn btn-lg" style="background:darkcyan;color:white;font-weight:100;">CONFIRM</a>
    </div>
    
    </div>
    </div>
    ';
            } else {
                echo '
        <div style="text-align: center; padding-top:100px">
    
        <H2>thanks for shooping with us </H2>
    
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2  col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-3">
                <a href="index.php" class="btn btn-lg" style="background:darkcyan;color:white;font-weight:100;">CONFIRM</a>
            </div>
    
        </div>
    </div>';
            }


            $b_query = "DELETE  from cart where Customer = '$customer'  ";
            mysqli_query($con, $b_query);
        }
    }












    ?>

</body>

</html>