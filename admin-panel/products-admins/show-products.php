<?php require "../layouts/header.php" ; ?>
<?php require "../../config/config.php" ; ?>


<?php 

$select = $conn->query("SELECT * FROM products");
$select->execute();

$products= $select->fetchAll(PDO::FETCH_OBJ);

?>


<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Products</h5>
        <a href="<?php ADMINURL; ?>/admin-panel/products-admins/create-products.php"
          class="btn btn-primary mb-4 text-center float-right">Create
          Products</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">product</th>
              <th scope="col">price in €</th>
              <th scope="col">status</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($products as $product) : ?>
            <tr>
              <th scope="row"><?php echo $product->id ; ?></th>
              <td><?php echo $product->name; ?></td>
              <td>2<?php echo $product->price; ?></td>
              <td><a href="#" class="btn btn-success  text-center ">verfied</a></td>
              <td><a href="#" class="btn btn-danger  text-center ">delete</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



</div>

<?php require "../layouts/footer.php" ; ?>