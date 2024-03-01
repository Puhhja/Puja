<?php
session_start();
if(!isset($_SESSION['user']))
{
 header("Location:login.php") ;
}
if(isset($_POST['Logout']))
{
  session_destroy();
 header("Location:login.php") ;
}
$row=$_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>
<body>
    <!---nav bar start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid shadow p-3 mb-3 bg-body rounded">
    <a class="navbar-brand" href="#"style="font-family:Monotype Corsiva">Sahayatri</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!---Horizontal menu start-->
    <div class="collapse navbar-collapse border d-flex justify-content-end" id="navbarSupportedContent">
   
  
  <?php echo $row['name'];?>
  <div class="p-2 bd-highlight">
    <form action="dashboard.php" method="post">
      <input class="btn btn-primary" type="submit" name="Logout" value="Logout">
    </form>
  </div>

       
    </div>
  </div>
</nav>
    <!--nav bar end-->
    