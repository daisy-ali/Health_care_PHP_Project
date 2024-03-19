<?php

session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
        header("location: ../index.php");
    }

}else{
    header("location: ../index.php");
}

include("../connection.php");

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
              <a href="#"><span class="mai-mail text-primary"></span> Patient@example.com</a>
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
            <li class="nav-item active">
              <a class="nav-link" href="doctors.php">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="booking.php">Bookings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="scheduled.php">Scheduled Sessions</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="setting.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="../logout.php">Log out</a>
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
            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">All Doctors(
          <?php 
            $list11 = $database->query("select  doid from  doctor;");
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
              <!-- <input type="search" name="search" class="form-control" placeholder="Search Doctor name or City" list="doctors" aria-describedby="button-addon1">&nbsp;&nbsp; -->
              <select name="search" id="search" class="form-control" list="doctors" aria-describedby="button-addon1">&nbsp;&nbsp;
            <option>Seaech with city name</option>

            <?php      
            $list13 = $database->query("select  * from  cities order by city_name asc;");
            for ($y=0;$y<$list13->num_rows;$y++){
                $row0013=$list13->fetch_assoc();
                $sn=$row0013["city_name"];
                echo "<option value=".$sn.">$sn</option><br/>";
            };                
              ?>   </select> 
              <select name="specialties" id="specialties" class="form-control">
            <option>Seaech with specialties name</option>

            <?php      
            $list12 = $database->query("select  * from  specialties order by sname asc;");
            for ($y=0;$y<$list12->num_rows;$y++){
                $row002=$list12->fetch_assoc();
                $sn=$row002["sname"];
                echo "<option value=".$sn.">$sn</option><br/>";
            };                
              ?>   </select>         
                <?php
                   $list11 = $database->query("select  dname,demail from  doctor;");

                  echo '<datalist id="doctors">';
                  $list11 = $database->query("select  city from  doctor;");
                  for ($y=0;$y<$list11->num_rows;$y++){
                      $row00=$list11->fetch_assoc();
                      $c=$row00["city"];
                      $d=$row00["dname"];
                      echo "<option value='$c'><br/>";
                      echo "<option value='$d'><br/>";
                  };

                  echo ' </datalist>';
               ?>
                              
              <input type="Submit" value="Search" id="button-addon1" class="login-btn btn-outline-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
              </div>
                        
            </form>
               <?php
                    if($_POST){
                      $keyword=$_POST["search"];
                      
                      $sqlmain= "select * from doctor where city='$keyword' or city like'$keyword%' or city like'%$keyword' or city like'%$keyword%' or dname='$keyword' or dname like '$keyword%' or dname like '%$keyword' or dname like '%$keyword%'";
                  }else{
                      $sqlmain= "select * from doctor order by doid desc";

                  }

              ?>
                      
                    <div class="abc scroll">
                        <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th  scope="col">
                                id
                            </th>
                            <th  scope="col">
                                Name 
                            </th>
                            <th  scope="col">
                                Number
                            </th>
                            <th  scope="col">
                                Email
                            </th>
                            <th  scope="col">
                                City
                            </th>
                            <th  scope="col">
                                Specialties
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
                                    <a class="non-style-link" href="doctors.php"><button  class="login-btn btn-primary btn" >&nbsp; Show all Doctors &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $docid=$row["doid"];
                                    $name=$row["dname"];
                                    $number=$row["dnumber"];
                                    $email=$row["demail"];
                                    $dpass=$row["dpassword"];
                                    $nic=$row["NIC"];
                                    $city=$row["city"];
                                    $spe=$row["specialties"];
                                    echo '<tr>
                                        <td scope="row"> &nbsp;'.
                                        substr($docid,0,30)
                                        .'</td>
                                        <td>
                                        '.substr($name,0,20).'
                                        </td>
                                        <td>
                                        '.substr($number,0,20).'
                                        </td>
                                        <td>
                                        '.substr($email,0,20).'
                                        </td>
                                        <td>
                                        '.substr($city,0,20).'
                                        </td>
                                        <td>
                                        '.substr($spe,0,20).'
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