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
        $result001= $database->query("select * from doctor where doid=$id;");
        $name=($result001->fetch_assoc())["dname"];
        $sql= $database->query("delete from webuser where name='$name';");
        $sql1= $database->query("delete from doctor where dname='$name';");
        $sql2= $database->query("delete from booking where doctorname='$name';");
        $sql3= $database->query("delete from schedule where docid='$name';");
        header("location: doctors.php");
    }
    elseif($_POST){
        $sid=$_POST["id"];
        $result001= $database->query("select * from schedule where scheduleid=$sid;");
        $name=($result001->fetch_assoc())["scheduleid"];
        $sq4= $database->query("delete from schedule where scheduleid='$name';");
        $sq5= $database->query("delete from booking where schedule_id='$sid';");
        header("location: schedule.php");
    }
    


?>