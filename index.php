<?php include 'header.php'?>
<?php include 'config.php'?>

<!-- Page content -->
<div class="content">
<p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Post Jobs
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <form method="POST">
      <div class="mb-3">
        <label for="Company Name" class="form-label">Company Name</label>
        <input type="text" class="form-control" id="Company Name" name="cname">
      </div>
      <div class="mb-3">
        <label for="Position" class="form-label">Position</label>
        <input type="text" class="form-control" id="Position" name="position">
      </div>
      <div class="mb-3">
        <label for="Job Description" class="form-label">Job Description</label>
        <input type="text" class="form-control" id="Job Description" name="jobdesc">
      </div>
      <div class="mb-3">
        <label for="Job Description" class="form-label">Skills required</label>
        <input type="text" class="form-control" id="skills" name="skills">
      </div>
      <div class="mb-3">
        <label for="CTC" class="form-label">CTC</label>
        <input type="text" class="form-control" id="CTC" name="CTC">
      </div>
      <button type="submit" class="btn btn-primary" name="done">Done</button>
    </form>
  </div>
</div>
<table class="table">
  <tbody>
  <thead>
    <tr>
      <th scope="col">S No.</th>
      <th scope="col">Company Name</th>
      <th scope="col">Position</th>
      <th scope="col">CTC</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <?php
  $sql = "SELECT `cname`, `position`, `CTC` FROM `jobs`";
  $result=mysqli_query($conn,$sql);
  $i = 0;
  if ($result->num_rows>0) {
      while ($row = $result->fetch_assoc()) {
          echo "
          <tr>
          <td>".++$i."</td>
          <td>".$row['cname']."</td>
          <td>".$row['position']."</td>
          <td>".$row['CTC']."</td>
          <td>
          <form method='POST' action='career.php'>
          <button type='button'class='btn btn-secondary' name='apply'>Apply</button>
          </form>
          </td>
          </tr>";
  
      }
  }
  else {
      echo "No jobs found.";
  }
  ?>
  </tbody>
</table>
</div>
</div> 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>