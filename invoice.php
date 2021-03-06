
<?php
session_start();
print_r($_SESSION);
  $drone_id=$_SESSION['drone_id'];
  $customer_id=$_SESSION['customer_id'];
$bill_amount=0;
include ("db.php");
$query3 = "select * from billing_and_invoice"; 
$result = $db->query($query3);

if ($result->num_rows > 0) 
    while($row = $result->fetch_assoc()) {
        $invoice_id=$row['invoice_id'];
    }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Invoice Details</title>

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
              <a class="nav-link js-scroll-trigger" href="./index.php">Log out</a>
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
            <h2 class="section-heading text-white">Invoice</h2>
            <hr class="light my-4">
            <h5></h5>
            <br>
            <?php
$drone_cost=0;

include ("db.php");
$query3 = "select * from drone_details where drone_id=$drone_id"; 
$result = $db->query($query3);

if ($result->num_rows > 0) 
    while($row = $result->fetch_assoc()) {
        $drone_cost=$row['cost'];
    }
$bill_amount=$drone_cost*2;
?>
          <center>
              <div class="jumbotron container-fluid " >
                <center>
                    <table class="table table-borderless">
                      <thead>
                        
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Invoice ID</th>
                          <td><?php echo $invoice_id ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Customer ID</th>
                          <td><?php echo $customer_id ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Drone ID</th>
                          <td><?php echo $drone_id ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Date</th>
                          <td><p>
<script> document.write(new Date().toLocaleDateString()); </script>
</p></td>
                        </tr>
                        <tr>
                          <th scope="row">Duration</th>
                          <td>3 Days</td>
                        </tr>
                        <tr>
                          <th scope="row">Billable Amount</th>
                          <td><?php echo $bill_amount?></td>
                        </tr>
                      </tbody>
                    </table>
                  </center>
                  
                  <br>

                  <a href="confirm.php" class="btn btn-primary">Proceed to Pay</a>
              </div> 
          </center>
         
          </div>
        </div>
      </div>
      <br>
    <br>
    <br>
    <br>
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
