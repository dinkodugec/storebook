<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>


<!-- Heading -->

<?php echo $_SESSION['user_id']  ; ?>
<h2 class="my-5 h2 text-center">Checkout</h2>


<div class="row d-flex justify-content-center align-items-center h-100 mt-5 mt-5">
  <div class="col-md-12 mb-4">
    <div class="card">
      <form class="card-body" method="POST" action="charge.php">

        <div class="row">
          <div class="col-md-6 mb-2">
            <div class="md-form">
              <label for="firstName" class="">First name</label>
              <input type="text" name="fname" id="firstName" class="form-control">
            </div>
          </div>

          <div class="col-md-6 mb-2">
            <div class="md-form">
              <label for="lastName" class="">Last name</label>
              <input type="text" name="lname" id="lastName" class="form-control">
            </div>
          </div>
        </div>

        <div class="md-form mb-5">
          <label for="email" class="">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Username"
            aria-describedby="basic-addon1">
        </div>

        <div class="md-form mb-5">
          <label for="email" class="">Email</label>
          <input type="text" id="email" name="email" class="form-control" placeholder="youremail@example.com">
        </div>


        <hr class="mb-4">
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="pk_test_51MVNDvDTS9oZp98B3P37mzuARW41jU8zxuNspgSpr6ef5rsZjDwxTq5CM6DjiKn4dJXJuSBjtyUxlDmHpKIVpjM000j04DPLYG"
          data-currency="eur" data-label="pay now">
        </script>
        <script src="https://js.stripe.com/v3/"></script>
    </div>

    </form>

  </div>

</div>



<?php require "../includes/footer.php"; ?>