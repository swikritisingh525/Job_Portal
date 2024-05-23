<?php include 'config.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .navbar{
    overflow: hidden;
    background-color: #333;
    position:fixed;
    top:0;
    width:100%;
  }
  .h1{
    font-size: 60px;
    color: #fff;
    text-align: center;
  }
  .img{
    width:50px;
    height:50px;
    border-radius: 50%;
    border: 1px solid #fff;
    margin: 0 auto;
  }
  .jobs{
    width: 100%;
  height: 100%;
  padding: 50px;
    margin-left: 1%;
    margin-right: 1%;
    margin-top: 2%;
    box-shadow: 1px 1px 16px black;

  }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Career</title>
</head>
<body>
    <di class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed">
  <div class="container-fluid">
    <h1 class="navbar-brand" href="#">JOB PORTAL</h1>
  </div>
</nav>
<div>
    <img src="image123.jpg" alt="" class="img-fluid" width="100%"> 
</div>
<div class="row">
  <?php
  $sql = "SELECT `cname`, `position`, `jobdesc`, `skills`, `CTC` FROM `jobs`";
  $result = mysqli_query($conn,$sql);
  if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
      echo "
      <div class='col-md-4'>
    <div class='jobs'>
      <h3 style = 'text-align: center;'>".$rows['position']."</h3><br>
      <h4 style = 'text-align: center;'>".$rows['cname']."</h4><br>
      <p style = 'text-align: justify; color: black;'>".$rows['jobdesc']."</p><br>
      <h3 style = 'color: black;'><b>Skills Required:</b>".$rows['skills']."</h3><br>
      <p style = 'color: black'><b>CTC:</b>".$rows['CTC']."</p><br>
      <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@getbootstrap'>Apply Now</button>
      </div>
  </div>";
    }
  }
  ?>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply For Jobs</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Applying For:</label>
            <input type = "text" name="apply" class = "form-control">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Qualification:</label>
            <input type="text" class="form-control" name="qual">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Year Passout:</label>
            <input type="text" class="form-control" name="year">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="apply"  class="btn btn-primary">Apply</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>