<?php

    //get databse connection
    include('connect.php');

    //get all district in district table to the dropdown
    $sql = "SELECT district FROM district"; 
    $result = mysqli_query($con, $sql);
    $district = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $district[] = $row;
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }


//insert data to the database
if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $district = $_POST['district'];

    //insert data to the database
    $sql = "INSERT INTO customer (title, first_name, middle_name, last_name, contact_no, district) 
            VALUES ('$title', '$first_name', '$middle_name', '$last_name', '$contact_no', '$district')";

    if(mysqli_query($con, $sql))
    {
        //echo "Records inserted successfully.";
        header("Location: CusDetails.php");
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
   
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <title>Customer Registration</title>

</head>
<body>

<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="Cusdetails.php">User
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ItemDetails.php">Item</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Report.php">Reports</a>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<br>
 
<!-- Customer details form -->
<div class="d-flex justify-content-center">
    <div class="card text-white bg-secondary" style="width: 800px;">
        <div class="card-body">
            <form id="customer-form" class="form-horizontal col-lg-8 offset-lg-2" method="POST">
                <fieldset>
                    <div class="row pb-2">
                      <br>
                        <h2 class="text-primary">Customer Registration</h2>
                        <hr />
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="select" name="title">
                                <option>Select Your Title</option>
                                <option>Mr</option>
                                <option>Mrs</option>
                                <option>Miss</option>
                                <option>Dr</option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="first_name" class="col-lg-2 control-label text-right">First Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="middle_name" class="col-lg-3 control-label text-right">Middle Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="middle_name" placeholder="Middle Name" name="middle_name">
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="last_name" class="col-lg-2 control-label text-right">Last Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="contact_no" class="col-lg-3 control-label text-right">Contact Number</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="contact_no" placeholder="Contact Number" name="contact_no">
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="district" class="col-lg-2 control-label text-right">District</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="district" name="district">
                                <option>Select Your District</option>
                                <!-- get district details from the database -->
                                <?php foreach ($district as $key => $value) { ?>
                                    <option value="<?php echo $value['district']; ?>"><?php echo $value['district']; ?></option>
                                <?php } ?>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary ml-2" name="submit">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<!-- validation alert -->
<div class="alert alert-danger d-none" id="validation-alert">
    Please fill out all required fields and enter a valid 10-digit contact number.
</div>


<br>
<br>

<!-- footer -->
<footer class="footer mt-auto py-3 bg-primary">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>

<!-- Separate JavaScript -->


<script>
    // Function to validate the form before submission
    document.getElementById("customer-form").onsubmit = function() {
        var firstName = document.getElementById("first_name").value.trim();
        var lastName = document.getElementById("last_name").value.trim();
        var contactNo = document.getElementById("contact_no").value.trim();

        // Regular expression for a valid 10-digit phone number
        var phonePattern = /^\d{10}$/;

        if (firstName === "" || lastName === "" || !phonePattern.test(contactNo)) {
            // Display the validation alert
            $("#validation-alert").removeClass("d-none");
            return false;
        } else {
            // Hide the validation alert
            $("#validation-alert").addClass("d-none");
        }

        return true;
    };
</script>




</body>
</html>