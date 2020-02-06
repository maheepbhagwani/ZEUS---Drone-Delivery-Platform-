<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log In to Zeus</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

    <!--Material Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Material design bootstrap>-->
    <script type="text/javascript" src="../js/messi.js"></script>
    <link rel="stylesheet" type="text/css" href="css/messi.css">



  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Zeus</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="./register.php">Register</a>
            </li>
            <!--
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Drones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#hello">Contact</a>
            </li>-->
          </ul>
        </div>
      </div>
    </nav>  
    <section class="bg-primary bg-pattern" id="register">
      <br>  
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Login to your Zeus account
            </h2>
            <hr class="light my-4">
            <br>
          <center>
              <div class="jumbotron container-fluid " >

                  <form  method="POST">
                    
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label" style="font-size:20px">Email</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" name="login_id" id="login_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label" style="font-size:20px">Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control"name="password">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="login">Log in!</button>
<?php
include ("db.php");


  if (isset($_POST['login'])) {
    $login_id = mysqli_real_escape_string($db, $_POST['login_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);




      $query = "SELECT * FROM customer WHERE login_id='$login_id' AND password='$password'";
      $results = mysqli_query($db, $query);
        $_SESSION['login_id'] = $login_id;
      if (mysqli_num_rows($results) == 1) {
        
        header('location: logindashboard.php');
      }else {
  $message = "Email and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }


  
  ?>
                  </form>
              </div>  
          </center>
          </div>
        </div>
      </div>
      <br>
    </section>
    
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

    <!--Material design js-->
    

  </body>

</html>
