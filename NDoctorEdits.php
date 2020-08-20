<!-- NDoctorEdits.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoctorEditProfile</title>
    <!-- Bootstrap CDN Link,Navbar css link,fontawsome link,google font link -->
    <?php include 'AllLinks.php'?>
    <!-- Stylesheet file link -->
    <link rel="stylesheet" href="editprofile.css">
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
<div class="container-fluid mt-4 mb-3">
    <div class="row mybg">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <center><h3>Doctor Edit Profile</h3></center>
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
                        $ids=$_GET['id'];
                        // $un=$_GET['username'];
                        $sqlquery="select * from dregistration where id ='$ids'";
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
                        }else{
                            echo 'something is wrong';
                            // $passmsg='<div class="alert alert-warning col-md-12" role="alert">Any field cannot be empty</div>';
                        }
                        if(isset($_POST['update'])){
                            $formupdate=$_SESSION['username'];
                            // $formupdate=$_GET['username'];
                            // to add extra layer of security we use
                            // mysqli_real_escape_string(connection,)
                            $fname=mysqli_real_escape_string($con, $_POST['fname']);
                            $email=mysqli_real_escape_string($con, $_POST['email']);
                            $mob=mysqli_real_escape_string($con, $_POST['mob']);
                            $gender=mysqli_real_escape_string($con, $_POST['Gender']);
                            $address=mysqli_real_escape_string($con,$_POST['addr']);
                            // $special=mysqli_real_escape_string($con,$_POST['special']);
                            $pass=mysqli_real_escape_string($con, $_POST['pass']);

                            $passwrd=password_hash($pass,PASSWORD_BCRYPT);

                            if($fname == "" || $email== "" || $mob==""){
                                $passmsg='<div class="alert alert-danger col-md-12 text-center" role="alert">Fields cannot be empty</div>';
                            }
                            else{
                                $updatequery="update dregistration set fname='$fname',email='$email', mobile='$mob', gender='$gender', address='$address' where usname= '$formupdate'";
                                    $uquery=mysqli_query($con,$updatequery);
                                    if($uquery){
                                        ?>
                                         <script>
                                             alert('Sucessfully updated!');
                                             location.href="NDoctors.php";
                                        </script>
                                        <?php
                                    }else{
                                        ?>
                                        <script>
                                        alert('Invalid!');
                                        </script>
                                        <?php
                                    }
                            }
                        }   
                    ?>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" id="form">
                    <div class="row mt-2">
                        <?php if(isset ($passmsg)) {echo $passmsg;} ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="fname">Full Name:</label>
                            <div class="form-group ">
                                <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $r_name?>" required autocomplete="off">
                            </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="email">Email:</label>
                            <div class="form-group">
                                <input class="form-control" type="email" id="email" name="email" value="<?php echo $r_email?>" required>
                                <small id="email"></small>
                            </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="mob">Mobile no.:</label>
                            <div class="form-group">
                                <input class="form-control" type="text" id="mob" name="mob" value="<?php echo $r_contact?>" required>
                                <small id="mobilno""></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="addr">Select Gender:</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="Male" name="Gender"required>
                                    <label class="custom-control-label" for="Male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="Female" name="Gender">
                                    <label class="custom-control-label" for="Female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="mob">Select Speciality:</label>
                            <div class="form-group">
                                <select class="custom-select" name="special">
                                    <option value="" disabled selected><?php echo $r_special?></option>
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="addr">Address:</label>
                            <div class="form-group">
                            <textarea class="form-control" rows="4" id="addr" name="addr" value="" required><?php echo $r_addr?></textarea>
                            </div>   
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
                            </div>   
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>