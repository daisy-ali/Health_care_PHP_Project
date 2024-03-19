<?php
    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    include("connection.php");

    if($_POST){

        $name=$_POST['Username'];
        $password=$_POST['userpassword'];
        
        $error='<label for="promter" class="form-label"></label>';

        $result= $database->query("select * from webuser  where name='$name'");
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                $checker = $database->query("select * from patient where pname='$name' and ppassword='$password'");
                if ($checker->num_rows==1){

                    $_SESSION['user']=$name;
                    $_SESSION['usertype']='p';
                    
                    header('location: Patient/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }elseif($utype=='a'){
                $checker = $database->query("select * from admin where aname='$name' and apassword='$password'");
                if ($checker->num_rows==1){

                    $_SESSION['user']=$name;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }
            }elseif($utype=='m'){
                $checker = $database->query("select * from manager where mname='$name' and mpassword='$password'");
                if ($checker->num_rows==1){

                    $_SESSION['user']=$name;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }elseif($utype=='d'){
                $checker = $database->query("select * from doctor where dname='$name' and dpassword='$password'");
                if ($checker->num_rows==1){

                    $_SESSION['user']=$name;
                    $_SESSION['usertype']='d';
                    header('location: Doctor/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
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
              <a class="btn btn-primary ml-lg-3" href="register.php">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="page-section">
    <div class="container">
      <h1 class="text-center text-primary wow fadeInUp">Login</h1>
      <p class="text-center">Welcome Back!</p>

      <form action="" method="POST"  class="contact-form mt-5 ">
        <div class="row mb-3">
          <div class="col-12 py-2 wow fadeInRight">
            <label for="Username">User</label>
            <input type="text" id="Username" name="Username" class="form-control" placeholder="Enter User Name..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="userpassword">Password</label>
            <input type="password" id="password" name="userpassword" class="form-control" placeholder="Enter Password..">
          </div>
          <div class="col-12 py-2 wow fadeInUp">
              <?php echo $error ?>
            </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary wow zoomIn">Login</button>
        </div>
        <a href="register.php">Don't have an account? <b>Sign Up</b></a>
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