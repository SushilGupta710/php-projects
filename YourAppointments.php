<?php
session_start();
include 'DBcon.php';
$sqlquery="select * from booking where bid ={$_SESSION['bookid']}";
$result=$con->query($sqlquery);
if($result->num_rows == 1){
    $row=$result->fetch_assoc();
    $r_id=$row['bid'];
    $r_status=$row['bstatus'];
    $cr_status=$r_status;
    if($cr_status == ""){
        $cr_status="pending";
    }else{
        $cr_status="conform";
    }
    $r_name=$row['bname'];
    $r_special=$row['bspecial'];
    $r_doctor=$row['bdoctor'];
    $r_desc=$row['bdescription'];
    $r_date=$row['bdate'];
    $r_time=$row['btime'];

}else{
    $passmsg='<div class="alert alert-danger col-md-12" role="alert">something is wrong</div>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Appointments</title>
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

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col text-primary text-center">
                           <h4>Your Appointment id is: <?php echo $r_id?> </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                           <hr class="bg-dark">
                        </div>
                    </div>
                    <form action="">
                    <div class="row mt-2">
                            <div class="col">
                                <?php if(isset ($passmsg)) {echo $passmsg;} ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Status: </b><?php echo $cr_status?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Name: </b><?php echo $r_name?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Speciality: </b><?php echo $r_special?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Doctor: </b><?php echo $r_doctor?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Description: </b><?php echo $r_desc?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Date: </b><?php echo $r_date?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Time: </b><?php echo $r_time?></h5>
                            </div>
                        </div>
                        <form class="d-print-none">
                            <div class="row mt-2">
                                <div class="col">
                                    <button type="submit" class="btn btn-info btn-block d-print-none" value="print" onClick="window.print()">Print</button>
                                </div>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>