<?php
    //get database connection
    include('connect.php');
    //get the id from url
    $id=$_GET['updateid'];

    //select data from table
    $sql = "SELECT * FROM item WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $item_code = $row['item_code'];
    $item_name = $row['item_name'];
    $item_category = $row['item_category'];
    $item_subcategory = $row['item_subcategory'];
    $quantity = $row['quantity'];
    $unit_price = $row['unit_price'];


    //get category from table
     $sql = "SELECT category FROM item_category"; 
    $result = mysqli_query($con, $sql);
    $categories = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    //get  subcategory from table
    $sql = "SELECT sub_category FROM item_subcategory"; 
    $result = mysqli_query($con, $sql);
    $sub_categories = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sub_categories[] = $row;
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }


//update data
if(isset($_POST['submit']))
{
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    $sql = "INSERT INTO item (item_code, item_name, item_category, item_subcategory, quantity, unit_price) 
            VALUES ('$item_code', '$item_name', '$item_category', '$item_subcategory', '$quantity', '$unit_price')";

    if(mysqli_query($con, $sql))
    {
        //echo "Records inserted successfully.";
        header("Location: ItemDetails.php");
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
    <title>Customer Registration</title>

        <style>
    #validation-alert {
        margin-top: 10px;
    }
</style>
</head>
<body>

<!-- Nav Bar -->
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

<!-- update form -->
<div class="d-flex justify-content-center">
    <div class="card text-white bg-secondary" style="width: 800px;">
    <br>
    <form id="item-form" class="form-horizontal col-lg-8 offset-lg-2" method="POST">
        <fieldset>
            <div class="row pb-2">
                <h2 class="text-primary">Update Item</h2>
                <hr />
            </div>
            <br>

            <div class="form-group">
                <label for="inputitemcode" class="col-lg-2 control-label text-right">Item Code</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputitemcode" placeholder="Item Code" name="item_code" value="<?php echo $item_code ?>" required>
                </div>
            </div>
            <br>

            <div class="form-group">
                <label for="inpuname" class="col-lg-2 control-label text-right">Item Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inpuname" placeholder="Item Name" name="item_name" value="<?php echo $item_name ?>" required>
                </div>
            </div>
            <br>


            <div class="form-group">
    <label for="category" class="col-lg-3 control-label">Item Category</label>
    <div class="col-lg-10">
        <select class="form-control" id="category" name="item_category" required>
            <option value="">Select Category</option>
            <!-- get category details from database -->
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['category']; ?>" <?php if ($item_category === $category['category']) echo 'selected'; ?>>
                    <?php echo $category['category']; ?>
                </option>
            <?php } ?>
        </select>
        <br>
    </div>
</div>


            <div class="form-group">
    <label for="subcategory" class="col-lg-3 control-label">Item Sub Category</label>
    <div class="col-lg-10">
        <select class="form-control" id="subcategory" name="item_subcategory" required>
            <option value="">Select Sub Category</option>
            <!-- get subcategory details from database -->
            <?php foreach ($sub_categories as $sub_category) { ?>
                <option value="<?php echo $sub_category['sub_category']; ?>" <?php if ($item_subcategory === $sub_category['sub_category']) echo 'selected'; ?>>
                    <?php echo $sub_category['sub_category']; ?>
                </option>
            <?php } ?>
        </select>
        <br>
    </div>
</div>
            <div class="form-group">
                <label for="inputquantity" class="col-lg-2 control-label text-right">Quantity</label>
                <div class="col-lg-10">
                    <input type="number" class="form-control" id="inputquantity" placeholder="Quantity" name="quantity" value="<?php echo $quantity ?>" required>
                </div>
            </div>
            <br>

            <div class="form-group">
                <label for="inputunitprice" class="col-lg-2 control-label text-right">Unit Price</label>
                <div class="col-lg-10">
                    <input type="number" class="form-control" id="inputunitprice" placeholder="Unit Price" name="unit_price" value="<?php echo $unit_price ?>" required>
                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-primary ml-2" name="submit">Update</button>
                </div>
            </div>
        </fieldset>
    </form>
    <br>
</div>
</div>

<!-- Validation alert -->
<div id="validation-alert" class="alert alert-danger d-none" role="alert">
    Please fill out all required fields and enter valid data.
</div>

<br>
<br>

<!-- footer -->
<footer class="footer mt-auto py-3 bg-primary">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>

<!-- form validation -->
<!-- Separate JavaScript for form validation -->
<script>
    // Function to validate the form before submission
    document.getElementById("item-form").onsubmit = function() {
        // ... (existing code)

        // Show the validation alert if any field is not valid
        if (itemCode === "" || itemName === "" || itemCategory === "" || itemSubcategory === "" || quantity === "" || unitPrice === "") {
            document.getElementById("validation-alert").classList.remove("d-none");
            return false;
        } else {
            document.getElementById("validation-alert").classList.add("d-none");
        }

        return isValid;
    };
</script>


</body>
</html>