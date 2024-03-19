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

    if($_POST){
      $id=$_POST['id'];
      $sql= $database->query("delete from cities where city_id='$id';");
      header("location: index.php");
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

  <link rel="stylesheet" href="../assets/css/my.css">

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

</head>
<body>

  <div class="back-to-top"></div>

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
          <li class="nav-item active">
              <a class="nav-link" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.php">Doctors</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="appointment.php">Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="patient.php">Patient</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="schedule.php">Schedule</a>
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

  <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let's make your life happier</span>
        <h1 class="display-4">Healthy Living</h1>
        <a href="#" class="btn btn-primary">Let's Consult</a>
      </div>
    </div>
  </div>
<?php
  $patientrow = $database->query("select  * from  patient;");
  $doctorrow = $database->query("select  * from  doctor;");
  $appointmentrow = $database->query("select  * from  booking;");
  $schedulerow = $database->query("select  * from  schedule;");
  $cityrow = $database->query("select * from cities;");
?>
<table class="filter-container" style="border: none;" border="0">
     <tr>
         <td style="width: 25%;">
             <div  class="dashboard-items" >
                 <div>
                         <div class="h1-dashboard">
                             <?php    echo $doctorrow->num_rows  ?>
                         </div><br>
                         <div class="h3-dashboard">
                             Doctors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </div>
                 </div>
                         <div class="btn-icon-back dashboard-icons" style="background-image: url('../assets/img/icons/doctors-hover.svg');"></div>
             </div>
         </td>
         <td style="width: 25%;">
             <div  class="dashboard-items">
                 <div>
                         <div class="h1-dashboard">
                             <?php    echo $patientrow->num_rows  ?>
                         </div><br>
                         <div class="h3-dashboard">
                             Patients &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </div>
                 </div>
                         <div class="btn-icon-back dashboard-icons" style="background-image: url('../assets/img/icons/patients-hover.svg');"></div>
             </div>
         </td>
         <td style="width: 25%;">
             <div  class="dashboard-items" >
                 <div>
                         <div class="h1-dashboard" >
                             <?php    echo $appointmentrow ->num_rows  ?>
                         </div><br>
                         <div class="h3-dashboard" >
                             NewBooking &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </div>
                 </div>
                         <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../assets/img/icons/book-hover.svg');"></div>
             </div>
         </td>
         <td style="width: 25%;">
             <div  class="dashboard-items">
                 <div>
                         <div class="h1-dashboard">
                             <?php    echo $schedulerow ->num_rows  ?>
                         </div><br>
                         <div class="h3-dashboard">
                              Sessions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         </div>
                 </div>
                         <div class="btn-icon-back dashboard-icons " style="background-image: url('../assets/img/icons/session-iceblue.svg');"></div>
             </div>
         </td>
                                
    </tr>
  </table>
<div class="text-center mt-5">
  <a href="add_city.php" class="btn btn-primary">Add New City</a>
</div>
  <div class="page-section row text-center justify-content-center">
  <table class="table col-6">
     <thead>
       <tr>
         <th scope="col">id</th>
         <th scope="col">Cities Name</th>
         <th scope="col">Event</th>
       </tr>
     </thead>
     <tbody>
      <?php
          $sqlmain= "select * from cities";
          $result= $database->query($sqlmain);
          for ( $x=0; $x<$result->num_rows;$x++){
             $row=$result->fetch_assoc();
             $cityid=$row["city_id"];
             $cityname=$row["city_name"];
             echo '<tr>
                 <td scope="row"> &nbsp;'.
                 substr($cityid,0,30)
                 .'</td>
                 <td>
                 '.substr($cityname,0,20).'
                 </td>
                 <td>
                 <form action="" method="post">
                 <input type="text" value="'.$cityid.'" name="id" style="display: none;">
                 <button type="submit"  class="btn-primary btn button-icon btn-delete"  ><font class="tn-in-text">Remove</font></button>
               </form>
                 </td>
             </tr>';
                                         
           }
                                 
        ?>
     </tbody>
   </table>
  </div>

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <?php 
            $information=$database->query("select * from information");
            $row2=$information->fetch_assoc();
            $inid=$row2['id'];
            $title=$row2['heading'];
            $description=$row2['description'];
            ?>
            <h1><?php echo $title ?></h1>
            <p class="text-grey mb-4"><?php echo $description ?></p>
            <form action="information.php" method="get">
              <input type="text" value="<?php echo $indi ?>" name="id" style="display: none;">
              <button  class="btn-primary btn button-icon btn-edit"  ><font class="tn-in-text">Edit Data</font></button>
            </form>
            <!-- <a href="" class="btn btn-primary">Edit Data</a> -->
            
          </div>
          
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="../assets/img/bg-doctor.png" alt="">
            </div>
          </div>
        </div>
      </div>
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

<script src="../assets/js/theme.js"></script>
  
</body>
</html>