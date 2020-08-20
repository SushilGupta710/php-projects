<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <!-- Bootstrap CDN Link,Navbar css link,fontawsome link,google font link -->
    <?php include 'AllLinks.php'?>
    <!-- Stylesheet file link -->
    <link rel="stylesheet" href="BookAppointment.css">
    <link href="./tailselect/css/bootstrap4/tail.select-default.css" rel="stylesheet" >
    
</head>
<body>
<script src="./tailselect/js/tail.select-full.js"></script>
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
            <a class="nav-link" href="Index.php#service-section">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Index.php#about-section">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Index.php#contact-section">Contact</a>
          </li>          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="#">Hello <?php echo $_SESSION['fullname']; ?></a>
              <a class="dropdown-item" href="#">My Appointment</a>
              <a class="dropdown-item" href="#">Medicine Details</a>
              <a class="dropdown-item" href="#">unknown</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light" href="Logout.php">Logout</a>
          </li>  
        </ul>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-md-5 mx-auto mt-3">
          <div class="card"> 
            <div class="card-body">
              <div class="row text-white p-2">
                <div class="col">
                  <center><h3>Book an Appointment</h3></center>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <hr>
                </div>
              </div>
              <?php
                include 'DBcon.php';
                  if(isset($_POST['booking'])){

                    $city=mysqli_real_escape_string($con,$_POST['city']);
                    $special=mysqli_real_escape_string($con,$_POST['speciality']);
                    $doctor=mysqli_real_escape_string($con,$_POST['cdoct']);
                    $cname=mysqli_real_escape_string($con, $_POST['name']);
                    $email=mysqli_real_escape_string($con, $_POST['email']);
                    $cont=mysqli_real_escape_string($con, $_POST['contact']);
                    $gender=mysqli_real_escape_string($con, $_POST['gender']);
                    $age=mysqli_real_escape_string($con,$_POST['age']);
                    $description=mysqli_real_escape_string($con,$_POST['desc']);
                    $date=mysqli_real_escape_string($con,$_POST['date']);
                    $time=mysqli_real_escape_string($con,$_POST['timeslot']);

                    $sqlquery="select * from registration where email ='$email'";
                    $showdata=mysqli_query($con,$sqlquery);
                    if($showdata->num_rows == 1){
                        $row=$showdata->fetch_assoc();
                        //Now we are inserting into database
                        $insertquery="insert into booking(blocation, bspecial, bdoctor, bname, bemail,bcontact, bgender, bage, bdescription, bdate, btime) values('$city', '$special', '$doctor', '$cname','$email', '$cont', '$gender', '$age', '$description', '$date','$time')";
                        if($con->query($insertquery) == TRUE){
                          $genid= mysqli_insert_id($con);//isese hume pata chal jaye ga hum ne konsa data save kiya
                          $_SESSION['bookid']=$genid;//jo id mila hai usko session main store ker lenge
                          ?>
                            <script>
                            swal("Sucessfull!", "Booking sucessfully!", "success");
                            location.href="YourAppointments.php";
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
                    else{
                      $passmsg='<div class="alert alert-danger col text-center" role="alert">Please enter register email id !</div>';
                    }
                  }
              ?>
              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="row">
                  <?php if(isset ($passmsg)) {echo $passmsg;} ?>
                </div>
                <div class="row">
                  <div class="col">
                    <h5>Step-1</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="">Select Location:</label>
                    <div class="form-group">
                    <select name="city" class="form-control custom-select" required >
	                    <option selected="selected" value="" disabled>Choose Your City of Preference </option>
	                    <option value="Ahmedabad">Ahmedabad</option>
                      <option value="Bangalore">Bangalore</option>
                      <option value="Chennai">Chennai</option>
                      <option value="Delhi">Delhi</option>
                      <option value="Guwahati">Guwahati</option>
                      <option value="Hyderabad">Hyderabad</option>
                      <option value="Kolkata">Kolkata</option>
                      <option value="Mumbai">Mumbai</option>
                    </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5>Step-2</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="mob">Select Speciality:</label>
                    <div class="form-group">
                      <select class="custom-select form-control" name="speciality" required>
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
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="">Choose a Doctor:</label>
                    <div class="form-group">
                      <select class="custom-select form-control" name="cdoct" required> 
                        <option value="Atul">Atul</option>
                        <option value="sushil">sushil</option>
                        <option value="ramesh">ramesh</option>
                        <option value="ashok">ashok</option>
                        <option value="ranjana">ranjana</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5>Step-3</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <h6>Your Details:</h6>
                    <label for="">Name:</label>
                    <div class="form-group">
                    <input class="form-control" type="text" name="name" required autocomplete="off">
                    </div>
                    <label for="email">Email:</label>
                    <div class="form-group">
                    <input class="form-control" type="email" name="email" required autocomplete="off">
                    </div>
                    <label for="">Contact:</label>
                    <div class="form-group">
                    <input class="form-control" type="text" name="contact" maxlength="10" required autocomplete="off">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="addr">Select Gender:</label>
                        <div class="form-group">
                          <div class="custom-control custom-radio custom-control-inline" required>
                            <input type="radio" class="custom-control-input" id="Male" name="gender" value="Male">
                            <label class="custom-control-label" for="Male">Male</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="Female" name="gender" value="Female">
                            <label class="custom-control-label" for="Female">Female</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="">Age:</label>
                        <div class="form-group">
                          <input class="form-control" type="text" name="age" required >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="addr">Description:</label>
                        <div class="form-group">
                          <textarea class="form-control" rows="3" name="desc" required autocomplete="off"></textarea>
                        </div>   
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5>Step-4</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Date:</label>
                    <div class="form-group">
                      <input class="form-control" type="date" name="date" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="">Time slot:</label>
                    <div class="form-group">
                      <select class="custom-select form-control" name="timeslot" required>
                        <option value="" disabled selected>Select time slot </option> 
                        <option value="8am-9am">8am-9am</option>
                        <option value="9am-10am">9am-10am</option>
                        <option value="11am-12pm">11am-12pm</option>
                        <option value="12am-1pm">12am-1pm</option>
                        <option value="2pm-3pm">2pm-3pm</option>
                        <option value="3pm-4pm">3pm-4pm</option>
                        <option value="4pm-5pm">4pm-5pm</option>
                        <option value="5pm-6pm">5pm-6pm</option>
                        <option value="6pm-7pm">6pm-7pm</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-2 justify-content-center">
                  <div class="col-md-6 ">
                    <div class="form-group">
                      <button type="submit" name="booking" class="btn btn-success btn-block">Book now</button>
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
<!-- Search bar in dropdown js code -->
<script type="text/javascript">
  tail.select("#location_select",{ 
  search:true
  });
</script>
</html>