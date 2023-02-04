<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php 

  $select = $conn->query("SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");
  $select->execute();
  $allProducts = $select->fetchAll(PDO::FETCH_OBJ);



$zipname = 'bookstore.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($allProducts as $product) {
  $zip->addFile("books/". $product->product_file);
}
$zip->close();

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
readfile($zipname);