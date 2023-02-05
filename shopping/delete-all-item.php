<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
if(!isset($_SESSION['username'])){
          header("Location: http://store.hr:8080/");
        }
?>

<?php 
   if(isset($_POST['delete'])){
   
    $update = $conn->prepare("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'");
    
    $update->execute();
   }

?>


<?php require "includes/footer.php"; ?>