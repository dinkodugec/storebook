<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

        if(isset($_SESSION['username'])){
          header("Location: http://store.hr:8080/");
        }

      if(isset($_POST['submit'])){

           if(empty($_POST['username'] OR $_POST['email'] OR $_POST['password'])){
               echo "<script>alert('One or more inputs are empty')</script>";
           }else{
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];


            $insert = $conn->prepare("INSERT INTO users (username, email, password)
              VALUES (:username, :email, :password)");

              $insert->execute([
                ':username' => $username,
                ':email' => $email,
                'password'=>password_hash($password, PASSWORD_DEFAULT)
              ]);
              header("Location:login.php");
           }

           

     


      }





?>





<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <!-- <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Home</a>
    </li>
    <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li> -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Username
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Register</a>
    </li>
  </ul>

</div>
</div>
</nav>

<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-6">
      <form class="form-control mt-5" method="POST" action="register.php">
        <h4 class="text-center mt-3"> Register </h4>
        <div class="">
          <label for="" class="col-sm-2 col-form-label">Username</label>
          <div class="">
            <input type="text" name="username" class="form-control" id="" value="">
          </div>
        </div>
        <div class="">
          <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
          <div class="">
            <input type="email" name="email" class="form-control" id="" value="">
          </div>
        </div>
        <div class="">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="">
            <input type="password" name="password" class="form-control" id="inputPassword">
          </div>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-4 mb-4" name="submit" type="submit">Register</button>

      </form>
    </div>
  </div>



</div>
<footer class="bg-dark text-white text-center text-lg-start" style="margin-top: 40px">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Footer Content</h5>

        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
          molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
          voluptatem veniam, est atque cumque eum delectus sint!
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-white">Link 1</a>
          </li>
          <li>
            <a href="#!" class="text-white">Link 2</a>
          </li>
          <li>
            <a href="#!" class="text-white">Link 3</a>
          </li>
          <li>
            <a href="#!" class="text-white">Link 4</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!" class="text-white">Link 1</a>
          </li>
          <li>
            <a href="#!" class="text-white">Link 2</a>
          </li>
          <li>
            <a href="#!" class="text-white">Link 3</a>
          </li>
          <li>
            <a href="#!" class="text-white">Link 4</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->

    <?php require "../includes/footer_auth.php"; ?>