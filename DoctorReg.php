<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Register</title>
    <!-- Bootstrap CDN Link,Navbar css link,fontawsome link,google font link -->
    <?php include 'AllLinks.php'?>
    <!-- Stylesheet file link -->
    <link rel="stylesheet" href="DoctorReg.css">
    <script src="FormValidation.js"></script>
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
                        <center> <img width="80px" src="./Icons/Capture.png" alt=""></center>
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
                            $gender=mysqli_real_escape_string($con, $_POST['Gender']);
                            $address=mysqli_real_escape_string($con,$_POST['addr']);
                            $special=mysqli_real_escape_string($con,$_POST['Speciality']);
                            $pass=mysqli_real_escape_string($con, $_POST['pass']);
                            $cpass=mysqli_real_escape_string($con, $_POST['cpass']);
                            
                             //for password
                            $passwrd=password_hash($pass,PASSWORD_BCRYPT);
                            $cpasswrd=password_hash($cpass,PASSWORD_BCRYPT);
                            
                            // Validations
                            if($fname==""){
                                $efname='<b>fullname is required</b>';
                            }else if(strlen($fname) <=8 ){
                                $efname='<b>Please enter more then 8 character</b>';
                            }else if($uname == ""){
                                $euname='<b>username is required</b>';
                            }elseif(strlen($uname) <=5){
                                $euname='<b>Please enter more then 5 character</b>';
                            }elseif($email == ""){
                                $eemail='<b>email is required</b>';
                            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                $eemail='<b>Please enter valid email</b>';
                            }elseif($mob == ""){
                                $emob='<b>mobile no. is required</b>';
                            }elseif(strlen($mob) < 10){
                                $euname='<b>Please enter valid mobile no.</b>';
                            }elseif($gender=""){
                                $egender='<b>Please select the gender</b>';
                            }elseif($address=""){
                                $eaddr='<b>Address is required</b>';
                            }elseif($special==""){
                                $especiality='<b>speciality is required </b>';
                            }elseif($pass == ""){
                                $epass='<b>password is required</b>';
                            }elseif(strlen($pass) <= 5){
                                $epass='<b>Please enter more then 5 character.</b>';
                            }else{
                                //checking email if exist or not 
                                $emailquery ="select * from dregistration where email='$email'";
                                $query=mysqli_query($con,$emailquery);
                                $emailcount = mysqli_num_rows($query);

                                //checking username if exist or not 
                                $unquery ="select * from dregistration where usname='$uname'";
                                $query=mysqli_query($con,$unquery);
                                $usercount = mysqli_num_rows($query);
                                
                                //applying condition
                                if($emailcount > 0){
                                    $passmsg='<div class="alert alert-danger col-md-12 text-center" role="alert">Email Already exist !</div>';
                                    // echo"<p><font color=red>Email Already exist</font></p>";
                                }elseif($usercount > 0){
                                    $passmsg='<div class="alert alert-danger col-md-12 text-center" role="alert">Username Already exist !</div>';
                                    // echo"<p><font color=red>Username Already exist !</font></p>";
                                }
                                else{
                                    if($pass === $cpass){
                                        $insertquery="insert into dregistration(fname, usname, email, mobile, gender, address, speciality, password, cpassword) values('$fname','$uname','$email','$mob', '$gender','$address','$special','$passwrd','$cpasswrd')";
                                        $iquery=mysqli_query($con,$insertquery);
                                        if($iquery){
                                            ?>
                                            <script>
                                            swal("Sucessfull!", "You have Registed sucessfully!", "success");
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
                    <form action="#" onsubmit="return validation()" method="POST">
                    <div class="row mt-2">
                        <?php if(isset ($passmsg)) {echo $passmsg;} ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="fname">Full Name*:</label>
                            <div class="form-group ">
                                <input class="form-control" type="text" id="idfname" name="fname"  autocomplete="off">
                                <small class="text-danger"><?php if(isset ($efname)) {echo $efname;} ?> </small>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <label for="uname">Username*:</label>
                            <div class="form-group ">
                                <input class="form-control" type="text" id="uname" name="uname" >
                                <small class="text-danger"><?php if(isset ($euname)) {echo $euname;} ?> </small>                          
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email*:</label>
                            <div class="form-group">
                                <input class="form-control" type="email" id="email" name="email" >
                                <small class="text-danger"><?php if(isset ($eemail)) {echo $eemail;} ?> </small>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <label for="mob">Mobile no.*:</label>
                            <div class="form-group">
                                <input class="form-control" type="text" id="mob" maxlength="10" name="mob" >
                                <small class="text-danger"><?php if(isset ($emob)) {echo $emdob;} ?> </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="addr">Select Gender*:</label>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="Male" name="Gender" value="Male" required>
                                            <label class="custom-control-label" for="Male">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="Female" name="Gender" value="Female">
                                            <label class="custom-control-label" for="Female">Female</label>
                                        </div>
                                        <small class="text-danger"><?php if(isset ($egender)) {echo $egender;} ?> </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="mob">Select Speciality*:</label>
                                    <div class="form-group">
                                        <select class="custom-select" name="Speciality" >
                                            <option value="" disable>Select Speciality</option>
                                            <option value="Gastroenterology">Gastroenterology</option>
                                            <option value="Nephrology">Nephrology</option>
                                            <option value="Gynaecology">Gynaecology</option>
                                            <option value="Cardiology">Cardiology</option>
                                            <option value="Paediatrics">Paediatrics</option>
                                            <option value="Oncology">Oncology</option>
                                            <option value="Neurology">Neurology</option>
                                            <option value="Psyhciatry">Psyhciatry</option>
                                            <option value="ENT">ENT</option>
                                            <option value="Dermatology">Dermatology</option>
                                            <option value="Urology">Urology</option>
                                            <option value="GeneralDoctor">General Doctor</option>
                                        </select>
                                        <small class="text-danger"><?php if(isset ($especiality)) {echo $especiality;} ?> </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="addr">Address*:</label>
                            <div class="form-group">
                            <textarea class="form-control" rows="4" name="addr" autocomplete="off"></textarea>
                            <small class="text-danger"><?php if(isset ($eaddr)) {echo $eaddr;} ?> </small>
                            </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="pass">Password*:</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="pass" id="pass">
                                <small class="text-danger"><?php if(isset ($epass)) {echo $epass;} ?> </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cpass">Conform Password:</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="cpass">
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
                                <button type="reset" class="btn btn-danger btn-block" >Reset</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <center><p>Already have an account ? <a href="DoctorLog.php">Sign in Here</a></p></center>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Footer Section-->
<section id="footer-section" class="pt-2 pb-2 bg-dark">
      <div class="container">
            <p class="text-center pt-3 text-white">Copyright ©- 2020. Etc Hospitals Group. All Rights Reserved.</p>
      </div>
</section>

</body>
</html>