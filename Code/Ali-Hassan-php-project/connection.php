<?php
    $database= new mysqli("localhost","root","","health");
    if ($database->connect_error){
        die("failed Connection:  ".$database->connect_error);
    }
?>