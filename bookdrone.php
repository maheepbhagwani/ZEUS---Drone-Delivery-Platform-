<?php
session_start();
include ("db.php");
print_r($_SESSION);
$date= date("Y/m/d");
$_SESSION['cdate']=$date;
 $login_id=$_SESSION['login_id'];
 $query3 = "select * from customer where login_id='$login_id'"; 
  $result = $db->query($query3);

  if ($result->num_rows > 0) 
  {
      while($row = $result->fetch_assoc()) {
          $first_name=$row['first_name'];
          $last_name=$row['last_name'];
          $customer_id=$row['customer_id'];
      }
    }
    
    

 //echo "$customer_id"
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book Drone</title>

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
              <a class="nav-link js-scroll-trigger" href=./index.php">Logout</a>
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
            <h2 class="section-heading text-white">Book a drone in a matter of minutes!</h2>
              <h2 class="section-heading text-white" style="font-size:20px">Enter some necessary information and you're good to go!</h2>
            <hr class="light my-4">
            <br>
          <center>
              <div class="jumbotron jumbotron-fluid">
                  <div class="container">

                     
                    <form method="post"  id="book" >
                    <div class="form-group row text">
                      <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Package Weight</label>
                        <div class="col-sm-8">
                          <select name="weight" form="book" class="form-control" id="weight" required="TRUE">
                          <?php
                            include ("db.php");
                            $query3 = "select distinct(payload) from drone_details where type='Free'"; 
                            $result = $db->query($query3);
                            if ($result->num_rows > 0) 
                            while($row = $result->fetch_assoc()) {
                            $weight = $row['payload'];
                            echo "<option value='$weight'> Under $weight Kg</option>";
                            }
                          ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Package Contents</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="contents" required="TRUE">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Sender Address</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="sender_data" required="TRUE">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px">Delivery Address</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="receiver_data" required="TRUE">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label" style="font-size:20px" >Booking Date</label>
                        <div class="col-sm-8">
                          <input type="text" disabled="TRUE" value="<?php echo $date ?>" class="form-control" name="ddate" id="ddate">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-4 col-form-label" style="font-size:20px">Payment Modes</label>
                        <div class="col-sm-8">
                          <label class="radio-inline"><input type="radio" style="padding-left:20px;padding-right:20px"name="optradio" checked>Cash       </label>
                          <label class="radio-inline"><input type="radio" name="optradio">Credit Card</label>
                          <!--<label class="radio-inline"><input type="radio" name="optradio">Option 3</label-->                        
                          </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Book" name="book" id="book">
                  </form>

                  </div>
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

    <!--Google Maps API-->
     <?php

include ("db.php");

if (isset($_POST['book'])) {

    $weight = $_POST['weight'];
    $receiver_data = $_POST['receiver_data'];
    $sender_data = $_POST['sender_data'];
    $contents = $_POST['contents'];
    
    session_unset();


    $_SESSION['customer_id'] = $customer_id;
    $_SESSION['login_id']=$login_id;
    $_SESSION['cdate']=$date;
    $_SESSION['weight'] = $weight;

$query2 = "select * from drone_details where payload=$weight and type='free'"; 
$result = $db->query($query2);

if ($result->num_rows > 0) 
    while($row = $result->fetch_assoc()) {
        $drone_id=$row['drone_id'];
    }
    $_SESSION['drone_id']=$drone_id;
    $_SESSION['weight']=$weight;
      $query = "INSERT INTO delivery (weight,drone_id, receiver_data, sender_data, contents) 
            VALUES('$weight', '$drone_id','$receiver_data', '$sender_data', '$contents')";
  
      if ($db->query($query) === TRUE) {
       echo "Zeus Drone Booked ";
       $url="http://localhost:8080/zeus/bookingdetailspage.php";
            header('Location: http://localhost:82/athithi/displaypronew.php');
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>'; exit;

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

  </body>

</html>
