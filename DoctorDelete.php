<?php 
    include 'DBcon.php';
    $ids=$_GET['id'];
    $deletequery="delete from dregistration where id=$ids";
    $query= mysqli_query($con,$deletequery);
    if($query){
        ?>
        <script type="text/javascript">
            alert("Deleted sucessfully");
            location.href="NDoctors.php";
        </script> 
        <?php
    }
?>