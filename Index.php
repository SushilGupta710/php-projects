<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <?php include 'AllLinks.php' ?>
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="MainStyleSheet.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js"></script>

  <?php
    if(isset($_SESSION['fullname']) && !empty($_SESSION['fullname']))
    {
      $logout='<div><a class="nav-link btn btn-outline-light" href="Logout.php">Logout</a></div>';

      $Profile='<a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>';
      
      $book1='<a href="BookAppointment.php" class="btn btn-dark p-3">Book an Appointment</a>';
      ?>
        <script type="text/javascript">
        $(document).ready(function() {
        $('#myModal').modal('hide');
        });
        </script>
      <?php
    }elseif(isset($_SESSION['doctname']) && !empty($_SESSION['doctname'])){ 
      $logout='<div><a class="nav-link btn btn-outline-light" href="Logout.php">Logout</a></div>';

      $DashBord='<a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My DashBoard</a>';
      ?>
        <script type="text/javascript">
        $(document).ready(function() {
        $('#myModal').modal('hide');
        });
        </script>
      <?php
    }elseif(isset($_SESSION['hosusername']) && !empty($_SESSION['hosusername'])){ 
      $logout='<div><a class="nav-link btn btn-outline-light" href="Logout.php">Logout</a></div>';

      $DashBord='<a class="nav-link btn btn-outline-light" href="HospitalDashboard.php">Dashboard</a>';
      ?>
        <script type="text/javascript">
        $(document).ready(function() {
        $('#myModal').modal('hide');
        });
        </script>
      <?php
    }else{ 
      $signin='<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign in </a>';

      $Register='<a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>';
      
      $book2='<a href="Index.php" class="btn btn-dark p-3">Book an Appointment</a>';
      ?>
      <script type="text/javascript">
      $(document).ready(function() {
      $('#myModal').modal('show');
      });
      </script>
      <?php
    }
  ?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="75">
    <!-- NavBar -->
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
            <a class="nav-link" href="#service-section">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about-section">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact-section">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a> -->
            <?php if(isset($DashBord)) {echo $DashBord;} ?>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="DoctorProfile.php">Hello Dr. <?php echo $_SESSION['doctname'];?></a>
              <a class="dropdown-item" href="#">My Appointments</a>
              <a class="dropdown-item" href="#">Future set</a>
              <!-- <a class="dropdown-item" href="#">unknown</a> -->
            </div>
          </li>          
          <li class="nav-item dropdown">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a> -->
            <?php if(isset($Profile)) {echo $Profile;} ?>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="UserProfile.php">Hello <?php echo $_SESSION['fullname'];?></a>
              <a class="dropdown-item" href="BookAppointment.php">Book Appointment</a>
              <a class="dropdown-item" href="AppointmentsList.php">View Appointment</a>
              <a class="dropdown-item" href="DoctorPrescription.php">Doctor Prescription</a>
              <!-- <a class="dropdown-item" href="#">unknown</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sign in </a> -->
              <?php if(isset($signin)) {echo $signin;} ?>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal">User Login </a>
              <a class="dropdown-item" href="DoctorLog.php">Doctor Login</a>
              <a class="dropdown-item" href="HospitalLog.php">Hospital Login</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a> -->
            <?php if(isset($Register)) {echo $Register;} ?>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="PatientReg.php">Patient Register </a>
              <a class="dropdown-item" href="DoctorReg.php">Doctor Register</a>
            </div>
          </li>
          <li class="nav-item">
            <?php if(isset($logout)) {echo $logout;} ?>
          </li>  
        </ul>
      </div>
    </nav>
    <!--End of NavBar -->
    
    <!-- User Login -->
    <div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
      
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">User Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <center> <img width="80px" src="./Icons/User Profile.png" alt=""></center>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <center><h3>Patient Login</h3></center>
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
              if(isset($_POST['login'])){
                
                $username=$_POST['uname'];//storing user email in $email varible
                $password=$_POST['pass'];//storing user password in $pass varible
                                    
                //to check that user enter data is valid or is present in dat aor not
                $qureysearch="select * from registration where usname='$username'";
                //SQL query to search
                $queryrun=mysqli_query($con,$qureysearch);
                //checking that if username is exist in database 
                $user_count_row = mysqli_num_rows($queryrun);
                if($user_count_row){
                  //fetching password id user name matched
                  $datafetch=mysqli_fetch_assoc($queryrun);
        
                  //storing fetched password in fet_passwd
                  $fet_passwd=$datafetch['passwd'];
                                        
                  //to fetch the data
                  //storing fname in session
                  $_SESSION['fullname']= $datafetch['fname'];//way 1
                  $_SESSION['remail']=$datafetch['email'];                      
                  // $_SESSION["isLogin"]=true;//checking user is login or not
                                        
                  //storing uname in session
                  $username_data=$datafetch['usname'];//here we got the user name
                  $_SESSION['username']=$username_data;//way 2

                  //to check both password are same or not
                  $pass_decode=password_verify($password,$fet_passwd);
                    if($pass_decode){
                      ?>
                        <script>
                          location.href='Index.php';
                        </script>
                      <?php
                    }else{
                      $errmsg='<div class="alert alert-danger text-center">Invalid Password</div>';
                    }
                }else{
                  $errmsg='<div class="alert alert-danger col-md-8 text-center">Invalid Username</div>';
                }
              }   
            ?>
            <form action="Index.php" method="POST">
              <div class="row justify-content-center">
                <?php if(isset ($errmsg)) {echo $errmsg;} ?>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="uname">Username:</label>
                  <div class="form-group ">
                    <input class="form-control" type="text" id="uname" name="uname" placeholder="Enter Username*" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label for="pass">Password:</label>
                  <div class="form-group">
                    <input class="form-control" type="password" name="pass" id="pass" placeholder="Enter password*" required>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-success btn-block">Login Now</button>
                  </div>   
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <center><p>Don't have an account ? <a href="PatientReg.php">Sign up here</a></p></center>
                </div>
               </div>
            </form>
          </div>
        </div>
      </div>
    </div><!-- End of User Login -->

    <!-- Home-Section -->
    <section id="home-section">
      <div class="Banner-img">
      </div>
    </section>
    <!-- End of Home-Section -->

    <!-- Book an Appointment -->
    <section id="Appointment" class="pt-3 pb-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 bg-dark p-4 text-center">
            <h3 class="text-white mr-2">How it work ?</h3>
            <p class="text-white mr-2">Get an appointment in four steps</p>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-3 p-2 text-center">
              <small>Step-1</small><br>
              <i aria-hidden="true" class="fas fa-map-marker-alt mt-2 mb-2" style='font-size:36px'></i>
              <p class="text-secondary">Select location</p>
              </div>
              <div class="col-md-3 p-2 text-center">
              <small>Step-2</small><br>
              <i aria-hidden="true" class="fas fa-user-md mt-2 mb-2" style='font-size:36px'></i>
              <p class="text-secondary">Choose Doctor</p>
              </div>
              <div class="col-md-3 p-2 text-center">
              <small>Step-3</small><br>
              <i aria-hidden="true" class="fas fa-user-check mt-2 mb-2" style='font-size:36px'></i>
              <p class="text-secondary">Verifying you</p>
              </div>
              <div class="col-md-3 p-2 text-center">
              <small>Step-4</small><br>
              <i aria-hidden="true" class="fas fa-calendar-alt mt-2 mb-2" style='font-size:36px'></i>
              <p class="text-secondary">Appointment done</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 text-center pt-4">
            <?php if(isset ($book1)) {echo $book1;} ?>
            <?php if(isset($book2)) {echo $book2;} ?>
          </div>
        </div>
      </div>
    </section>
    <!-- End of Book an Appointment -->

    <!-- Covid news section -->
    <section class="bg-dark pt-5 pb-5">
      <div class="container bg-white">
        <div class="row">
          <div class="col-md-6">
            <img src="./Images/coronavirus.jpg" class="img-fluid mt-3 mb-3" alt="">
          </div>
          <div class="col-md-6 p-3">
            <span class="text-danger">News</span>
            <h1> <a class="text-dark" href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">COVID-19: Rolling updates for our community</a></h1>
            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p class="text-danger">Date: <span id="datetime"></span></p>
            <script>
            var dt = new Date();
            document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
            </script>
          </div>
        </div>
      </div>
    </section>
    <!-- End of Covid news section -->

    <!-- Services-Section -->
    <section id="service-section" class="pt-5 pb-5">
      <div class="container">
          <h1 class="text-center text-secondary">Services</h1>
          <br>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2">
              <img class="mx-auto d-block" src="./Icons/emergency.png"  alt=""> 
              <h5 class="text-center mt-2">Emergency Unit</h5>
              <p class="text-left text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2 ">
              <img class="mx-auto d-block" src="./Icons/corona.png" alt="">
              <h5 class="text-center mt-2" >Coronary Care unit</h5>
              <p class="text-left text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2 ">
              <img class="mx-auto d-block" src="./Icons/ICU.png" alt="">
              <h5 class="text-center mt-2" >Intensive Care Unit</h5>
              <p class="text-left text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2 ">
              <img class="mx-auto d-block" src="./Icons/operating.png" alt="">
              <h5 class="text-center mt-2" >Operation Theatre</h5>
              <p class="text-left text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2">
              <img class="mx-auto d-block" src="./Icons/Lab.png" alt="">
              <h5 class="text-center mt-2" >Laboratory</h5>
              <p class="text-left text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2">
              <img class="mx-auto d-block" src="./Icons/surgery.png" alt="">
              <h5 class="text-center mt-2" >Day Surgery Unit</h5>
              <p class="text-left text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2">
              <img class="mx-auto d-block" src="./Icons/clinic.png" alt="">
              <h5 class="text-center mt-2" >Clinical Services</h5>
              <p class="text-left text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 p-2">
              <img class="mx-auto d-block" src="./Icons/appointment.png" alt="">
              <h5 class="mt-2 text-center" >Online Appointment</h5>
              <p class="text-left text-center mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div> 
      </div>
    </section>
    <!-- End of Services-Section -->

    <!-- About-section -->
    <section id="about-section" class="pt-5 pb-5 bg-dark">
      <div class="container">
        <h1 class="text-center text-white">About our Website</h1>
        <br>
        <div class="row">
          <div class="col-md-4 mb-2">
            <div class="card">
              <img class="card-img-top img-fluid" src="./Images/patma.jpg" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Patients Managment System</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
            </div>
            </div>
          </div>
          <div class="col-md-4 mb-2">
            <div class="card">
              <img class="card-img-top img-fluid" src="./Images/am.jpg" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Appointment Managment System</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
            </div>
            </div>
          </div>
          <div class="col-md-4 mb-2">
            <div class="card">
              <img class="card-img-top img-fluid" src="./Images/hm.jpg" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Hospital Managment System</h4>
              <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End of About-section -->
    
    <!-- Contact-section -->
    <section id="contact-section" class="pt-5 pb-5">
      <div class="container">
      <h1 class="text-center text-secondary">Contact us</h1>
        <br>
        <div class="row">
          <div class="col-md-6 mb-2">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60356.64480198391!2d73.1204967041053!3d19.006925448575906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7e86a7af59185%3A0xe57324073d168bfd!2sLifeline%20Hospital%2C%20Panvel!5e0!3m2!1sen!2sin!4v1594817314583!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
          <div class="col-md-6">
            <div class="header bg-dark text-center text-white">
              <p class="p-3 ">Send us a message</p>
            </div>
            <div class="body">
              <?php 
                include 'DBcon.php';
                if(isset($_POST['send'])){
                  $fname=mysqli_real_escape_string($con, $_POST['fname']);
                  $email=mysqli_real_escape_string($con, $_POST['email']);
                  $mesg=mysqli_real_escape_string($con,$_POST['mesg']);

                  $insertquery="insert into contactus (fullname,email,message) values('$fname','$email','$mesg')";
                  $rquery=mysqli_query($con,$insertquery);
                  if($rquery){
                    ?>
                    <script>
                      swal("Sucessfull!", "Thankyou for your message!", "success");
                    </script>
                    <?php
                  }else{
                    ?>
                      <script>
                       swal("Error!", "Please Check your input", "error");
                      </script>
                    <?php
                  }
                }
              ?>
              <form action="Index.php" method="POST">
                <div class="row">
                  <div class="col-md-12">
                    <label for="fname">Full Name*:</label>
                    <div class="form-group ">
                      <input class="form-control" type="text" id="fname" name="fname" required autocomplete="off">
                      <small id="funame"></small>
                    </div>   
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="email">Email*:</label>
                    <div class="form-group ">
                      <input class="form-control" type="email" id="email" name="email" required autocomplete="off">
                      <small id="email"></small>
                    </div>   
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label for="comment">Type your message here*:</label>
                    <div class="form-group ">
                      <textarea class="form-control" rows="4" id="comment" name="mesg" required autocomplete="off"></textarea>
                      <small id="mesg"></small>
                    </div>   
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <button type="submit" name="send" id="#register"class="btn btn-dark btn-block">Send</button>
                    </div>   
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End of Contact-section -->

    <!-- Footer Section-->
    <section id="footer-section" class="bg-dark pt-2 pb-2">
      <div class="container">
            <p class="text-white text-center pt-3 ">Copyright ©- 2020. Etc Hospitals Group. All Rights Reserved.</p>
      </div>
    </section>
    <!-- End of Footer Section-->
</body>
</html>