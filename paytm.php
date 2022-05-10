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


$j_query = "SELECT order_id from order_info where pid = '$pid' and customer = '$uid' and status = 'pending'";
$j_result = mysqli_query($con, $j_query);

if (mysqli_num_rows($j_result) > 0) {
    while ($j_row = mysqli_fetch_assoc($j_result)) {
        $order_id =  $j_row["order_id"];
    }
}
?>

<?php



header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");



$html = '<form method="post" action="pgRedirect.php" name="frmpayment"
style = "display:none;">
<input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="' . $order_id . '">
<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="' . $uid . '"></td>
<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
<input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
<input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="' . $amount . '">
<input value="CheckOut" type="submit" onclick=""></td>
        
</form><script type="text/javascript">
document.frmpayment.submit();
</script>';
echo $html;

?>