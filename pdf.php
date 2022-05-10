<?php
require('vendor/autoload.php');
require('dbconnect.php');
?>

<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-align:center;padding-top:10%;">

    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">DATE</label>
        <div class="col-lg-10">
            <input type="date" class="form-control" id="inputName" name="name" placeholder="fullname" important>
        </div>
    </div>
    <br><br>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>

        <?php

        if (isset($_POST['submit'])) {
            $DAR = $_POST['name'];




            $res = mysqli_query($con, "SELECT pid,date,order_id,method,customer,price,quantity,address,city,state,pincode,number from order_info INNER JOIN user_info ON order_info.customer=user_info.username where date = '$DAR'");
            if (mysqli_num_rows($res) > 0) {
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
                while ($row = mysqli_fetch_assoc($res)) {
                    $html .= '<tr>
                <td>' . $row['order_id'] . '</td>
                <td>' . $row['customer'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['quantity'] . '</td>
                <td>' . $row['pid'] . '</td>
                <td>' . $row['method'] . '</td>
                <td>' . $row['address'] . '</td>
                <td>' . $row['city'] . '</td>
                <td>' . $row['state'] . '</td>
                <td>' . $row['pincode'] . '</td>
                <td>' . $row['number'] . '</td>
            </tr>';
                }
                $html .= '</table>';
            } else {
                $html = "Data not found";
            }
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $file = time() . '.pdf';
            $mpdf->output($file, 'D');
            //D
            //I
            //F
            //S

        }
