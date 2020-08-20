<?php
session_start();
include 'DBcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBookedits</title>
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
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light" href="HospitalDashboard.php">Dashboard</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light" href="Logout.php">Logout</a>
          </li> 
        </ul>
      </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col text-primary text-center">
                           <h4>Details of Appointment</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                           <hr class="bg-dark">
                        </div>
                    </div>
                    <?php 
                        include 'DBcon.php';
                        $ids=$_GET['id'];
                        // $un=$_GET['username'];
                        $sqlquery="select * from booking where bid ='$ids'";
                        $showdata=mysqli_query($con,$sqlquery);
                        if($showdata->num_rows == 1){
                            $row=$showdata->fetch_assoc();
                            $r_id=$row['bid'];
                            $r_location=$row['blocation'];
                            $r_special=$row['bspecial'];
                            $r_doctor=$row['bdoctor'];
                            $r_name=$row['bname'];
                            $r_email=$row['bemail'];
                            $r_contact=$row['bcontact'];
                            $r_gender=$row['bgender'];
                            $r_age=$row['bage'];
                            $r_desc=$row['bdescription'];
                            $r_date=$row['bdate'];
                            $r_time=$row['btime'];
                            $r_status=$row['bstatus'];
                        }else{
                            echo 'something is wrong';
                            // $passmsg='<div class="alert alert-warning col-md-12" role="alert">Any field cannot be empty</div>';
                        }
                        if(isset($_POST['edit'])){

                            $status=mysqli_real_escape_string($con,$_POST['status']);
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

                            if($status == "" || $cname== "" || $email=="" ||$cont=="" || $age=="" || $description=="" || $date=="" || $time=="" ){
                                $passmsg='<div class="alert alert-danger col-md-12 text-center" role="alert">Fields cannot be empty</div>';
                            }
                            else{
                                $updatequery="update booking set blocation='$city', bspecial='$special', bdoctor='$doctor', bname='$cname', bemail='$email',bcontact='$cont', bgender='$gender', bage='$age', bdescription='$description', bdate='$date', btime='$time',bstatus='$status' where bid= '$ids'";
                                    $uquery=mysqli_query($con,$updatequery);
                                    if($uquery){
                                        ?>
                                         <script>
                                             alert('Sucessfully updated!');
                                             location.href="NBooking.php";
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
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                        <?php if(isset ($passmsg)) {echo $passmsg;} ?>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <label for="">Status:(Change status in 1 and 0)</label>
                            <div class="form-group">
                            <input class="form-control" type="text" name="status" value="<?php echo $r_status?>" required>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <label for="">Location is:</label>
                            <div class="form-group">
                            <select name="city" class="form-control custom-select" required >
                                <option value="<?php echo $r_location?>" disabled></option>
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
                            <label for="speciality">Speciality:</label>
                            <div class="form-group">
                            <select class="custom-select form-control" name="speciality" required>
                                <option value="<?php echo $r_special?>" disabled></option>
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
                            <label for="">Doctor:</label>
                            <div class="form-group">
                            <select class="custom-select form-control" name="cdoct" required> 
                                <option value="<?php echo $r_doctor?>" disabled></option>
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
                            <label for="">Name:</label>
                            <div class="form-group">
                            <input class="form-control" type="text" name="name" value="<?php echo $r_name?>" required autocomplete="off">
                            </div>
                            <label for="email">Email:</label>
                            <div class="form-group">
                            <input class="form-control" type="email" name="email" value="<?php echo $r_email?>" required autocomplete="off">
                            </div>
                            <label for="">Contact:</label>
                            <div class="form-group">
                            <input class="form-control" type="text" name="contact" value="<?php echo $r_contact?>" maxlength="10" required autocomplete="off">
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
                                <input class="form-control" type="text" value="<?php echo $r_age?>" name="age" required >
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col">
                                <label for="desc">Description:</label>
                                <div class="form-group">
                                <textarea class="form-control" rows="3" name="desc" value="<?php echo $r_desc?>" required ></textarea>
                                </div>   
                            </div>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <label for="">Date:</label>
                            <div class="form-group">
                            <input class="form-control" type="date" value="<?php echo $r_date?>" name="date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Time slot:</label>
                            <div class="form-group">
                            <select class="custom-select form-control" name="timeslot" required>
                                <option value="<?php echo $r_time?>" disabled ></option> 
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
                            <button type="submit" name="edit" class="btn btn-success btn-block">Edit</button>
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