<?php
//   session_start();
include 'DBcon.php';
//query for patient
$sqlquery1="select * from registration";
$query1=mysqli_query($con,$sqlquery1);
$nums1=mysqli_num_rows($query1);

//query for doctor
$sqlquery2="select * from dregistration";
$query2=mysqli_query($con,$sqlquery2);
$nums2=mysqli_num_rows($query2);

//query for booking
$sqlquery3="select * from booking";
$query3=mysqli_query($con,$sqlquery3);
$nums3=mysqli_num_rows($query3);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital dashboard</title>
    <?php include 'AllLinks.php' ?>
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-warning text-center">
                    <div class="card-header">
                        <h5>No. of Patients</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h4><?php {echo $nums1;} ?></h4>
                        </div>
                    <a href="NPatients.php" class="btn btn-block text-primary ">View</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-success text-center">
                    <div class="card-header">
                        <h5>No. of Doctors</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h4><?php {echo $nums2;} ?></h4>
                        </div>
                    <a href="NDoctors.php" class="btn btn-block text-warning ">View</a>
                    </div>      
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-info text-center">
                    <div class="card-header">
                        <h5>No. of Appoitments</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h4><?php {echo $nums3;} ?></h4>
                        </div>
                    <a href="NBooking.php" class="btn btn-block text-white ">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row mx-5 mt-5 text-center">
            <div class="col-md-12">
            <p class="bg-dark text-white p-2">List of Pending Requests</p>
            </div>
        </div>
        <?php 
            $sql="select * from booking";
            $result=$con->query($sql);
            if($result->num_rows>0){
                echo'
                <div class="row">
                <div class="col">   
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Request ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Speciality</th>
                      <th scope="col">Doctor</th>
                      <th scope="col">Description</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>   
                    </tr>
                  </thead>
                  <tbody>';
                  while($row=$result->fetch_assoc()){
                      if($row['bstatus']==0 || $row['bstatus']==""){
                        $row['bstatus']="Pending";
                        echo'<tr>';
                        echo'<td>'.$row['bid'].'</td>';
                        echo'<td>'.$row['bname'].'</td>';
                        echo'<td>'.$row['bspecial'].'</td>';
                        echo'<td>'.$row['bdoctor'].'</td>';
                        echo'<td>'.$row['bdescription'].'</td>';
                        echo'<td>'.$row['bdate'].'</td>';
                        echo'<td>'.$row['btime'].'</td>';
                        echo'<td>'.$row['bstatus'].'</td>';
                        echo'</tr>';
                     }elseif($row['bstatus']==1){
                        $row['bstatus']="Conform";
                      }else{
                        echo'<div class="alert alert-warning" role="alert">No Pending Status Found</div>';
                      }
                  };
                  '</tbody>
                </table>
                </div>
                </div>';   
            }else{
                echo'<div class="alert alert-warning" role="alert">No Result Found</div>';
            }
        ?>
    </div>

</body>
</html>