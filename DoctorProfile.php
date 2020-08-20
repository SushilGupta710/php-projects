<?php
include 'DBcon.php';
session_start();
$username_sess=$_SESSION['username'];
// if($_SESSION['is_Login']){
//   // $username_sess=$_SESSION['username'];
//   $username_data=$_SESSION['username'];
// }else{
    // echo "<script> location.href='PatientLog.php'</script>";
// }
$sqlquery="select * from dregistration where usname ='$username_sess'";
$showdata=mysqli_query($con,$sqlquery);
if($showdata->num_rows == 1){
    $row=$showdata->fetch_assoc();
    $r_uname=$row['usname'];
    $r_name=$row['fname'];
    $r_email=$row['email'];
    $r_contact=$row['mobile'];
    $r_gender=$row['gender'];
    $r_addr=$row['address'];
    $r_special=$row['speciality'];
    $r_pass=$row['password'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <!-- Bootstrap CDN Link,Navbar css link,fontawsome link,google font link -->
    <?php include 'AllLinks.php'?>
    <!-- Stylesheet file link -->
    <link rel="stylesheet" href="UserProfile.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="./Icons/hospital.png" class="img-fluid" alt="">
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Index.php#service-section">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Index.php#about-section">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Index.php#contact-section">Contact</a>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My DashBoard</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="DoctorProfile.php">Hello Dr. <?php echo $_SESSION['doctname'];?></a>
              <a class="dropdown-item" href="#">My Appointments</a>
              <a class="dropdown-item" href="#">Future set</a>
              <!-- <a class="dropdown-item" href="#">unknown</a> -->
            </div>
          </li>   
          <li><a class="nav-link btn btn-outline-light" href="Logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row mb-3 bg-warning">
                <div class="col ">
                    <center><h2>My Profile</h2></center>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <h5 class="text-info"><label for="fname">Full name:</label></h5>
                </div>
                <div class="col-md-8">
                  <h5><?php echo $r_name?></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <h5 class="text-info"><label for="email">Email:</label></h5>
                </div>
                <div class="col-md-8">
                  <h5><?php echo $r_email ?></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <h5 class="text-info"><label for="contact">Mobile:</label></h5>
                </div>
                <div class="col-md-8">
                  <h5><?php echo $r_contact ?></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <h5 class="text-info"><label for="contact">Gender:</label></h5>
                </div>
                <div class="col-md-8">
                  <h5><?php echo $r_gender ?></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <h5 class="text-info"><label for="contact">Speciality:</label></h5>
                </div>
                <div class="col-md-8">
                  <h5><?php echo $r_special ?></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <h5 class="text-info"><label for="contact">Address:</label></h5>
                </div>
                <div class="col-md-8">
                  <h5><?php echo $r_addr ?></h5>
                </div>
              </div>
              <div class="row mt-2 justify-content-center">
                <div class="col-md-4">
                  <a href="DoctEditProfile.php" class="btn fas fa-edit btn-dark btn-block"> Edit</a> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>