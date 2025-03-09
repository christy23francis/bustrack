<?php
// Include authentication and database connection
include("../auth.php");
include('../db_connect/db.php');

if (isset($_POST['fromStop']) && isset($_POST['toStop'])) {
    $fromStop = $_POST['fromStop'];
    $toStop = $_POST['toStop'];

    try {
        // Fetch the distance for the 'From' stop
        $stmt = $db->prepare("SELECT distance FROM stops WHERE stop = :fromStop");
        $stmt->bindParam(':fromStop', $fromStop);
        $stmt->execute();
        $fromDistance = $stmt->fetch(PDO::FETCH_ASSOC);

        // Fetch the distance for the 'To' stop
        $stmt = $db->prepare("SELECT distance FROM stops WHERE stop = :toStop");
        $stmt->bindParam(':toStop', $toStop);
        $stmt->execute();
        $toDistance = $stmt->fetch(PDO::FETCH_ASSOC);
        $dist=$toDistance['distance'] - $fromDistance['distance'];
        if ($dist < 2.5) {
            $fare = 10;
        } else if ($dist> 2.5){
            $fare = 10 + ($dist / 2.5);
        }
        
        if ($fromDistance && $toDistance) {
            echo $fare;
        } else {
            echo "Error: Invalid stops";
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
} else {
    echo "Error: Missing parameters";
}
?>
