<?php
include("auth.php");
include('db_connect/db.php');
$Log_Id = $_SESSION['SESS_PASSENGER_ID'];

// Get Passenger Details
$result = $db->prepare("SELECT * FROM passenger WHERE Log_Id = ?");
$result->execute([$Log_Id]);
$user = $result->fetch();
$name = $user["name"];
$cntno = $user["cntno"];
$email = $user["email"];

// Get Bus Details
$bname = $_GET['bname'];
$vno = $_GET['vno'];
$from = $_GET['from'];
$to = $_GET['to'];
$start_time = $_GET['start_time'];
$end_time = $_GET['end_time'];
$amount = $_GET['amount'];

$walletQuery = $db->prepare("SELECT amt FROM wallet WHERE email = :email");
$walletQuery->execute(['email' => $user["email"]]); // Replace with actual email field
$wallet = $walletQuery->fetch();
$wallet_balance = $wallet ? $wallet['amt'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/css.php"); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 30px auto;
        }
        h4 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            margin: 5px 0;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }
        .btn-danger {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        #wallet-info {
            font-weight: bold;
            display: block;
            margin-top: 5px;
            color: green;
        }
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
<div class="container mt-4">
    <h4>Confirm Your Payment</h4>
    <form action="action/process_payment.php" method="post">
        <input type="hidden" name="Log_Id" value="<?php echo $Log_Id; ?>">
        <input type="hidden" name="cname" value="<?php echo $name; ?>">
        <input type="hidden" name="ccntno" value="<?php echo $cntno; ?>">
        <input type="hidden" name="bname" value="<?php echo $bname; ?>">
        <input type="hidden" name="vno" value="<?php echo $vno; ?>">
        <input type="hidden" name="from" value="<?php echo $from; ?>">
        <input type="hidden" name="to" value="<?php echo $to; ?>">
        <input type="hidden" name="start_time" value="<?php echo $start_time; ?>">
        <input type="hidden" name="end_time" value="<?php echo $end_time; ?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">

        <p><strong>Bus:</strong> <?php echo $bname . " (" . $vno . ")"; ?></p>
        <p><strong>Route:</strong> <?php echo $from . " → " . $to; ?></p>
        <p><strong>Start Time:</strong> <?php echo $start_time; ?></p>
        <p><strong>End Time:</strong> <?php echo $end_time; ?></p>
        <p><strong>Amount:</strong> ₹<?php echo $amount; ?></p>

        <label><input type="radio" name="payment_type" value="wallet" onclick="togglePayment('wallet')"> Wallet</label>
        <span id="wallet-info" style="display:none; color:green;">Balance: ₹<?php echo $wallet_balance; ?></span>
        <br>
        <label><input type="radio" name="payment_type" value="upi" onclick="togglePayment('upi')"> UPI</label>
        <input type="text" id="upi-input" name="upi_id" class="form-control mt-2" placeholder="Enter UPI ID" style="display:none;">

        <button type="submit" id="pay-button" class="btn btn-danger mt-3" disabled>Pay Now</button>
    </form>
</div>
</div>

<script>
    var wallet_balance = <?php echo $wallet_balance; ?>;
    var amount = <?php echo $amount; ?>;

    function togglePayment(type) {
        if (type === 'wallet') {
            if (wallet_balance >= amount) {
                document.getElementById('wallet-info').style.display = 'inline';
                document.getElementById('upi-input').style.display = 'none';
                document.getElementById('pay-button').disabled = false;
            } else {
                alert("Insufficient wallet balance! Please use UPI.");
                document.getElementById('pay-button').disabled = true;
            }
        } else {
            document.getElementById('wallet-info').style.display = 'none';
            document.getElementById('upi-input').style.display = 'block';
            document.getElementById('pay-button').disabled = true;
        }
    }

    document.getElementById('upi-input').addEventListener('input', function () {
        document.getElementById('pay-button').disabled = this.value.trim() === '';
    });
</script>
</body>
</html>
