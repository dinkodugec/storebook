<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if(isset($_GET['id'])){

  $id = $_GET['id'];
       $rows = $conn->query("SELECT * FROM categories WHERE id = '$id' ");
       $rows->execute();

      $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

}

?>


<div class="row mt-5">
  <?php foreach($allRows as $category) : ?>
  <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
    <div class="card">
      <img height="213px" class="card-img-top"
        src="<?php echo APPURL; ?>/admin-panel/categories-admins/images/<?php echo $category->image; ?>">
      <div class="card-body">
        <h5 class="d-inline"><b><?php echo $category->name; ?></b> </h5>
        <h5 class="d-inline">
          <div class="text-muted d-inline"></div>
        </h5>

      </div>
    </div>
  </div>

  <br>
  <?php endforeach; ?>
</div>

<?php require "../includes/footer.php"; ?>