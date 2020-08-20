<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CDN Link,Navbar css link,fontawsome link,google font link -->
    <?php include 'AllLinks.php'?>
    <!-- Stylesheet file link -->
    <link rel="stylesheet" href="PatientR.css">
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
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sign in
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="Index.php">User Login </a>
              <a class="dropdown-item" href="DoctorLog.php">Doctor Login</a>
              <a class="dropdown-item" href="HospitalLog.php">Hospital Login</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="PatientReg.php">Patient Register </a>
              <a class="dropdown-item" href="DoctorReg.php">Doctor Register</a>
            </div>
          </li>
        </ul>
      </div>
</nav>
<div class="container-fluid mt-4 mb-3">
    <div class="row mybg">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <center> <img width="80px" src="./Icons/register.png" alt=""></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <center><h3>Create Account</h3></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <hr>
                        </div>
                    </div>
                    <!-- main form is starting from here -->
                    <!-- PHP Script for inserting data into database -->
                    <?php 
                        include 'DBcon.php';
                            if(isset($_POST['submit'])){
                            // to add extra layer of security we use
                            // mysqli_real_escape_string(connection,)
                            $fname=mysqli_real_escape_string($con, $_POST['fname']);
                            $uname=mysqli_real_escape_string($con, $_POST['uname']);
                            $email=mysqli_real_escape_string($con, $_POST['email']);
                            $mob=mysqli_real_escape_string($con, $_POST['mob']);
                            $pass=mysqli_real_escape_string($con, $_POST['pass']);
                            $cpass=mysqli_real_escape_string($con, $_POST['cpass']);
                            
                             //for password
                            $passwrd=password_hash($pass,PASSWORD_BCRYPT);
                            $cpasswrd=password_hash($cpass,PASSWORD_BCRYPT);
                            
                            // Validations
                            if($fname==""){
                                $efname='fullname is required';
                            }else if(strlen($fname) <=8 ){
                                $efname='Please enter more then 8 character';
                            }else if($uname == ""){
                                $euname='username is required';
                            }elseif(strlen($uname) <=5){
                                $euname='Please enter more then 5 character';
                            }elseif($email == ""){
                                $eemail='email is required';
                            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                $eemail='Please enter valid email';
                            }elseif($mob == ""){
                                $emob='mobile no. is required';
                            }elseif(strlen($mob) < 10){
                                $euname='Please enter valid mobile no.';
                            }elseif($pass == ""){
                                $epass='password is required';
                            }elseif(strlen($pass) <= 5){
                                $epass='Please enter more then 5 character.';
                            }else{
                                //doing for email
                                $emailquery ="select * from registration where email='$email'";
                                $query=mysqli_query($con,$emailquery);

                                $emailcount = mysqli_num_rows($query);
                                if($emailcount > 0){
                                    $passmsg='<div class="alert alert-danger col-md-12 text-center" role="alert">Email Already exist !</div>';
                                    // echo"<p><font color=red>Email Already exist</font></p>";
                                }else{
                                    if($pass === $cpass){
                                        $insertquery="insert into registration(fname, usname, email, mob, passwd,cpasswd) values('$fname','$uname','$email','$mob','$passwrd','$cpasswrd')";
                                        $iquery=mysqli_query($con,$insertquery);
                                        if($iquery){
                                            ?>
                                            <script>
                                            //in these i have use call back function for popup alert and pasing and argument
                                            function sweetalert(callback){
                                                        //it will execute first 
                                                        swal("Sucessfull!", "You have Registerd Sucessfully!", "success");
                                                        setTimeout(() => {
                                                        //we are calling loc function after 2 sec     
                                                            callback();
                                                        }, 2000);
                                                    }
                                                    //it will redirect to home page if it will sucessfully login
                                                    function loc(){
                                                        location.replace("Index.php");
                                                    }
                                                    //calling an alert function with parameter of location
                                                    sweetalert(loc);
                                            </script>
                                            <?php
                                        }else{
                                            ?>
                                            <script>
                                            swal("Error!", "Please Check your input", "error");
                                            </script>
                                            <?php
                                        }
                                    }else{
                                        $passmsg='<div class="alert alert-danger col-md-12 text-center" role="alert">Password does not match !</div>';
                                        // echo"<p><font color=red>Password does not match</font></p>";
                                    }
                                }
                            }
                        }   
                    ?>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="row mt-2">
                        <?php if(isset ($passmsg)) {echo $passmsg;} ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="fname">FullName:</label>
                            <div class="form-group ">
                                <input class="form-control" type="text" id="fname" name="fname" placeholder="Enter FullName*" autocomplete="off">
                                <small class="text-danger"><?php if(isset ($efname)) {echo $efname;} ?> </small>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <label for="uname">Username:</label>
                            <div class="form-group ">
                                <input class="form-control" type="text" id="uname" name="uname" placeholder="Enter Username*">
                                <small class="text-danger"><?php if(isset ($euname)) {echo $euname;} ?> </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <div class="form-group">
                                <input class="form-control" type="email" id="email" name="email" placeholder="Enter Email id*" >
                                <small class="text-danger"><?php if(isset ($eemail)) {echo $eemail;} ?></small>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <label for="mob">Mobile no.:</label>
                            <div class="form-group">
                                <input class="form-control" type="text" id="mob" name="mob" maxlength="10" placeholder="Enter Mobile no.*">
                                <small class="text-danger"><?php if(isset ($emob)) {echo $emob;} ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="pass">Password:</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="pass" id="pass" placeholder="Enter password*">
                                <small class="text-danger"><?php if(isset ($epass)) {echo $epass;} ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cpass">Conform Password:</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="cpass" id="cpass" placeholder="Conform password*">
                               <small class="text-danger"><?php if(isset ($ecpass)) {echo $ecpass;} ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" name="submit" value="submit" class="btn btn-success btn-block">Submit</button>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger btn-block">Reset</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <center><p>Already have an account ? <a href="Index.php">Sign in Here</a></p></center>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Footer Section-->
<section id="footer-section" class="pt-2 pb-2" style="background-color: #EAD5C0;opacity:0.9">
      <div class="container">
            <p class="text-center pt-3 ">Copyright ©- 2020. Etc Hospitals Group. All Rights Reserved.</p>
      </div>
    </section>
</body>
</html>