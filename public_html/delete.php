<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php';

$id = $_GET["id"]; /*_REQUEST  GET  or POST*/

if ($id !="") {

    $sql = "DELETE FROM `product` WHERE `id`=:id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $exeres = $stmt->execute();
    if ($exeres) {
        echo "<script>alert('刪除成功'); location.href = 'http://beta.sonychou.com';</script>";
    }
} else {
    echo "請稍後再試";
}
?>