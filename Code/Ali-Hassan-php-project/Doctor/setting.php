<?php

session_start();

if(isset($_SESSION["user"])){
  if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
      header("location: ../index.php");
  }else{
      $username=$_SESSION["user"];
  }

}else{
  header("location: ../index.php");
}

include("../connection.php");

$userrow = $database->query("select * from doctor where dname='$username'");
$userfetch=$userrow->fetch_assoc();
$did= $userfetch["doid"];
$named= $userfetch["dname"];
$numd= $userfetch["dnumber"];
$emaild= $userfetch["demail"];
$passd= $userfetch["dpassword"];
$nicd= $userfetch["NIC"];
$cityd= $userfetch["city"];
$specd= $userfetch["specialties"];
$availability= $userfetch["availability"];


if($_POST){
  $did=$_POST['did'];
  $name=$_POST['name'];
  $number=$_POST['number'];
  $email=$_POST['email'];
  $nic=$_POST['nic'];
  $newpassword=$_POST['newpassword'];
  $cpassword=$_POST['cpassword'];
  $city=$_POST['city'];
  $specialtie=$_POST['specialties'];
  $Availability=$_POST['Availability'];

  if ($newpassword == $cpassword) {
      $doctor_update_query ="UPDATE `doctor` SET `dname`='$name',`dnumber`='$number',`demail`='$email',`dpassword`='$newpassword',`NIC`='$nic',`city`='$city',`specialties`='$specialtie',`availability`='$Availability' WHERE doid='$did'";
      if ($database->query($doctor_update_query) === TRUE){
          $_SESSION["user"]=$name;
          $_SESSION["usertype"]="d";
          header('Location: setting.php');
          exit;
      } 
      else {
          $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Error update data into Doctor table: ' . $database->error . '</label>';
      }
  } 
  else {
    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconfirm Password</label>';
  }
}
else{
  
  $error='<label for="promter" class="form-label"></label>';
}

// if($_GET){
//   $did=$_GET['did'];
//   $nam=$_GET['named'];
//   $avail=$_GET['availability'];
  
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +92 309 4483014</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> Doctor@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mypatient.php">My Patients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="myappointment.php">My Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mysessions.php">My Sessions</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="setting.php">My Profile</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="../index.php">Log out</a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Profile</h1>
      </div>
    </div> 
  </div> 

  <!-- <div class="page-section">
    <div class="container">
      <form action="" method="get"  class="contact-form mt-5">
            <input type="text" value="<?php echo $did ?>" name="did" style="display:none;">
            <input type="text" value="<?php echo $named ?>" name="name" style="display:none;">
        <div class="row mb-3">
          <div class="col-sm-12 py-2 wow fadeInLeft">
            <label for="name">Availability</label>
            </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <input type="date" name="availability" class="form-control" placeholder="Enter User Name..">
          </div>
          <div class="col-sm-6 py-3 wow fadeInLeft ">
            <button type="submit" class="btn btn-primary wow zoomIn">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div> -->
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp text-primary">My Profile</h1>
      <p class="text-center">Show my persinal detalies </p>
      <form action="" method="POST"  class="contact-form mt-5">
            <input type="text" value="<?php echo $did ?>" name="did" style="display:none;">
            <input type="text" value="<?php echo $named ?>" name="name" style="display:none;">
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="name">User Name</label>
            <input type="text" value="<?php echo $named ?>" disabled class="form-control" placeholder="Enter User Name..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="number">Phone Number</label>
            <input type="text" name="number" id="number" class="form-control" value="<?php echo $numd ?>" placeholder="Phone Number..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo $emaild ?>" placeholder="Email address..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="nic">NIC</label>
            <input type="text" name="nic" id="nic" class="form-control" value="<?php echo $nicd ?>" placeholder="NIC Number..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="newpassword">Password</label>
            <input type="text" name="newpassword" id="newpassword" class="form-control" value="<?php echo $passd ?>" placeholder="Password..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="cpassword">Conform Password</label>
            <input type="text" name="cpassword" id="cpassword" class="form-control" value="<?php echo $passd ?>" placeholder="Conform Password..">
          </div>
          <div class="col-sm-12 py-2 wow fadeInLeft">
            <label for="Availability">Availability</label>
            <input type="date" name="Availability" id="Availability" class="form-control" value="<?php echo $availability ?>" placeholder="Conform Password..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="city">City</label>
            <select name="city" id="city" class="form-control">
            <option value="<?php echo $cityd ?>"><?php echo $cityd ?></option>
            <?php      
            $list11 = $database->query("select  * from  cities order by city_name asc;");
            for ($y=0;$y<$list11->num_rows;$y++){
                $row00=$list11->fetch_assoc();
                $sn=$row00["city_name"];
                echo "<option value=".$sn.">$sn</option><br/>";
            };                
              ?>   </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="specialties">specialties</label>
            <select name="specialties" id="specialties" class="form-control">
            <option value="<?php echo $specd ?>"><?php echo $specd ?></option>
            <?php      
            $list11 = $database->query("select  * from  specialties order by sname asc;");
            for ($y=0;$y<$list11->num_rows;$y++){
                $row00=$list11->fetch_assoc();
                $sn=$row00["sname"];
                echo "<option value=".$sn.">$sn</option><br/>";
            };                
              ?>   </select>
          </div>
          <?php echo $error ?>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary wow zoomIn">Update</button>
        </div>
      </form>
    </div>
  </div>
  

  <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>