<?php
session_start();
include('../db_connect/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Log_Id = $_POST['Log_Id'];
    $cname = $_POST['cname'];
    $ccntno = $_POST['ccntno'];
    $bname = $_POST['bname'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    $payment_type = $_POST['payment_type'];
    $upi_id = isset($_POST['upi_id']) ? $_POST['upi_id'] : '';

    if ($payment_type == "upi" && empty($upi_id)) {
        die("UPI ID is required for UPI payments.");
    }

    // Process payment
    if ($payment_type == "wallet") {
        $walletQuery = $db->prepare("SELECT amt FROM wallet WHERE Log_Id = ?");
        $walletQuery->execute([$Log_Id]);
        $wallet = $walletQuery->fetch();
        $wallet_balance = $wallet ? $wallet['amt'] : 0;

        if ($wallet_balance < $amount) {
            die("Insufficient wallet balance.");
        }

        // Deduct wallet amount
        $db->prepare("UPDATE wallet SET amt = amt - ? WHERE Log_Id = ?")->execute([$amount, $Log_Id]);
    }

    // Insert into payments table
    $stmt = $db->prepare("INSERT INTO payment (Log_Id, cname, ccntno, bname, frm, retrun, amt, date, tme, status) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), ?)");
    $payment_status = ($payment_type == "wallet") ? "Paid" : "Pending";
    $stmt->execute([$Log_Id, $cname, $ccntno, $bname, $from, $to, $amount, $payment_status]);

    $payment_id = $db->lastInsertId();

    if ($payment_type == "wallet") {
        header("Location: ../ticket.php?payment_id=$payment_id");
        exit();
    } else {
        $_SESSION['upi_payment_data'] = [
            'Log_Id' => $Log_Id,
            'cname' => $cname,
            'ccntno' => $ccntno,
            'bname' => $bname,
            'from' => $from,
            'to' => $to,
            'amount' => $amount,
            'payment_type' => $payment_type,
            'upi_id' => $upi_id
        ];
        header("Location: ../upi_processing.php");
        exit();
    }
}
?>
