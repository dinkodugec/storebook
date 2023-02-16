<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php 

if(isset($_SERVER['HTTP_REFERER'])){
  //redirect them to your desired location
  header('Location: http://store.hr:8080/');
  exit;
}

  $select = $conn->query("SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");
  $select->execute();
  $allProducts = $select->fetchAll(PDO::FETCH_OBJ);



$zipname = 'bookstore.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($allProducts as $product) {
 /*  $zip->addFile("http://store.hr:8080/admin-panel/products-admins/books/". $product->product_file); */
  $zip->addFile("admin-panel/products-admins/books/". $product->product_file);
}
$zip->close();

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
readfile($zipname);

$select = $conn->query("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'");
$select->execute();

header("Location: http://store.hr:8080/index.php?download.php "); 