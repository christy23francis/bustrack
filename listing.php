<?php
include("auth.php");
include('db_connect/db.php');

$from = isset($_GET['from']) ? $_GET['from'] : '';
$to = isset($_GET['to']) ? $_GET['to'] : '';

// Fetch buses that have stops matching "from" and "to"
$query = "SELECT DISTINCT v.vh_id, v.bname, v.vno, v.vtype, v.ulocation, v.ocntno, v.photo
          FROM vehicle v
          JOIN stops s1 ON v.bname = s1.bname
          JOIN stops s2 ON v.bname = s2.bname
          WHERE s1.stop = :from AND s2.stop = :to";

$stmt = $db->prepare($query);
$stmt->bindParam(':from', $from);
$stmt->bindParam(':to', $to);
$stmt->execute();
$buses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/css.php"); ?>
    <style>
        .bus-card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }
        .bus-card:hover {
            transform: scale(1.02);
        }
        .bus-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }
        .fare-badge {
            background-color: #28a745;
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: bold;
        }
        .book-btn {
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            border: none;
            font-size: 16px;
            padding: 10px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }
        .book-btn:hover {
            background: linear-gradient(to right, #ff4b2b, #ff416c);
        }
        #map {
            height: 300px;
            width: 100%;
            border-radius: 12px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-light">
<div class="osahan-listing">
    <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
        <h5 class="font-weight-normal mb-0 text-white">
            <a class="text-danger" href="home.php"><i class="icofont-rounded-left"></i></a> Bus Listing
        </h5>
        <div class="ml-auto d-flex align-items-center">
            <a href="home.php" class="text-white h6 mb-0"><i class="icofont-search-1"></i></a>
        </div>
    </div>

    <div class="container mt-4">
          <!-- Selected Route Summary -->
        <div class="alert alert-info text-center">
            <strong>Selected Route:</strong> <?php echo htmlspecialchars($from); ?> → <?php echo htmlspecialchars($to); ?>
        </div>

        <?php if (!empty($buses)): ?>
            <div class="row">
                <?php foreach ($buses as $bus): ?>
                    <?php
                    // Get start and end time for the bus route
                    // Get start time (departure time from 'from' stop)
                    $stmt = $db->prepare("SELECT time FROM stops WHERE stop = :from AND bname = :bname");
                    $stmt->bindParam(':from', $from);
                    $stmt->bindParam(':bname', $bus['bname']);
                    $stmt->execute();
                    $fromTime = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Get end time (arrival time at 'to' stop)
                    $stmt = $db->prepare("SELECT time FROM stops WHERE stop = :to AND bname = :bname");
                    $stmt->bindParam(':to', $to);
                    $stmt->bindParam(':bname', $bus['bname']);
                    $stmt->execute();
                    $toTime = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Get distances for fare calculation
                    $stmt = $db->prepare("SELECT distance FROM stops WHERE stop = :from AND bname = :bname");
                    $stmt->bindParam(':from', $from);
                    $stmt->bindParam(':bname', $bus['bname']);
                    $stmt->execute();
                    $fromDistance = $stmt->fetch(PDO::FETCH_ASSOC);

                    $stmt = $db->prepare("SELECT distance FROM stops WHERE stop = :to AND bname = :bname");
                    $stmt->bindParam(':to', $to);
                    $stmt->bindParam(':bname', $bus['bname']);
                    $stmt->execute();
                    $toDistance = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Calculate fare
                    if ($fromDistance && $toDistance) {
                        $dist = abs($toDistance['distance'] - $fromDistance['distance']); // Absolute distance
                        $fare = ($dist < 2.5) ? 10 : (10 + ($dist / 2.5));
                    } else {
                        $fare = "N/A";
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="card bus-card">
                            <img src="app/photos/<?php echo htmlspecialchars($bus['photo']); ?>" class="bus-img" alt="Bus Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($bus['bname']); ?> (<?php echo htmlspecialchars($bus['vno']); ?>)</h5>
                                <p class="card-text">Type: <?php echo htmlspecialchars($bus['vtype']); ?></p>
                                <p class="card-text">Start Time: <?php echo isset($fromTime['time']) ? $fromTime['time'] : 'N/A'; ?></p>
                                <p class="card-text">End Time: <?php echo isset($toTime['time']) ? $toTime['time'] : 'N/A'; ?></p>
                                <span class="fare-badge">Fare: ₹<?php echo $fare; ?></span>
                                <br><br>
 <a href="payment.php?bname=<?php echo urlencode($bus['bname']); ?> &vno=<?php echo urlencode($bus['vno']); ?>&from=<?php echo urlencode($from); ?>&to=<?php echo urlencode($to); ?>&start_time=<?php echo isset($fromTime['time']) ? urlencode($fromTime['time']) : ''; ?>&end_time=<?php echo isset($toTime['time']) ? urlencode($toTime['time']) : ''; ?>&amount=<?php echo urlencode($fare); ?>&ocntno=<?php echo urlencode($bus['ocntno']); ?>"
                                class="btn book-btn btn-block">Book Now</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-danger text-center">No buses available for the selected route.</div>
        <?php endif; ?>
        
        <!-- Google Maps -->
        <div class="map-container mt-4">
            <iframe 
                style="width:100%; height:500px;" 
                src="https://maps.google.com/maps?saddr=<?php echo urlencode($from); ?>&daddr=<?php echo urlencode($to); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed">
            </iframe>
        </div>
    </div>
</div>

<?php include("include/js.php"); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>
</body>
</html>
