<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if(!isset($_SESSION['username'])){
          header("Location: http://store.hr:8080/");
        }
?>

<?php 
   if(isset($_POST['delete'])){
    $id = $_POST['id'];
   
    $update = $conn->prepare("DELETE FROM cart WHERE id='$id'");
    
    $update->execute();
   }

?>


<?php require "includes/footer.php"; ?>