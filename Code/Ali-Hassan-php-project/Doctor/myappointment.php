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

if($_POST){
  $id=$_POST["id"];
  $database->query("delete from booking where booking_id='$id';");
  $_SESSION["user"]=$username;
  $_SESSION["usertype"]="d";
  header("location: myappointment.php");
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
            <li class="nav-item active">
              <a class="nav-link" href="myappointment.php">My Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mysessions.php">My Sessions</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="setting.php">Profile</a>
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
            <li class="breadcrumb-item active" aria-current="page">myappointment</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">My Appointments(
          <?php 
            $list11 = $database->query("select  booking_id from  booking where doctorname='$username';");
            echo $list11->num_rows; 
          ?>)</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          
            <form action="" method="post" class="header-search">
              <div class="input-group mb-3">
              <input type="search" name="search" class="form-control" placeholder="Search" list="doctors" aria-describedby="button-addon1">&nbsp;&nbsp;
                 
                <?php
                  echo '<datalist id="booking">';
                  $list11 = $database->query("select   patientname,doctorname from  booking;");
                  for ($y=0;$y<$list11->num_rows;$y++){
                      $row00=$list11->fetch_assoc();
                      $d=$row00["patientname"];
                      $c=$row00["doctorname"];
                      echo "<option value='$d'><br/>";
                      echo "<option value='$c'><br/>";
                  };
                  echo ' </datalist>';
               ?>
                              
              <input type="Submit" value="Search" id="button-addon1" class="login-btn btn-outline-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
              </div>
                        
            </form>
               <?php
                    if($_POST){
                      $keyword=$_POST["search"];
                      $sqlmain= "select * from booking where patientname='$keyword' or patientname like '$keyword%' or patientname like '%$keyword' or patientname like '%$keyword%' or doctorname='$keyword' or doctorname like '$keyword%' or doctorname like '%$keyword' or doctorname like '%$keyword%'";
                  }else{
                      $sqlmain= "select * from booking where doctorname='$username'";
                  }
              ?>
                      
                    <div class="abc scroll">
                        <table class="table table-hover text-center" >
                        <thead>
                        <tr>
                            <th  scope="col">
                                Booking Number
                            </th>
                            <th  scope="col">
                            Patient Name
                            </th>
                            <th  scope="col">
                            Doctor Name 

                            </th>
                            <th  scope="col">
                                Date
                            </th>
                            <th  scope="col">
                                Time
                            </th>
                            <th>  
                                Events
                           </th>
                          </tr>
                        </thead>
                        <tbody>
                        
                            <?php                                
                                $result= $database->query($sqlmain);

                                if($result->num_rows==0){
                                  
                                    echo '<tr class="justify-content-center text-center">
                                    <td colspan="12" >
                                    <br><br><br><br>
                                    <center>
                                    <img src="../assets/img/icons/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $bid=$row["booking_id"];
                                    $pname=$row["patientname"];
                                    $dname=$row["doctorname"];
                                    $sid=$row["schedule_id"];
                                    $result2= $database->query("select * from schedule where scheduleid=$sid;");
                                    $row2=$result2->fetch_assoc();
                                    $date=$row2["sdate"];
                                    $time=$row2["stime"];



                                    echo '<tr>
                                        <td scope="row"> &nbsp;'.
                                        substr($bid,0,30)
                                        .'</td>
                                        <td>
                                        '.substr($pname,0,20).'
                                        </td>
                                        <td>
                                        '.substr($dname,0,20).'
                                        </td>
                                        <td>
                                        '.substr($date,0,20).'
                                        </td>
                                        <td>
                                        '.substr($time,0,20).'
                                        </td>
                                        <td>
                                        <form action="" method="post">
                                        <input type="text" value="'.$bid.'" name="id" style="display: none;">
                                        <button type="submit"  class="btn-primary btn button-icon btn-delete"  ><font class="tn-in-text">Cancel Booking</font></button>
                                      </form>
                                        </td>
                                    </tr>';
                                    
                                }
                            }
                                 
                            ?>
 
                            </tbody>

                        </table>
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