<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{


  
    
     
    $query=mysqli_query($con, "DELETE FROM tblvehicle WHERE id='" . $_GET["vid"] . "'");
    if ($query) {
echo "<script>alert('Incoming vehicle has been deleted');</script>";

echo "<script>window.location.href ='manage-incomingvehicle.php'</script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
    }

  
}
  ?>