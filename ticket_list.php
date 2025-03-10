<?php
session_start();
include('db_connect/db.php');

// Fetch all tickets
$Log_Id = $_SESSION['SESS_PASSENGER_ID'];

$stmt = $db->prepare("SELECT wlt_id, cname, bname, frm, retrun, amt, status, date 
                      FROM payment 
                      WHERE status = 'Paid' AND Log_Id = ? 
                      ORDER BY wlt_id DESC");
$stmt->execute([$Log_Id]);
$tickets = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/css.php"); ?>
    <title>My Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        .ticket {
            background: white;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: 0.3s;
        }
        .ticket:hover {
            transform: scale(1.02);
        }
        .ticket h4 {
            margin: 0;
            color: #333;
        }
        .ticket p {
            margin: 5px 0;
            color: #555;
            font-size: 14px;
        }
        .status {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .paid {
            background: #28a745;
            color: white;
        }
        .pending {
            background: #ffc107;
            color: black;
        }
    </style>
</head>
<body>
<div class="osahan-listing">
    <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
        <h5 class="font-weight-normal mb-0 text-white">
            <a class="text-danger" href="home.php"><i class="icofont-rounded-left"></i></a> My Tickets
        </h5>
        <div class="ml-auto d-flex align-items-center">
            <a href="home.php" class="text-white h6 mb-0"><i class="icofont-search-1"></i></a>
        </div>
    </div>
    <div class="container">
        <?php if (count($tickets) > 0): ?>
            <?php foreach ($tickets as $ticket): ?>
                <div class="ticket" onclick="window.location.href='ticket.php?is_old=true&payment_id=<?php echo $ticket['wlt_id']; ?>'">
                    <div>
                        <h4><?php echo htmlspecialchars($ticket['bname']); ?></h4>
                        <p><strong><?php echo htmlspecialchars($ticket['cname']); ?></strong></p>
                        <p><?php echo htmlspecialchars($ticket['frm']) . " → " . htmlspecialchars($ticket['retrun']); ?></p>
                        <p><strong>₹<?php echo number_format($ticket['amt'], 2); ?></strong></p>
                    </div>
                    <div class="status <?php echo ($ticket['status'] === 'Paid') ? 'paid' : 'pending'; ?>">
                        <?php echo htmlspecialchars($ticket['status']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No tickets found.</p>
        <?php endif; ?>
    </div>
</div>


</body>
</html>
