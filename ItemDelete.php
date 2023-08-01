<?php

    //connect to database
    include('connect.php');

    //get the id from url
    if(isset($_GET['deleteid']))
    {
        $id = $_GET['deleteid'];
        //delete data from table
        $sql = "DELETE FROM item WHERE id = '$id'";

        if(mysqli_query($con, $sql))
        {
            header("Location: ItemDetails.php");
        }
        else
        {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }
?>