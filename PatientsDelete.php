<?php 
    include 'DBcon.php';
    $ids=$_GET['id'];
    $deletequery="delete from registration where id=$ids";
    $query= mysqli_query($con,$deletequery);
    if($query){
        ?>
        <script type="text/javascript">
            alert("Deleted sucessfully");
            location.href="Npatients.php";
        </script> 
        <?php
    }
?>