<?php
include 'db.php';
if ($_POST["name"] != "" && $_POST["price"] != "" && $_POST["stock"] != "") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];

    $sql = "INSERT INTO product ( name, price,stock )
                       VALUES
                       ( :name, :price,:stock );";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $exeres = $stmt->execute();
    if ($exeres) {
        echo "儲存成功!!";
    }
} else {
    echo "有欄位未填寫";
}
?>

