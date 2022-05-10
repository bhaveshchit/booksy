<?php


include_once('dbconnect.php');
require('vendor/autoload.php');

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>


    <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <div class="form-group">
            <label for="inputName" class="col-lg-2 control-label">NAME</label>
            <div class="col-lg-10">
                <input type="date" class="form-control" id="inputName" name="name" placeholder="fullname">
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
    </form><br><br><br>';


    <?php






    if (isset($_POST['submit'])) {
        $DAR = $_POST['name'];




        $res1 = mysqli_query($con, "SELECT pid,date,order_id,method,customer,price,quantity,address,city,state,pincode,number from order_info INNER JOIN user_info ON order_info.customer=user_info.username where date = '$DAR'");
        if (mysqli_num_rows($res1) > 0) {
            $html = '<style></styl>
<table class="table">';
            $html .= '<tr>
        <td>ID</td>
        <td>username</td>
        <td>price</td>
        <td>quantity</td>
        <td>product</td>
        <td>method</td>
        <td>address</td>
        <td>city</td>
        <td>state</td>
        <td>pincode</td>
        <td>number</td>
    </tr>';
            while ($row1 = mysqli_fetch_assoc($res1)) {
                $html .= '<tr>
        <td>' . $row1['order_id'] . '</td>
        <td>' . $row1['customer'] . '</td>
        <td>' . $row1['price'] . '</td>
        <td>' . $row1['quantity'] . '</td>
        <td>' . $row1['pid'] . '</td>
        <td>' . $row1['method'] . '</td>
        <td>' . $row1['address'] . '</td>
        <td>' . $row1['city'] . '</td>
        <td>' . $row1['state'] . '</td>
        <td>' . $row1['pincode'] . '</td>
        <td>' . $row1['number'] . '</td>
    </tr>';
            }
            $html .= '</table>';
        } else {
            $html = "Data not found";
        }
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file = time() . '.pdf';
        $mpdf->output($file, 'I');
        //D
        //I
        //F
        //S

    }




    ?>







    <table class="table">
        <tr>
            <th>Id</th>
            <th>Customer</th>
            <th>PRICE</th>
            <th>PID</th>

            <th>METHOD</th>
            <th>ADDRESS</th>
            <th>CITY</th>
            <th>STATE</th>
            <th>PINCODE</th>
            <th>NUMBER</th>


        </tr>
    </table>

    <?php
    /*
    $query = "SELECT * FROM order_info WHERE status = 'success'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result)  > 0) {


        $row = mysqli_fetch_all($result);
        $id = $row['order_id'];
        $price = $row['price'];
        $method = $row['method'];
        $customer = $row['customer'];
        $pid = $row['pid'];
    }
    $query1 = "SELECT * FROM user_info WHERE username =  '$customer'";
    $result1 = mysqli_query($con, $query1);

    if (mysqli_num_rows($result1)  > 0) {
        $row1 = mysqli_fetch_all($result1);
        $add = $row1['$address'];
        $city = $row1['city'];
        $state = $row1['state'];
        $pincode = $row1['pincode'];
        $number = $row1['number'];
    }
    $query2 = "SELECT * FROM products WHERE PID = ' $pid'";
    $result2 = mysqli_query($con, $query2);

    if (mysqli_num_rows($result2)  > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        $title = $row2['Title'];
    }
    $query3 = "SELECT email FROM booksy_user WHERE username = ' $customer'";
    $result3 = mysqli_query($con, $query3);

    if (mysqli_num_rows($result3)  > 0) {
        $row3 = mysqli_fetch_assoc($result3);
        $email = $row3['email'];
    }


    echo '
    <br><br><br>
    <table class="table">
    <tr>
        <th>Id</th>
        <th>Customer</th>
        <th>PRICE</th>
        <th>PID</th>
        
        <th>METHOD</th>
        <th>ADDRESS</th>
        <th>CITY</th>
        <th>STATE</th>
        <th>PINCODE</th>
        <th>NUMBER</th>
        
        <th>EMAIL</th>

    </tr>

    <tr>
        <td>' . $id . '</td>
        <td>' . $customer . '</td>
        <td>' . $price  . '</td>
        <td>' . $pid . '</td>
       
        <td>' . $method . '</td>
        <td>' . $add . '</td>
        <td>' . $city . '</td>
        <td>' . $state . '</td>
        <td>' . $pincode . '</td>
        <td>' . $number . '</td>
        <td>' . $email . '</td>
    </tr>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>' .  $row['Quantity']  . '</th>
        <th>' . $Stotal . '</th>
    </tr>
    <th>TITLE</th>
    <td>' . $title . '</td> ;
</table>';

*/
    ?>


    <?php
    $res = mysqli_query($con, "SELECT pid,date,order_id,method,customer,price,quantity,address,city,state,pincode,number from order_info INNER JOIN user_info ON order_info.customer=user_info.username ");



    if (mysqli_num_rows($res) > 0) {


        while ($row = mysqli_fetch_assoc($res)) {

            echo  ' <table class="table" >  <tr>  <td>' . $row['order_id'] . '  </td>
<td>    ' . $row['customer'] . '</td>
<td>  ' .  $row['price'] . '</td>
<td>  ' .  $row['quantity'] . '</td>
<td> ' . $row['pid'] . '</td>
<td> ' . $row['method'] . '</td>
<td> ' . $row['address'] . '</td>
<td> ' . $row['city'] . '</td>
<td> ' . $row['state'] . '</td>
<td> ' . $row['pincode'] . '</td>
<td> ' . $row['number'] . '</td>


<tr></table>';
        }
    }















    ?>



</body>

</html>