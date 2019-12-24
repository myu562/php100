<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php';
$name = $_POST["update_name"];
$price = $_POST["update_price"];
$stock = $_POST["update_stock"];
$id = $_POST["update_id"];

if ($name != "" && $price != "" && $stock !="") {


    $sql = "UPDATE `product` SET `name` = :name, `price` = :price, `stock` = :stock WHERE `id` = :id;";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':id', $id);
    $exeres = $stmt->execute();
    if ($exeres) {
        echo "<script>alert('儲存成功'); location.href = 'http://beta.sonychou.com';</script>";
    }
} else {
    echo "<script>alert('欄位未填'); location.href = 'http://beta.sonychou.com';</script>";
}
?>
