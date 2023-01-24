<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>



<?php
if(isset($_POST['submit'])){

     $product_id = $_POST['product_id'];
     $product_name = $_POST['product_name'];
     $product_image = $_POST['product_image'];
     $product_price = $_POST['product_price'];
     $product_amount = $_POST['product_amount'];
     $product_file = $_POST['product_file'];
     $user_id = $_POST['user_id'];

  

     $insert = $conn->prepare("INSERT INTO cart (product_id, product_name, product_image, product_price, product_amount, product_file, user_id)
                             VALUES(:product_id, :product_name, :product_image, :product_price, :product_amount, :product_file, :user_id)");

      $insert->execute([
         ':product_id'=> $product_id,
         ':product_name'=> $product_name,
         ':product_image' => $product_image,
         ':product_price' => $product_price,
         ':product_amount' => $product_amount,
         ':product_file' => $product_file,
         ':user_id' => $user_id,
      ]);                        

}

if(isset($_GET['id'])){
 
       $id = $_GET['id'];

       if(isset($_SESSION['user_id'])){

              //checking for product in cart
          $select = $conn->query("SELECT * FROM cart WHERE product_id = '$id' AND user_id='$_SESSION[user_id]'");
          $select->execute();

       }

  
       //getting data for every product
       $row = $conn->query("SELECT * FROM products WHERE status = 1 AND id='$id'");
       $row->execute();

      $product = $row->fetch(PDO::FETCH_OBJ);
       

   } else {
    echo "404";
   }
   



?>


<div class="container mt-5 mb-5">
  <div class="row d-flex justify-content-center mt-4">
    <div class="col-md-10">
      <div class="card">
        <div class="row">
          <div class="col-md-6">
            <div class="images p-3">
              <div class="text-center p-4"> <img id="main-image" src="../images/<?php echo $product->image; ?>"
                  width="250" /> </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product p-4">
              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center"> <a href="<?php echo APPURL; ?>" class="ml-1 btn btn-primary"><i
                      class="fa fa-long-arrow-left"></i> Back</a> </div> <i class="fa fa-shopping-cart text-muted"></i>
              </div>
              <div class="mt-4 mb-3">
                <h5 class="text-uppercase"><?php echo $product->name; ?></h5>
                <div class="price d-flex flex-row align-items-center"> <span
                    class="act-price"><?php echo $product->price; ?></span>
                </div>
              </div>
              <p class="about"><?php echo $product->description; ?></p>

              <form action="" id="form-data" method="post">
                <div class="">
                  <input type="hidden" name="product_id" class="form-control" id="" value="<?php echo $product->id; ?>">
                </div>
                <div class="">
                  <input type="hidden" name="product_name" class="form-control" id=""
                    value="<?php echo $product->name; ?>">
                </div>
                <div class="">
                  <input type="hidden" name="product_image" class="form-control" id=""
                    value="<?php echo $product->image; ?>">
                </div>
                <div class="">
                  <input type="hidden" name="product_price" class="form-control" id=""
                    value="<?php echo $product->price; ?>">
                </div>
                <div class="">
                  <input type="hidden" name="product_amount" class="form-control" id="" value="1">
                </div>
                <div class="">
                  <input type="hidden" name="product_file" class="form-control" id=""
                    value="<?php echo $product->file; ?>">
                </div>

                <?php  if(isset($_SESSION['user_id'])) :?>
                <div class="">
                  <input type="hidden" name="user_id" class="form-control" id=""
                    value="<?php echo $_SESSION['user_id']; ?>">
                </div>
                <?php endif; ?>


                <div class="cart mt-4 align-items-center">
                  <?php  if(isset($_SESSION['user_id'])) :?>

                  <?php if($select->rowCount() > 0)   :?>
                  <!-- I means that we have item in cart -->
                  <button name="submit" id="submit" disabled class="btn btn-primary text-uppercase mr-2 px-4"
                    type="submit"><i class="fas fa-shopping-cart"></i> Added to cart</button>
                  <?php else: ?>

                  <button name="submit" id="submit" class="btn btn-primary text-uppercase mr-2 px-4" type="submit"><i
                      class="fas fa-shopping-cart"></i> Add to cart</button>

                  <?php endif;  ?>
                  <?php endif;  ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require "../includes/footer.php"; ?>

<script>
$(document).ready(function() {

  $(document).on("submit", function(e) {

    e.preventDefault();
    var formdata = $("#form-data").serialize() + '&submit=submit';

    $.ajax({
      type: "post",
      url: "single.php?id=<?php echo $id; ?>",
      data: formdata,

      success: function() {
        alert("added to car successfully");
        $("#submit").html("<i class='fas fa-shopping-cart'></i> Added to a cart").prop(
          "disabled", true);
      }
    })
  })
});
</script>