<?php
include("auth.php");
include('db_connect/db.php');

$Log_Id = $_SESSION['SESS_PASSENGER_ID'];
$from = isset($_GET["from"]) ? $_GET["from"] : "";
$to = isset($_GET["to"]) ? $_GET["to"] : "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/css.php") ?>
    <style>
        /* Styling for bus listing */
        .bus-list {
            list-style: none;
            padding: 0;
        }
        .bus-item {
            background: white;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
        .bus-item img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
            margin-right: 15px;
        }
        .bus-details {
            flex: 1;
        }
        .bus-details h6 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }
        .bus-details p {
            margin: 3px 0;
            font-size: 14px;
            color: #666;
        }
        .map-container {
            width: 100%;
            height: 350px;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 20px;
        }
    </style>
</head>
<body class="bg-light">

<div class="osahan-listing">
    <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
        <h5 class="font-weight-normal mb-0 text-white">
            <a class="text-white" href="home.php"><i class="icofont-rounded-left"></i> Back</a>
        </h5>
    </div>

    <div class="container mt-3">
        <h5 class="alert alert-danger">Available Buses from <?php echo $from; ?> to <?php echo $to; ?></h5>

        <ul class="bus-list">
            <?php
            if (!empty($from) && !empty($to)) {
                $query = $db->prepare("
                    SELECT s.bname, s.vno, v.photo, 
                           MIN(CASE WHEN s.stop = :from THEN s.time END) AS start_time,
                           MAX(CASE WHEN s.stop = :to THEN s.time END) AS end_time
                    FROM stops s
                    JOIN vehicle v ON s.vno = v.vno
                    WHERE s.stop IN (:from, :to)
                    GROUP BY s.bname, s.vno
                ");
                $query->bindParam(':from', $from);
                $query->bindParam(':to', $to);
                $query->execute();

                if ($query->rowCount() > 0) {
                    while ($row = $query->fetch()) {
                        echo '
                            <li class="bus-item">
                                <img src="app/photos/'.$row['photo'].'" alt="Bus Image">
                                <div class="bus-details">
                                    <h6>'.$row["bname"].' ('.$row["vno"].')</h6>
                                    <p><strong>From:</strong> '.$from.'</p>
                                    <p><strong>To:</strong> '.$to.'</p>
                                    <p><strong>Start Time:</strong> '.$row["start_time"].'</p>
                                    <p><strong>End Time:</strong> '.$row["end_time"].'</p>
                                </div>
                            </li>
                        ';
                    }
                } else {
                    echo '<li class="text-center">No buses available for this route.</li>';
                }
            } else {
                echo '<li class="text-center">Please select a route from the home page.</li>';
            }
            ?>
        </ul>

        <!-- Google Maps -->
        <div class="map-container">
            <iframe 
                style="width:100%; height:100%;" 
                src="https://maps.google.com/maps?saddr=<?php echo urlencode($from); ?>&daddr=<?php echo urlencode($to); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed">
            </iframe>
        </div>

    </div>
</div>

<?php include("include/sidebar.php") ?>
<?php include("include/js.php") ?>

</body>
</html>
