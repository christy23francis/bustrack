<?php
session_start();
include('db_connect/db.php');

if (!isset($_GET['payment_id'])) {
    die("Invalid access.");
}

$payment_id = $_GET['payment_id'];
$is_old = isset($_GET['is_old']) ? $_GET['is_old'] : false;

// Fetch payment details
$stmt = $db->prepare("SELECT * FROM payment WHERE wlt_id = ?");
$stmt->execute([$payment_id]);
$payment = $stmt->fetch();

if (!$payment) {
    die("Payment not found.");
}

// Generate a random Ticket ID
$ticket_id = "TKT" . rand(100000, 999999);

// Fetch conductor contact from bus table
$bus_stmt = $db->prepare("SELECT ocntno FROM vehicle WHERE bname = ?");
$bus_stmt->execute([$payment['bname']]);
$bus = $bus_stmt->fetch();
$conductor_phone = $bus ? $bus['ocntno'] : "N/A";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/css.php"); ?>
    <title>Ticket Details</title>
    <style>
        .container { 
            max-width: 400px; 
            margin: auto; 
            padding: 20px; 
            border-radius: 10px; 
            background: #f8f9fa; 
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
            text-align: center;
        }
        .success-message {
            background: #28a745; 
            color: white; 
            padding: 10px; 
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
        }
        h3 { color: green; }
        p { font-size: 16px; margin: 5px 0; }
        .home-btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="osahan-listing">
    <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
        <h5 class="font-weight-normal mb-0 text-white">
            <a class="text-danger" href="<?php echo $is_old ? 'ticket_list.php' : 'home.php'; ?>">
                <i class="icofont-rounded-left"></i>
            </a> Ticket Details
        </h5>
        <div class="ml-auto d-flex align-items-center">
            <a href="home.php" class="text-white h6 mb-0"><i class="icofont-search-1"></i></a>
        </div>
    </div>

    <div class="container">
        <?php if (!$is_old) { ?>
            <!-- Success Message -->
            <div class="success-message">
                🎉 Payment Successful! Your ticket has been confirmed.
            </div>
            <h3>Ticket Confirmation</h3>
        <?php } ?>
        <?php if ($is_old) { ?>
            <h3>Ticket Details</h3>
        <?php } ?>

        <p><strong>Ticket ID:</strong> <?php echo $ticket_id; ?></p>
        <p><strong>Bus:</strong> <?php echo $payment['bname']; ?></p>
        <p><strong>Route:</strong> <?php echo $payment['frm']; ?> → <?php echo $payment['retrun']; ?></p>
        <p><strong>Amount Paid:</strong> ₹<?php echo $payment['amt']; ?></p>
        <p><strong>Conductor Contact:</strong> <?php echo $conductor_phone; ?></p>

        <?php if (!$is_old) { ?>
            <!-- Go to Home Button -->
            <a href="home.php" class="home-btn">Go to Home</a>
        <?php } ?>
    </div>
</div>
</body>
</html>
