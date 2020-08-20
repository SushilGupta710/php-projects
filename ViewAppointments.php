<?php
session_start();
include 'DBcon.php';
$ids=$_GET['id'];
$sqlquery="select * from booking where bid ={$ids}";
$result=$con->query($sqlquery);

$arrdata= mysqli_fetch_array($result);
if($arrdata['bstatus']==0 || $arrdata['bstatus']==""){
    $arrdata['bstatus']="pending"; 
}
elseif($arrdata['bstatus']==1 ){
    $arrdata['bstatus']="conform";
}else{
    $arrdata['bstatus']="invalid"; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
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
        <div class="col-md-5 mx-auto">
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
                    <form action="">
                        <div class="row mt-2">
                            <div class="col">
                                <?php if(isset ($passmsg)) {echo $passmsg;} ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Id: </b><?php echo $arrdata['bid']; ?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Status: </b><?php echo $arrdata['bstatus'];?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Name: </b><?php echo $arrdata['bname'];?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Speciality: </b><?php echo $arrdata['bspecial'];?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Doctor: </b><?php echo $arrdata['bdoctor'];?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Description: </b><?php echo $arrdata['bdescription'];?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Date: </b><?php echo $arrdata['bdate'];?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h5><b>Time: </b><?php echo $arrdata['btime'];?></h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <a href="Index.php" class="btn btn-info btn-block">Done</a>
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