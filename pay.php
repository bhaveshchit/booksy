<?php
require('instamojo.php');
const API_KEY = "8ee37a1f8865d9fc02b99ee238fa1b0f";
const AUTH_TOKEN = "f87a238e65dba86be3c3f933f5c6be4d";


if (isset($_POST['purpose']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount'])) {
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN);

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $_POST['purpose'],
            "buyer_name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "send_email" => true,
            "email" => $_POST['email'],
            "redirect_url" => "http://localhost/projects/booksy/success.php"
        ));
        header('Location:' . $response['longurl']);
    } catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
}
