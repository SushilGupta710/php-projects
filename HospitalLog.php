<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Login</title>
    <!-- Bootstrap CDN Link,Navbar css link,fontawsome link,google font link -->
    <?php include 'AllLinks.php'?>
</head>
<body>
<!-- Navigation Bar -->
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
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sign in
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="Indes.php">User Login </a>
              <a class="dropdown-item" href="DoctorLog.php">Doctor Login</a>
              <a class="dropdown-item" href="HospitalLog.php">Hospital Login</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="PatientReg.php">Patient Register </a>
              <a class="dropdown-item" href="DoctorLog.php">Doctor Register</a>
            </div>
          </li>
        </ul>
      </div>
</nav>
<div class="container-fluid mt-4">
    <div class="row mybg">
        <div class="col-sm-6 col-md-5 col-lg-5 col-xl-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <center> <img width="80px" src="./Icons/hospitallog.png" alt=""></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <center><h3>Hospital Login</h3></center>
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
                
                                $username=$_POST['uname'];//storing user email in $email varible
                                $password=$_POST['pass'];//storing user password in $pass varible
                                                        
                                //to check that user enter data is valid or is present in dat aor not
                                $qureysearch="select * from hospitallogin where husername='$username' AND hpassword='$password'";
                                //SQL query to search
                                $queryrun=mysqli_query($con,$qureysearch);
                                //checking that if username is exist in database 
                                $user_count_row = mysqli_num_rows($queryrun);
                                if($user_count_row){
                                    //fetching password id user name matched
                                    $datafetch=mysqli_fetch_assoc($queryrun);
                                        
                                    //storing uname in session
                                    $username_data=$datafetch['husername'];//here we got the user name
                                    $_SESSION['hosusername']=$username_data;//way 2
                                    ?>
                                        <script>
                                            //in these i have use call back function for popup alert and pasing and argument
                                            function sweetalert(callback){
                                            //it will execute first 
                                            swal("Sucessfull!", "You have Login Sucessfully!", "success");
                                            setTimeout(() => {
                                                //we are calling loc function after 2 sec     
                                                    callback();
                                                }, 2000);
                                            }
                                            //it will redirect to home page if it will sucessfully login
                                            function loc(){
                                                location.replace("HospitalDashboard.php");
                                            }
                                            //calling an alert function with parameter of location
                                            sweetalert(loc);
                                        </script>
                                        <?php
                                    }else{
                                        $passmsg='<div class="alert alert-danger col-md-12 text-center" role="alert">Invalid Username or Password</div>';
                                    }
                            } 
                    ?>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" id="form">
                    <div class="row">
                        <?php if(isset ($passmsg)) {echo $passmsg;} ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="uname">Username:</label>
                            <div class="form-group ">
                                <input class="form-control" type="text" id="uname" name="uname" placeholder="Enter Username*" required>
                                <small></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="pass">Password:</label>
                            <div class="form-group">
                                <input class="form-control" type="password" name="pass" id="pass" placeholder="Enter password*" required>
                                <small id="password"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success btn-block">Login Now</button>
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