<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register-Zeus Drone Delivery</title>

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
              <a class="nav-link js-scroll-trigger" href="./login.php">Login</a>
            </li>
            <!--
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Drones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#hello">Contact</a>
            </li>
          -->
          </ul>
        </div>
      </div>
    </nav>  
    <section class="bg-primary bg-pattern" id="register">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Register in a matter of minutes</h2>
            <hr class="light my-4">
            <h5>Just enter some necessary information to create your account!</h1>
            <br>
          <center>
              <div class="jumbotron container-fluid " >

                
                  <form method="post"  >
                    <div class="form-group row text">
                      <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">First Name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="first_name" name="first_name" required="TRUE">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Age</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" id="age" name="age" min="18">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Aadhaar No.</label>
                        <div class="col-sm-8">
                          <input type="tel" maxlength="16" class="form-control" id="aadhaar_number" name="aadhaar_number" required="TRUE" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Contact No:</label>
                        <div class="col-sm-8">
                          <input type="phone" maxlength="10" class="form-control" id="phone_number" name="contact_no" required="TRUE"x>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label" style="font-size:20px">Email</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="login_id" name="login_id" required="TRUE">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label" style="font-size:20px">Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="password" name="password" required="TRUE">
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Sign Up" name="reg_user" id="reg_user">
                   </form>

<?php
include ("db.php");
if (isset($_POST['reg_user'])) {
  // variable declaration


  // connect to database

  // REGISTER USER
  
    // receive all input values from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $aadhaar_number = $_POST['aadhaar_number'];
    $login_id = $_POST['login_id'];
    $password = $_POST['password'];
    $contact_no = $_POST['contact_no'];




    // register user if there are no errors in the form
    //if (count($errors) == 0) {
      //$password = md5($password);//encrypt the password before saving in the database
      $query = "INSERT INTO customer (first_name, last_name, age, aadhaar_number, login_id, password, contact_no) 
            VALUES('$first_name', '$last_name', '$age', '$aadhaar_number', '$login_id', '$password', '$contact_no')";
      //$query = "INSERT INTO account (customer_id,login_id) SELECT customer_id, login_id FROM customer";
            
      if ($db->query($query) === TRUE) {
          echo "Registered successfully";
         // echo $query;
         $customer_id=0;

$query3 = "select customer_id from customer"; 
$result = $db->query($query3);

if ($result->num_rows > 0) 
    while($row = $result->fetch_assoc()) {
        $customer_id=$row['customer_id'];
    }
$query2 = "INSERT INTO account (customer_id,login_id,type) VALUES('$customer_id', '$login_id', '1')";
if ($db->query($query2) === TRUE) {
          echo "Account Created";
          $url="http://localhost:8080/zeus/login.php";
            header('Location: http://localhost:82/athithi/displaypronew.php');
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>'; exit;
          //echo $query2;
    } 
    } 

    else {
    //echo "Error: " . $query . "<br>" . $db->error;
      //echo "Oops... Looks Line Zeus Servers Are Down Right Now!";
}
      
    //}
}
//}
else
  echo "";


  ?>
                  
              </div>  
          </center>
           
          </div>
        </div>
      </div>
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