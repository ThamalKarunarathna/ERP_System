<?php
//get database connection
include('connect.php');

// SQL query to retrieve item data, group by item name, and calculate total quantity
$sql = "SELECT item_name, item_category, item_subcategory, quantity
        FROM item
        GROUP BY item_name";

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css" />
    <title>Item Report</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <!-- Navbar content -->
</nav>

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

<!-- Report Table -->
<div class="row pb-2" style="margin-left:240px;">
		<h2 class="text-primary">Item Report</h2>
		<hr />
	</div>
    <div class="d-flex justify-content-center">
    <diV  class="table-responsive">
    <table border="1" class="table table-hover" style="width: 1000px">
        <tr>
                    <th>Item Name</th>
                    <th>Item Category</th>
                    <th>Item Subcategory</th>
                    <th>Item Quantity</th>
        </tr>
        <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['item_category'] . "</td>";
                    echo "<td>" . $row['item_subcategory'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "</tr>";
                }
                ?>
    </table>
    </diV>
    </div>


<br>
<br>

<!-- footer -->
<footer class="footer mt-auto py-3 bg-primary">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</body>
</html>
