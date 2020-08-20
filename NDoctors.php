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
    <title>No. Doctors</title>
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
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-success text-center">
                    <h3>No. of Doctors Details </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Speciality</th>
                                        <th scope="col" colspan="2">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sqlquery="select * from dregistration";

                                        $result=$con->query($sqlquery);
                                        
                                        $nums= mysqli_num_rows($result);
                                        while($res= mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $res['id']; ?></td>
                                                <td><?php echo $res['fname']; ?></td>
                                                <td><?php echo $res['usname']; ?></td>
                                                <td><?php echo $res['email']; ?></td>
                                                <td><?php echo $res['mobile']; ?></td>
                                                <td><?php echo $res['gender']; ?></td>
                                                <td><?php echo $res['address']; ?></td>
                                                <td><?php echo $res['speciality']; ?></td>
                                                <td class="text-center"><a href="NDoctorEdits.php?id=<?php echo $res['id']; ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                                <td><a href="DoctorsDelete.php?id=<?php echo $res['id']?>"><i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a></td>
                                            </tr>
                                            <?php   
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
</body>
</html>