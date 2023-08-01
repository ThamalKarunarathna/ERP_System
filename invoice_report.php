<?php
//get database connection
include('connect.php');

//search data from table
if (isset($_POST['search'])) {
    $start_date = $_POST['start_date'];
 
//select data from table
    $sql = "SELECT * FROM invoice WHERE  date = '$start_date'";
    $result = mysqli_query($con, $sql);

    
?>
<!DOCTYPE html>
<html>
<head>
       <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css" />
    <title>Invoice Report</title>
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
<br>
<br>
    
<!-- Report Tbale -->
    <div class="row pb-2" style="margin-left:240px;">
		<h2 class="text-primary">Invoice Report</h2>
		<hr />
	</div>
    <div class="d-flex justify-content-center">
    <diV  class="table-responsive">
    <table border="1" class="table table-hover" style="width: 1000px">
        <tr>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Item Count</th>
            <th>Invoice Amount</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['invoice_no']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['customer']."</td>";
            echo "<td>".$row['item_count']."</td>";
            echo "<td>".$row['amount']."</td>";
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
<?php
} else {
    echo "Please select a date range.";
}