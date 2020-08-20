<?php 
    include 'DBcon.php';
    $ids=$_GET['id'];
    $deletequery="delete from booking where bid=$ids";
    $query= mysqli_query($con,$deletequery);
    if($query){
        ?>
        <script type="text/javascript">
            alert("Deleted sucessfully");
            location.href="NBooking.php";
        </script> 
        <?php
    }
?>