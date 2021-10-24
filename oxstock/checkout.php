<?php
require_once("includes/braintree_init.php");

$amount = $_POST["amount"];
$amount_usd = 0.5 * $_POST['amount'];
$nonce = $_POST["payment_method_nonce"];

$conn = mysqli_connect("localhost", "root", "", "oxstock");

//$UserData = fetchqry('*',TB_USER,array("id="=>$userId));
$from_wallet = $UserData['wallet'];

$sql = "INSERT INTO wallet_data (amount_ox, amount_usd, from_wallet, to_wallet, method) VALUES ('$amount','$amount_usd','$from_wallet','-','IN')";
mysqli_query($conn, $sql);

$result = $gateway->transaction()->sale([
    'amount' => $amount*0.5*1.022,
    'paymentMethodNonce' => $nonce,
    'options' => [
        'submitForSettlement' => true
    ]
]);

if ($result->success || !is_null($result->transaction)) {
    $transaction = $result->transaction;
    header("Location: transaction.php?id=" . $transaction->id);
} else {
    $errorString = "";

    foreach($result->errors->deepAll() as $error) {
        $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
    }

    $_SESSION["errors"] = $errorString;
    header("Location: wallet.php");
}
