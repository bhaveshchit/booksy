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






        if (isset($_GET['pid']) and isset($_GET['total']) and isset($_GET['quantity'])) {

            $customer = $_SESSION['username'];
            $pid = $_GET['pid'];
            $price = $_GET['total'];
            $quantity = $_GET['quantity'];
            $query = "INSERT INTO order_info (pid, customer, method,price,quantity,status,date) VALUES ('$pid', '$customer', 'cod','$price','$quantity','success',NOW())";
            mysqli_query($con, $query);

            $j_query = "SELECT order_id from order_info where pid = '$pid' and customer = '$customer' and status = 'success'";
            $j_result = mysqli_query($con, $j_query);

            if (mysqli_num_rows($j_result) > 0) {
                while ($j_row = mysqli_fetch_assoc($j_result)) {
                    $order_id =  $j_row["order_id"];
                }
            }





            $email_query = "SELECT email from booksy_user where username = '$customer'";
            $result = mysqli_query($con, $email_query);

            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_array($result);
                $r_email = $data['email'];
            }






            $to_email = $r_email;
            $subject = "Order Placed";
            $body = "Hi $customer, Your order has been placed. your order-id: $order_id and your books worth of Rs.$price is on the way. THANKS FOR THE SHOPPING";
            $headers = "From: sedvick99@gmail.com";

            if (mail($to_email, $subject, $body, $headers)) {
        ?>



             <div style="text-align: center; padding-top:100px">

                 <H2>thanks for shooping with us </H2>

                 <div class="row">
                     <div class="col-xs-8 col-xs-offset-2  col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-3">
                         <a href="index.php" class="btn btn-lg" style="background:darkcyan;color:white;font-weight:100;">CONFIRM</a>
                     </div>

                 </div>
             </div>

     <?php

            } else {
                echo "Email sending failed...";
            }



            $b_query = "DELETE  from cart where Customer = '$customer'  ";
            mysqli_query($con, $b_query);
        }
        ?>
 </body>

 </html>