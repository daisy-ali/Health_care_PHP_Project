<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../index.php");
        }

    }else{
        header("location: ../index.php");
    }
    
    include("../connection.php");
    
    if($_GET){
        $id=$_GET["id"];
        $sqlmain= "select * from patient where pid='$id'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();
        $name=$row["pname"];
        $pid=$row["pid"];
        $number=$row["pnumber"];
        $email=$row["pemail"];
        $password=$row["ppassword"];
        $nic=$row["pnic"];
        $city=$row["city"];
    }
    else{
        $error='<label for="promter" class="form-label"></label>';
    }

    if($_POST){
        $docid=$_POST['pid'];
        $name=$_POST['name'];
        $number=$_POST['number'];
        $email=$_POST['email'];
        $nic=$_POST['nic'];
        $newpassword=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $city=$_POST['city'];

        if ($newpassword == $cpassword) {
            $doctor_update_query ="UPDATE `patient` SET `pname`='$name',`pnumber`='$number',`pemail`='$email',`ppassword`='$newpassword',`city`='$city',`pnic`='$nic' WHERE pid='$docid'";
            if ($database->query($doctor_update_query) === TRUE){
                header('Location: patient.php');
                exit;
            } 
            else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Error update data into patient table: ' . $database->error . '</label>';
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

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>


  
<header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +92 309 4483014</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> admin@example.com</a>
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
        </div> 
      </div> 
    </div>

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
              <a class="nav-link" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="doctors.php">Doctors</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="appointment.php">Appointments</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="patient.php">Patient</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="schedule.php">Schedule</a>
            </li>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="User.php">User</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="../logout.php">Log out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
 
  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">edit_patient</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Edit patient Data</h1>
          <a class="btn btn-primary ml-lg-3" href="../admin/patient.php">show all patients</a>
      </div> 
    </div>
  </div>
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp"><span class="text-primary">edit</span> patient</h1>
      <form action="" method="POST" class="contact-form mt-5">
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <input type="text" value="<?php echo $pid ?>" name="pid" style="display:none;">
            <input type="text" value="<?php echo $name ?>" name="name" style="display:none;">
            <label for="name">Can't Chang User Name</label>
            <input type="text"  value="<?php echo $name ?>"  class="form-control" disabled placeholder="Full name..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="number">Phone Number</label>
            <input type="text" id="number"value="<?php echo $number ?>" name="number" class="form-control" placeholder="Phone Number..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="email">Email</label>
            <input type="text" id="email" name="email"value="<?php echo $email ?>" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="nic">NIC</label>
            <input type="text" id="nic" name="nic" value="<?php echo $nic ?>" class="form-control" placeholder="Enter NIC..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="password">Password</label>
            <input type="text" id="password" name="password" value="<?php echo $password ?>" class="form-control" placeholder="Password..">
          </div>
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="cpassword">Conform Password</label>
            <input type="text" id="cpassword" name="cpassword" value="<?php echo $password ?>" class="form-control" placeholder="Conform Password..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="city">City</label>
            <select name="city" id="city" class="form-control">
            <option value="<?php echo $city ?>"><?php echo $city ?></option>
            <?php      
            $list11 = $database->query("select  * from  cities order by city_name asc;");
            for ($y=0;$y<$list11->num_rows;$y++){
                $row00=$list11->fetch_assoc();
                $sn=$row00["city_name"];
                echo "<option value=".$sn.">$sn</option><br/>";
            };                
              ?>   </select>
          </div>
          <?php echo $error ?>
        </div>
        <button type="submit" class="btn btn-primary wow zoomIn">Update</button>
      </form>
    </div>
  </div>
  
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

<script src="../assets/js/google-maps.js"></script>

<script src="../assets/js/theme.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
  
</body>
</html>