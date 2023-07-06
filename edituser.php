<?php

session_start();
require 'includes/config.php';
require 'includes/function.inc.php';

if(!isset($_SESSION["email"]) & empty($_SESSION["email"])){
    header("Location: login.php?error=mustlogin");
}
$UserID = $_SESSION["uid"];
$fname = $_SESSION["fname"];

    if (isset($_POST["submit"])) {
        $finame = $_POST["finame"];
        $laname = $_POST["laname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $postalcode = $_POST["postalcode"];


        $updateusersql = "UPDATE Users SET FirstName = '$finame', LastName = '$laname', Phone = $phone, Address = '$address', City = '$city', PostalCode = $postalcode WHERE UserID = $UserID;";
        if($conn->query($updateusersql)){
                
                echo "Profile Updated";
                header("Location:./profile.php?message=updateprofile");

 
                }
                else{
                
                header("Location:./profile.php?message=failedtoupdateprofile");

               
        }

        
        
} 