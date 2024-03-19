<?php

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

include("connection.php");

if($_POST){
    $result= $database->query("select * from webuser");

    $name=$_POST['name'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    $nic=$_POST['nic'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    $city=$_POST['city'];

    if ($newpassword == $cpassword) {
      $result = $database->query("SELECT * FROM webuser WHERE name='$name'");
      if ($result->num_rows == 1) {
          $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this User Name.</label>';
      } 
      else {
          $patient_insert_query = "INSERT INTO patient (pname, pnumber, pemail, ppassword, city, pnic) 
                                  VALUES ('$name', '$number', '$email', '$newpassword', '$city', '$nic')";
          if ($database->query($patient_insert_query) === TRUE) 
          {
              $webuser_insert_query = "INSERT INTO webuser (name, usertype) VALUES ('$name', 'p')";
              if ($database->query($webuser_insert_query) === TRUE) {
                  
                  $_SESSION["user"] = $name;
                  $_SESSION["usertype"] = "p";
                  $_SESSION["useremail"] = $email;
                  
                  header('Location: Patient/index.php');
                  exit;
              } else {
                  $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Error inserting data into webuser table: ' . $database->error . '</label>';
              }
          } 
          else {
              $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Error inserting data into patient table: ' . $database->error . '</label>';
          }
      }
    } 
    else {
      $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconfirm Password</label>';
    }
}
else{
    $error='<label for="promter" class="form-label"></label>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health</title>

  <link rel="stylesheet" href="assets/css/maicons.css">

  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="assets/css/theme.css">
</head>
<body>

  <div class="back-to-top"></div>

  <header>
    

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="index.php"><span class="text-primary">One</span>-Health</a>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="index.php">Login</a>
            </li>
          </ul>
        </div>
      </div> 
    </nav>
  </header>
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp text-primary">Register</h1>
      <p class="text-center">Add Your Personal Details to Continue</p>
      <form action="" method="POST"  class="contact-form mt-5">
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="name">User Name</label>
            <input type="text" name="name" id="Name" class="form-control" placeholder="Enter User Name..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="number">Phone Number</label>
            <input type="text" name="number" id="number" class="form-control" placeholder="Phone Number..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="nic">NIC</label>
            <input type="text" name="nic" id="nic" class="form-control" placeholder="NIC Number..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="newpassword">Password</label>
            <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Password..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="cpassword">Conform Password</label>
            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Conform Password..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="city">City</label>
            <select name="city" id="city" class="form-control">
            <?php      
            $list11 = $database->query("select  * from  cities order by city_name asc;");
            for ($y=0;$y<$list11->num_rows;$y++){
                $row00=$list11->fetch_assoc();
                $sn=$row00["city_name"];
                // $id00=$row00["city_id"];
                echo "<option value=".$sn.">$sn</option><br/>";
            };                
              ?>   </select>
          </div>
          <?php echo $error ?>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary wow zoomIn">Register</button>
        </div>
        <p class="text-primary">Already have an account? <b>Login</b></p>
      </form>
    </div>
  </div>
  

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/google-maps.js"></script>

<script src="../assets/js/theme.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
  
</body>
</html>