<?php

session_start();
require './../includes/config.php';
require 'includes/adminfunction.inc.php';

if(!isset($_SESSION["AdminUN"]) & empty($_SESSION["AdminUN"])){
    header("Location: login.php?error=mustlogin");
}
$AdminUN = $_SESSION["AdminUN"];
$Name = $_SESSION["Name"];

    if (isset($_POST["submit"])) {
        $finame = $_POST["finame"];
        $laname = $_POST["laname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $postalcode = $_POST["postalcode"];
        $uid = $_POST["uid"];


        $updateusersql = "UPDATE Users SET FirstName = '$finame', LastName = '$laname', Phone = $phone, Address = '$address', City = '$city', PostalCode = $postalcode WHERE UserID = $uid;";
        if($conn->query($updateusersql)){
                
                
                header("Location:./edituser.php?userid=$uid");

 
                }
                else{
                
                header("Location:./edituser.php?message=failedtoupdateprofile");

               
        }

        
        
} 