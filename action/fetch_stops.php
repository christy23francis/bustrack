<?php
include("../auth.php");
include("../db_connect/db.php");

if (isset($_POST['busName'])) {
    $busName = $_POST['busName'];

    $stmt = $db->prepare("SELECT DISTINCT stop FROM stops WHERE bname = :busName");
    $stmt->bindParam(':busName', $busName);
    $stmt->execute();
    $stops = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (!empty($stops)) {
        echo json_encode(["success" => true, "stops" => $stops]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Bus name not provided"]);
}
?>
