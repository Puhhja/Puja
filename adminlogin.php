<?php
session_start();
if(isset($_POST["login"]))
{
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];
  
  $conn= new mysqli("localhost","root","","travelcard");
  if($conn->connect_error!=0)
  {
    die("Connection error");
  }
  $sql="SELECT * FROM admin WHERE email='$email' AND password='$pwd'";
  $result=$conn->query($sql);
  if($result->num_rows>0)
  {
   session_start(); 
    $row=$result->fetch_assoc();
    session_start();
    $_SESSION['user']=$row;
      header("Location:dashboard.php");
    }
  else
  {
    echo "Login error";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet"href="css/bootstrap.css">
</head>
<body>
<?php
include("header.php");
?>
<section class="vh-100 bg-image" style="background-color:#343148FF">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Sign In</h2>

              <form method="post" action="adminlogin.php">

               
                <div class="form-outline mb-4">
                <label class="form-label" for="email">Email Address</label>
                  <input type="email" name="email" id="email" class="form-control form-control-lg" /> 
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="pwd">Password</label>
                  <input type="password" name="pwd" id="pwd" class="form-control form-control-lg" />
                </div>
        
                 

                <div class="d-flex justify-content-center">
                  <input type="submit" name="login" class="btn btn-info btn-lg gradient-custom-4 text-body" 
  value="Login" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    </body>

</html>