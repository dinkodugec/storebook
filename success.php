<?php require "includes/header.php"; ?>

<?php 

  if(isset($_SERVER['HTTP_REFERER'])){
  //redirect them to your desired location
  header('Location: http://store.hr:8080/');
  exit;
} 

?>

<?php header("refresh:5; http://store.hr:8080/") ;   ?>
<!-- refresh a page after 5 sec and redirect -->
<div class="d-flex align-items-center justify-content-center vh-100">
  <div class="text-center">
    <h1 class="display-1 fw-bold">Success Payment</h1>

    <p class="lead">
      Your payment were success. Check your gmail account for books. You were redirected to home page.
    </p>
    <a href="index.php" class="btn btn-primary">Go Home</a>
  </div>
</div>
<?php require "includes/footer.php"; ?>