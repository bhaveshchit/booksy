<?php


require_once('startsession.php');
include_once('dbconnect.php');


if (isset($_SESSION['username'])) {
    if (isset($_GET['pid']) and isset($_GET['total']) and isset($_GET['quantity'])) {
        $uid = $_SESSION['username'];
        $pid = $_GET['pid'];
        $amount = $_GET['total'];
        $quantity = $_GET['quantity'];
        $query = "INSERT INTO order_info (pid, customer, method,price,quantity,status,date) VALUES ('$pid', '$uid', 'paytm','$amount','$quantity','pending',NOW())";
        mysqli_query($con, $query);
    }
}



?>

<?php



header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");



$html = '<form method="post" action="pay.php" name="frmpayment"
style = "display:none;">

<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="name" autocomplete="off" value="' . $uid . '"></td>

<input id="CUST_ID" tabindex="2" maxlength="120" size="12" name="purpose" autocomplete="off" value="' . $pid . '"></td>

<input id="CUST_ID" tabindex="2" maxlength="120" size="12" name="email" autocomplete="off" value="' . $_SESSION['email'] . '"></td>

<input id="CUST_ID" tabindex="2" maxlength="120" size="12" name="amount" autocomplete="off" value="' . $amount . '"></td>

<input value="CheckOut" type="submit" onclick=""></td>
        
</form><script type="text/javascript">
document.frmpayment.submit();
</script>';
echo $html;

?>