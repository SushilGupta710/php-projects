<?php
//   session_start();
include 'DBcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No. Appointments</title>
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
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-info text-center">
                    <h3>No. of Appoitments Details </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Speciality</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" colspan="2">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php      
                                    $sqlquery="select * from booking";

                                    $result=$con->query($sqlquery);
                                                                            
                                    $nums= mysqli_num_rows($result);
                                    while($res= mysqli_fetch_array($result)){
                                        if($res['bstatus'] == 0 || $res['bstatus']="" ){
                                            $res['bstatus']="Pending";
                                        }else{
                                            $res['bstatus']="Conform";
                                        }
                                      ?>
                                        <tr>
                                            <td><?php echo $res['bid']; ?></td>
                                            <td><?php echo $res['blocation']; ?></td>
                                            <td><?php echo $res['bspecial']; ?></td>
                                            <td><?php echo $res['bdoctor']; ?></td>
                                            <td><?php echo $res['bname']; ?></td>
                                            <td><?php echo $res['bemail']; ?></td>
                                            <td><?php echo $res['bcontact']; ?></td>
                                            <td><?php echo $res['bgender']; ?></td>
                                            <td><?php echo $res['bage']; ?></td>
                                            <td><?php echo $res['bdescription']; ?></td>
                                            <td><?php echo $res['bdate']; ?></td>
                                            <td><?php echo $res['btime']; ?></td>
                                            <td><?php echo $res['bstatus']; ?></td>
                                            <td class="text-center"><a href="NBoookEdits.php?id=<?php echo $res['bid']; ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                            <td><a href="BookingDelete.php?id=<?php echo $res['bid']?>"><i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a></td>
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