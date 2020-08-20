<?php
include 'DBcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No. Patients</title>
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
                <div class="card-header text-center bg-warning">
                    <h3>No. of Patients Details</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile no.</th>
                            <th scope="col" colspan="2">Operations</th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php
                        $sqlquery="select * from registration";

                        $result=$con->query($sqlquery);

                        $nums= mysqli_num_rows($result);

                        while($res= mysqli_fetch_array($result)){
                        ?>
                        <tr>
                        <th scope="row"><?php echo $res['id']; ?></th>
                            <td><?php echo $res['fname']; ?></td>
                            <td><?php echo $res['usname']; ?></td>
                            <td><?php echo $res['email']; ?></td>
                            <td><?php echo $res['mob']; ?></td>
                            <td class="text-center"><a href="NPatientsEdits.php?id=<?php echo $res['id']; ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td><a href="PatientsDelete.php?id=<?php echo $res['id']?>"><i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a></td>
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
</body>
</html>