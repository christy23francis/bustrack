<?php
include('../db_connect/db.php');

if (isset($_POST['busName'])) {
    $busName = $_POST['busName'];

    $result = $db->prepare("SELECT stop FROM stops WHERE bus_name = :busName");
    $result->bindParam(':busName', $busName);
    $result->execute();

    $stops = [];
    while ($row = $result->fetch()) {
        $stops[] = $row['stop'];
    }

    echo json_encode($stops);
}
?>