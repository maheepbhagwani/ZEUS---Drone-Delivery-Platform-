<?php
session_start();
print_r($_SESSION);
$customer_id=$_SESSION['customer_id'];
$date=$_SESSION['cdate'];
$weight=$_SESSION['weight'];
$drone_id=$_SESSION['drone_id'];
include ("db.php");
$query3 = "select * from delivery"; 
$result = $db->query($query3);

if ($result->num_rows > 0) 
    while($row = $result->fetch_assoc()) {
        $booking_id=$row['booking_id'];
    }
$query = "select * from drone_details where payload=$weight and type='free'"; 
$result = $db->query($query);

if ($result->num_rows > 0) 
    while($row = $result->fetch_assoc()) {
        $drone_id=$row['drone_id'];
    }
    
    $_SESSION['drone_id']=$drone_id;
    $query = "update drone_details set type='Alloted' where drone_id=$drone_id"; 
    $result = $db->query($query);

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Booking Details</title>

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

    <!-- Google Maps API>-->



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
            <h2 class="section-heading text-white">Booking Details Page</h2>
              <h2 class="section-heading text-white" style="font-size:20px">Your consolidated booking details are below!</h2>
            <hr class="light my-4">
            <br>
          <center>
              <div class="jumbotron jumbotron-fluid">
                  <div class="container">
                   
                    <form method="post"   >
                    <div class="form-group row text">
                      <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Booking ID</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control"  id="booking_id" disabled="true" value="<?php echo $booking_id?>">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Customer ID</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control"  id="customer_id" disabled="true" value="<?php echo $customer_id?>">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Drone ID</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control"  id="drone_id" name="drone_id" disabled="true" value="<?php echo $drone_id?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Date of Booking</label>
                        <div class="col-sm-8">
                          <input type="text" disabled="true" value="<?php echo $_SESSION['cdate'] ?>" class="form-control" required="true" id="date_of_booking" name="date_of_booking">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Booking From Date</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control" required="true" id="booking_from_date" name="booking_from_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Booking To Date</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control"  required="true" id="booking_to_date" name="booking_to_date" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">GeoTag</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" required="true" id="geo_tag" name="geo_tag">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="login">Next</button>
                  </form>
                  
                  </div>
                </div>
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
            <?php
include ("db.php");

if (isset($_POST['login'])) {
  // variable declaration
 

  // connect to database

  // REGISTER USER
  
    // receive all input values from the form
    $date_of_booking = $_SESSION['cdate']; 
    $booking_from_date = $_POST['booking_from_date'];
    $booking_to_date = $_POST['booking_to_date'];
    $geo_tag = $_POST['geo_tag'];
   
      $query = "INSERT INTO booking_details (customer_id,drone_id,date_of_booking,booking_from_date,booking_to_date,geo_tag) 
            VALUES('$customer_id', '$drone_id', '$date_of_booking','$booking_from_date', '$booking_to_date', $geo_tag)";
      $_SESSION['drone_id']=$drone_id;
      
      if ($db->query($query) === TRUE) {
       echo "Zeus Drone Booked ";
    } else {
    echo "Error: " . $query . "<br>" . $db->error;
}

$query = "INSERT INTO order_status (booking_id,customer_id,drone_id,current_stat) 
            VALUES($booking_id,'$customer_id', '$drone_id','ONGOING')";
      $_SESSION['drone_id']=$drone_id;
      
      if ($db->query($query) === TRUE) {
       echo "Zeus Drone Booked ";
    } else {
    echo "Error: " . $query . "<br>" . $db->error;
}

$query = "INSERT INTO billing_and_invoice (booking_id,bdate,drone_id,duration,amount) 
            VALUES($booking_id,'$date','$drone_id','3',$bill_amount)";
      
echo $query;
      if ($db->query($query) === TRUE) {
       echo "Zeus Drone Booked ";
       $url="http://localhost:8080/zeus/invoice.php";
            header('Location: http://localhost:82/athithi/displaypronew.php');
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>'; exit;
    } else {
    echo "Error: " . $query . "<br>" . $db->error;
     // header('location: login.php');
    //}
}
}
else
  echo "";

  
  ?>
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

    <!--Google Maps API-->
     

  </body>

</html>
