<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css" />
    <title>Invoice Report</title>
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

<!-- Invoice Report -->
    <div class="container mt-5 d-flex justify-content-center">
        <div class="bg-primary rounded p-3 col-md-6"> <!-- Decreased the container width to 6 columns -->
            <h2 class="text-center mb-4 text-light">Invoice Report</h2> <!-- Set text color to white -->
            <div class="row justify-content-center"> <!-- Center the form horizontally -->
                <div class="col-md-8"> <!-- Set the container width for medium-sized devices -->
                    <form action="generate_invoice_report.php" method="post">
                        <div class="row">
                            <div class="col-md-8 mb-2"> <!-- Set the input width for medium-sized devices -->
                                <label for="start_date" class="mr-2 text-light">Start Date:</label> <!-- Set label text color to white -->
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-light w-100" style="margin-top:25px;" name="search">Search</button> <!-- Set button color to light (white) -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<br>

<!-- invoice item report -->
       <div class="container mt-5 d-flex justify-content-center">
        <div class="bg-primary rounded p-3 col-md-6"> <!-- Decreased the container width to 6 columns -->
            <h2 class="text-center mb-4 text-light">Invoice Item Report</h2> <!-- Set text color to white -->
            <div class="row justify-content-center"> <!-- Center the form horizontally -->
                <div class="col-md-8"> <!-- Set the container width for medium-sized devices -->
                    <form action="invoice_item_report.php" method="post">
                        <div class="row">
                            <div class="col-md-8 mb-2"> <!-- Set the input width for medium-sized devices -->
                                <label for="start_date" class="mr-2 text-light">Start Date:</label> <!-- Set label text color to white -->
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-light w-100" style="margin-top:25px;" name="search">Search</button> <!-- Set button color to light (white) -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <br>
<!-- Item Report -->
        <div class="container mt-5 d-flex justify-content-center">
        <div class="bg-primary rounded p-3 col-md-6"> <!-- Decreased the container width to 6 columns -->
            <h2 class="text-center mb-4 text-light">Item Report</h2> <!-- Set text color to white -->
            <div class="row justify-content-center"> <!-- Center the form horizontally -->
                <div class="col-md-8"> <!-- Set the container width for medium-sized devices -->
                    <form action="item_report.php" method="post">
                        <div class="row">

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-light w-100" style="margin:auto;margin-left:140px;" name="search">View Report</button> <!-- Set button color to light (white) -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
