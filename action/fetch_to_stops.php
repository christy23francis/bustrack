<?php
include('../db_connect/db.php');

if (isset($_POST['from'])) {
    $from = $_POST['from'];

    // Query to get the stops for buses that have the selected "From" stop
    $query = "SELECT DISTINCT s2.stop 
              FROM stops s1 
              JOIN stops s2 ON s1.vno = s2.vno 
              WHERE s1.stop = :from AND s2.stop != :from";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':from', $from);
    $stmt->execute();

    echo '<option value="">Select</option>';
    while ($row = $stmt->fetch()) {
        echo '<option value="' . $row['stop'] . '">' . $row['stop'] . '</option>';
    }
}
?>
