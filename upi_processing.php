<?php
session_start();
include('db_connect/db.php');

if (!isset($_SESSION['upi_payment_data'])) {
    die("Error: No payment data received.");
}

$paymentData = $_SESSION['upi_payment_data'];

// Extract values
$Log_Id = $paymentData['Log_Id'];
$cname = $paymentData['cname'];
$ccntno = $paymentData['ccntno'];
$bname = $paymentData['bname'];
$from = $paymentData['from'];
$to = $paymentData['to'];
$amount = $paymentData['amount'];
$payment_type = $paymentData['payment_type'];
$upi_id = $paymentData['upi_id'];

if ($payment_type == "upi" && empty($upi_id)) {
    die("UPI ID is required for UPI payments.");
}

// Insert payment details into the payments table
$stmt = $db->prepare("INSERT INTO payment (Log_Id, cname, ccntno, bname, frm, retrun, amt, date, tme, status) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), ?)");
$payment_status = ($payment_type == "wallet") ? "Paid" : "Pending";
$stmt->execute([$Log_Id, $cname, $ccntno, $bname, $from, $to, $amount, $payment_status]);

$payment_id = $db->lastInsertId(); // Get the last inserted payment ID

// If UPI payment, update status to "Paid"
if ($payment_type == "upi") {
    $updateStmt = $db->prepare("UPDATE payment SET status = 'Paid' WHERE wlt_id = ?");
    $updateStmt->execute([$payment_id]);
}

// Redirect based on payment type
if ($payment_type == "wallet") {
    header("Location: ticket.php?payment_id=$payment_id");
    exit();
} else {
    $_SESSION['payment_id'] = $payment_id;
    $_SESSION['bus_name'] = $bname;
    $_SESSION['ccntno'] = $ccntno;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/css.php"); ?>
    <meta http-equiv="refresh" content="15;url=ticket.php?payment_id=<?php echo $payment_id; ?>">
    <title>Processing Payment</title>
    <style>
        .container { max-width: 400px; margin: auto; padding: 20px; border-radius: 10px; background: #f8f9fa; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); }
        h3 { color: green; }
    </style>
</head>
<body>
<div class="osahan-listing">
    <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
        <h5 class="font-weight-normal mb-0 text-white">
            <a class="text-danger" href="home.php"><i class="icofont-rounded-left"></i></a> Payment
        </h5>
        <div class="ml-auto d-flex align-items-center">
            <a href="home.php" class="text-white h6 mb-0"><i class="icofont-search-1"></i></a>
        </div>
    </div>
    <div class="container">
        <h3>Processing your UPI payment...</h3>
        <p>Please accept the transaction in your UPI app.</p>
        <p>You will be redirected to your ticket shortly after completing payment.</p>
    </div>
</div>
</body>
</html>
