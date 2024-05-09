<?php 
    $con = mysqli_connect("localhost", "root", "dstsdb");

    if(mysqli_connect_errno())
    {
        echo "connection Fail".mysqli_connect_error();
    }
?>