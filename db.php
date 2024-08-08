<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
    echo json_encode($product);
}
?>
