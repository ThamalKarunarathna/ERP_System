<?php
    //connect to database
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css" />
    <title>Document</title>
</head>
<body>

<!-- Nav bar -->
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


<button class="btn btn-primary my-5" style="margin-left:240px;">
<a  href="ItemAdd.php" class="text-light">Add Item</a>
</button>
    
<!-- Item Table -->
<div class="d-flex justify-content-center">
    <div class="table-responsive">
        <table class="table table-hover" style="width: 1000px">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Item Code</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Category</th>
                    <th scope="col">Item Sub Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

  <?php

//select data from item table
  $sql = "SELECT * FROM item";
  $result = mysqli_query($con, $sql);
  if($result){
    while($row=mysqli_fetch_assoc($result))
    {
        $id = $row['id'];
        $item_code = $row['item_code'];
        $item_name = $row['item_name'];
        $item_category = $row['item_category'];
        $item_subcategory = $row['item_subcategory'];
        $quantity= $row['quantity'];
        $unit_price = $row['unit_price'];
        echo "<tr  >
        <th scope='row'>$id</th>
        <td>$item_code</td>
        <td>$item_name</td>
        <td>$item_category</td>
        <td>$item_subcategory</td>
        <td>$quantity</td>
        <td>$unit_price</td>
        <td>
        <a href='ItemEdit.php?updateid=$id' class='btn btn-primary'>Edit</a>
        <a  href='ItemDelete.php?deleteid=$id' class='btn btn-danger'    >Delete</a>
        </td>
        </tr>";
    }
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
  ?>

  </tbody>
</table>
</div>
</div>

<br>
<br>

<!-- Footer -->
<footer class="footer mt-auto py-3 bg-primary">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>

</body>
</html>