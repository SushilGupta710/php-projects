<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
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

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                        <h1>My Appointments</h1>
                        </div>
                    </div>
                    <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Speciality</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include 'DBcon.php';
                        $semail=$_SESSION['remail'];

                        $sqlquery="select * from booking where bemail ='$semail'";

                        $result=$con->query($sqlquery);

                        $nums= mysqli_num_rows($result);

                        while($res= mysqli_fetch_array($result)){
                          ?>
                            <tr>
                            <th scope="row"><?php echo $res['bid']; ?></th>
                            <td><?php echo $res['bspecial']; ?></td>
                            <td><?php echo $res['bdoctor']; ?></td>
                            <td><?php echo $res['bdescription']; ?></td>
                            <td><?php echo $res['bdate']; ?></td>
                            <td><?php echo $res['btime']; ?></td>
                            <td><a href="ViewAppointments.php?id=<?php echo $res['bid']; ?>" class"text-primary">View</a></td>
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
</body>
</html>