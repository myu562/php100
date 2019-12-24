<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, height=device-height">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->
        <link rel="stylesheet" href="/include/css/index.css">
        <title>SONY的PHP鐵人試煉</title>
    </head>
    <body>
        <div id="head-top">
            <div id="title" class="fonts">松穎的PHP鐵人試煉</div>
            <div id="sub-title" class="fonts">新增商品</div>
        </div>
        <form action="save.php" method="post">
            <div class="product-item"><div class="product-desc">產品名：</div><input type="text" name="name" value="<?= $_POST["name"] ?>"></div>
            <div class="product-item"><div class="product-desc">價格：</div><input type="text" name="price" value="<?= $_POST["price"] ?>"></div>
            <div class="product-item"><div class="product-desc">庫存：</div><input type="text" name="stock" value="<?= $_POST["stock"] ?>"></div>
　          <input class="button" type="submit" value="送出表單">
        </form>
        <br />
        <h2>搜尋</h2>
        <form action="index.php" method="post">
            產品名：<input type="text" name="search_name" value=""><br>
         <!--   價格：<input type="text" name="search_price" value=""><br>
            庫存：<input type="text" name="search_stock" value=""><br> -->
　          <input type="submit" value="列表">
        </form>
        <br />
    </body> 
</html>
<?php
//var_dump($_POST);

$search_name = $_POST["search_name"];
//$search_price = $_POST["search_price"];
//$search_stock = $_POST["search_stock"];

$sql = "SELECT * FROM `product` WHERE 1=1";
if ($search_name != "") {
    $sql .= " and `name` LIKE '%" . $search_name . "%'";
    $stmt = $db->prepare($sql);
    $exeres = $stmt->execute();
    if ($exeres) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $stock = $row['stock'];
            ?>
            <form action="update.php" method="post">
                <input type="hidden" name="update_id" value="<?= $id ?>"><br>
                新名稱<input type="text" name="update_name" value="<?= $name ?>"><br>
                新價格<input type="text" name="update_price" value="<?= $price ?>"><br>
                新庫存 <input type="text" name="update_stock" value="<?= $stock ?>"><br>
                <input type="submit" value="儲存">
                <a href="delete.php?id=<?= $id ?>">刪除</a>
            </form>
            <?php
        }
    }
}
/* if ($search_price != ""){
  $sql.= " `price` LIKE '%" . $search_price . "%'";
  }
  if ($search_stock != ""){
  $sql.= " `stock` LIKE '%" . $search_stock . "%'";
  }
 */
?>
/*CRUD*/