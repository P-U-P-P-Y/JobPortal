<?php
require_once('config.php');
//include 'config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css?v=2">
    <title>Dashboard</title>
</head>
<body>
<div class="nav-bar">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #2a5d84;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Job Hunt</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="#">Home</a>
        <a class="nav-link active" href="#">Feed</a>
        <a class="nav-link active" href="#">Messages</a>
        <a class="nav-link active" href="#">Notifications</a>
      </div>
    </div>
  </div>
</nav>
</div>

<div class="sidebar">
  <a class="active" href="#jobs">Jobs</a>
  <a href="careers.php">Candidates Applied</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>

<!-- Page content -->
<div class="content">
    <div class="collapse-button">
    <p>

  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" 
  style="background-color: rgba(42,93,132,255); border-style: none; margin-left:-10px;">
   Post Vacancy
  </button>
</p>

<div class="collapse" id="collapseExample">
  <div class="card card-body">

  <form method="post" action="">
    
  <div class="mb-3">
    <label for="exampleInputCompany" class="form-label">Company/Organization Name</label>
    <input type="text" class="form-control" id="exampleInputCompany" aria-describedby="emailHelp" name="cname">
  </div>

  <div class="mb-3">
    <label for="exampleInputTitle" class="form-label">Job Title</label>
    <input type="text" class="form-control" id="exampleInputTitle" name="pos">
  </div>

  <div class="mb-3">
    <label for="exampleInputOpens" class="form-label">Openings</label>
    <input type="text" class="form-control" id="exampleInputOpens" name="opens">
  </div>

  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Job Description</label>
    <input type="text" class="form-control" id="exampleInputDescription" style="height:100px;" name="jdesc">
  </div>

  <div class="mb-3">
    <label for="exampleInputSkills" class="form-label">Skills Required</label>
    <input type="text" class="form-control" id="exampleInputSkills" name="skills">
  </div>

  <div class="mb-3">
    <label for="exampleInputCTC" class="form-label">CTC</label>
    <input type="text" class="form-control" id="exampleInputCTC" name="ctc">
  </div>

  <button type="submit" class="btn btn-primary" style="background-color: rgba(42,93,132,255); border-style: none; padding:4px 12px;" name="post">Post</button>

  </form>

  </div>
</div>
  </div>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Date Posted</th>
      <th scope="col">Company/Orgainization Name</th>
      <th scope="col">Position</th>
      <th scope="col">CTC</th>
      <th scope="col">Openings</th>
    </tr>
  </thead>
      <?php
        $sql="SELECT `day`, `cname`, `post`, `opens`,`ctc` FROM `posts`";
        $result=mysqli_query($conn,$sql);
        $i=0;
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
           echo"
           <tbody>
            <tr>
                <td>".$row['day']."</td>
                <td>".$row['cname']."</td>
                <td>".$row['post']."</td>
                <td>".$row['ctc']."</td>
                <td>".$row['opens']."</td>
            </tr>"; 
        }}
        else  
          echo"";
      ?>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>