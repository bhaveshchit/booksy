<?php

require_once('startsession.php');
include_once('dbconnect.php');


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if ($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {

		$oid = $_POST['ORDERID'];
		$TXNID = $_POST['TXNID'];
		$AAMONT = $_POST['TXNAMOUNT'];
		$midd = $_POST['MID'];
		$DATE = $_POST['TXNDATE'];
		$updatequery = "UPDATE order_info set status = 'success' where order_id = '$oid'";
		$query = mysqli_query($con, $updatequery);
		$updatequery1 = "UPDATE order_info set paytm_id = '$TXNID' where order_id = '$oid'";
		$query = mysqli_query($con, $updatequery1);


		$u_query = "SELECT customer from order_info where order_id = '$oid'";
		$result = mysqli_query($con, $u_query);

		if (mysqli_num_rows($result) == 1) {
			$j = mysqli_fetch_array($result);
			$customer = $j['customer'];
		}






		$email_query = "SELECT email from booksy_user where username = '$customer'";
		$result = mysqli_query($con, $email_query);

		if (mysqli_num_rows($result) == 1) {
			$data = mysqli_fetch_array($result);
			$r_email = $data['email'];
		}






		$to_email = $r_email;
		$subject = "Order Placed";
		$body = "Hi $customer, Your order has been placed on $DATE. your order-id: $oid and your books worth of Rs.$AAMONT is on the way. THANKS FOR THE SHOPPING";
		$headers = "From: sedvick99@gmail.com";

		if (mail($to_email, $subject, $body, $headers)) {
?>
			<script>
				alert("check your email, your order has been placed,thanks for shopping with us");
			</script>



<?php
			echo '
	 <a href="index.php">
	 Back to home
	</a>';
		} else {
			echo "Email sending failed...";
		}
	} else {
	}
} else {
}

$b_query = "DELETE  from cart where Customer = '$customer'  ";
mysqli_query($con, $b_query);
