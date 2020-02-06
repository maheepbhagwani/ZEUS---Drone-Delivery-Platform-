<?php
include("db.php");
session_start();
if(!$_SESSION['login_id'])
{
  header("Location:logindashboard.php");
}
    //echo $_SESSION['login_id'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Information</title>

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
              <a class="nav-link js-scroll-trigger" href="./logindashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="./index.php">Log Out</a>
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
            <h2 class="section-heading text-white">Update Information</h2>
            <hr class="light my-4">
            <h5>Make the necessary changes to your details in the form below</h1>
            <br>
          <center>
              <div class="jumbotron container-fluid " >
               <?php $login_id= $_SESSION['login_id'];
                ?>
                  <form method="post" action="updateinfo.php">
                    <div class="form-group row text">
                      <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">First Name</label>
                        <div class="col-sm-8">
                           <?php
                        include ("db.php");
                        $query3 = "select * from customer where login_id='$login_id'"; 
                        $result = $db->query($query3);

                        if ($result->num_rows > 0) 
                            while($row = $result->fetch_assoc()) {
                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];
                            $age = $row['age'];
                            $aadhaar_number = $row['aadhaar_number'];
                            $password = $row['password'];
                            $contact_no = $row['contact_no'];
                            }
                    ?>
                          <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name?>">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="last_name" name="last_name1" value="<?php echo $last_name?>">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Age</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" id="age" name="age1" value="<?php echo $age?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Aadhaar No.</label>
                        <div class="col-sm-8">
                          <input type="number" readonly="TRUE" class="form-control" id="aadhaar_number" name="aadhaar_number1" value="<?php echo $aadhaar_number?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Contact No:</label>
                        <div class="col-sm-8">
                          <input type="phone" class="form-control" id="phone_number" name="contact_no1" value="<?php echo $contact_no?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label" style="font-size:20px">Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="password" name="password1" value="<?php echo $password?>">
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Update" name="update">
                  </form>
                  <?php
include ("db.php");

  if (isset($_POST['update'])) {

    $first_name = $_POST['first_name'];
    $last_name1 = $_POST['last_name1'];
    $age1 = $_POST['age1'];
    $aadhaar_number1 = $_POST['aadhaar_number1'];
    $password1 = $_POST['password1'];
    $contact_no1 = $_POST['contact_no1'];

          $query = "UPDATE customer SET first_name='$first_name',last_name='$last_name1',age='$age1',aadhaar_number='$aadhaar_number1',password='$password1',contact_no='$contact_no1' WHERE login_id='$login_id'";


      if ($db->query($query) === TRUE) {
      echo "Update successfully";
    } else {
    echo "Error: " . $query . "<br>" . $db->error;
}
     // header('location: login.php');
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
