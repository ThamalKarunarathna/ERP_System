<?php

    //connect to database
    $con = mysqli_connect("localhost","root","","assignment");

    if(!$con)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>