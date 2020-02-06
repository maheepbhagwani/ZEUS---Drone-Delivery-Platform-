<!DOCTYPE html>
<html lang="en">

<?php
session_start();
  $drone_id=$_SESSION['drone_id'];
  $customer_id=$_SESSION['customer_id'];
  ?>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Check Booking</title>

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
              <a class="nav-link js-scroll-trigger" href="./index.php">Logout</a>
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
            <h2 class="section-heading text-white">All Your Bookings At One Place<br><br></h2>
            <hr class="light my-4">
            <br>
          <center>
                    <h4 class="section-heading text-blue>
                        <div class="card">                          
                            <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";

                                // Create connection
                                $conn = new mysqli($servername, $username, $password,"zeus");

                                // Check cxonnection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                } 
                                  
                                $sql="select * from billing_and_invoice a,booking_details b where customer_id=$customer_id and a.booking_id=b.booking_id"
                                  
                          ?>
                          <table class="striped" border="2px" align="center">
                            <tr class="section-heading text-white">
                              <td>Invoice Id</td>
                              <td>Booking Id</td>
                              <td>Date</td>
                              <td>Drone Id</td>
                              <td>Duration</td>
                              <td>Amount</td>
                            </tr>
                            <h5>
                            <?php
                            $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                echo "<tr class='section-heading text-white'>";
                                echo "<td>".$row['invoice_id']."</td>";
                                echo "<td>".$row['booking_id']."</td>";
                                echo "<td>".date("Y/m/d")."</td>";
                                echo "<td>".$row['drone_id']."</td>";
                                echo "<td>".$row['duration']."</td>";
                                echo "<td>".$row['amount']."</td>";
                                echo "</tr>";
                           }
                            ?>
                          </h4>
                          </h5>
                          </table>
                         

                      </div>
                      <br>
                      <br>
                        
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
