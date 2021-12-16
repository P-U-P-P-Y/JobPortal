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
    <link rel="stylesheet" href="index.css">
    <title>Candidates Applied</title>
</head>
<body>
<div class="nav-bar">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #2a5d84;">
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

<div class="sidebar" style="background-color: rgba(248,249,250,255);">
  <a  href="index.php">Jobs</a>
  <a class="active" href="#Careers">Candidates Applied</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>

<!-- Page content -->
<div class="content">
   
  <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Date Applied</th>
      <th scope="col">Name</th>
      <th scope="col">Qualification</th>
      <th scope="col">Experience</th>
      <th scope="col">Batch</th>
      <th scope="col">Resume</th>
    </tr>
  </thead>
                   
    <?php
    $sql=" SELECT aday,aname,aqual,aexp,ayear FROM applicants ";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
      while($rows=$result->fetch_assoc()){
        echo'
        <tr>
        <th scope="row">'.$rows['aday'].'</th>
        <td >'.$rows['aname'].'</td>
        <td>'.$rows['aqual'].'</td>
        <td>'.$rows['aexp'].'</td>
        <td style="padding-left:12px;">'.$rows['ayear'].'</td>
        <td style="padding-left:30px;"><a href=""><i class="fa fa-download" aria-hidden="true"></i></a></td>
        </tr>';
           }
    }
    else{
      echo"";
    }
    
   ?> 
  </tbody>
  </table>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
