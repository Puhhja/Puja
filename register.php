<?php
if(isset($_POST["register"]))
{
  $name=$_POST['name'];
  $address=$_POST['address'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $type=$_POST['type'];

  $hashedPassword= password_hash($password, PASSWORD_DEFAULT);
 $conn= new mysqli("localhost","root","","travelcard");
  if($conn->connect_errno)
  {
    die("Connection Error:" .  $conn->connect_error);
  }
  $check="SELECT * FROM register WHERE email='".$email."'";
  $result=$conn-> query($check);
  if($result->num_rows> 0)
  {
    echo '<script>alert("username already exist")</script>';
  }
  else {
  $stmt = $conn->prepare("INSERT INTO register(name,address,email,password,type) 
  VALUES(?,?,?,?,?)");

  if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
  }

  $stmt->bind_param("sssss",$name,$address,$email,$password,$type);

  if($stmt->execute())
  {
    echo '<script>alert("registration successful")</script>';
    header("Location:login.php");
  }
  else{
      echo "Error:" . $conn->error;
  }
$stmt->close();
}
$conn->close();
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
                              <h4 class="text-uppercase text-center mb-2">sign up</h4>
         <form method="POST" action="register.php"autocomplete="off">
                                <fieldset class="form-group border p-3 border">
                                  <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Full Name</label>
                                    <input type="text" name="name" pattern="^[A-Za-z\s]+$" class="form-control form-control-lg" required/> 
                                  </div>
                                  <div class="form-outline mb-4">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" name="address" pattern="^[a-zA-Z0-9\s]*$" class="form-control form-control-lg" required/> 
                                  </div>

                                  <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email Address</label>
                                    <input type="text" pattern=".+@gmail\.com" title="Enter valid email" name="email"  class="form-control form-control-lg" required/> 
                                  </div>
                                  <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required /> 
                                  </div>
                                  
                                  
          <div class="form-outline mb-4">
          <label for="type" class="form-label">Type</label>
          <select name="type" class="form-select" >
            <option>Student</option>
            <option>Normal</option>
            <option>Elderly(60+)</option>

          </select>
        </div>
                                      
                                  <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1"required/>
                                    <label class="form-check-label" for="exampleCheck1">
                                      I do accept the <a href="tc.php" class="text-black"><u>Terms of services</u></a>
                                    </label><br><br>
                                    <div class="d-flex justify-content-center">
                                      <input type="submit" value="Submit" name="register"/><br><br>
                                    </div>
                                    <p class="text-center text-muted mt-5 mb-0">Already have an account? 
                                      <a href="login.php" class="fw-bold text-body">Login here</a>
                                    </p>
                                  </div>


                                  
                                </fieldset>
                              </form>
                        </div>
                      </div>
                  </div>
                </div>
               </div>
                </div>
              </section>

  <footer>
  <ul class="list-unstyled list-inline text-center py-2">
    <li class="list-inline-item">
      <img src="img/2.png" width="75" height="auto">
      <h6 class="mb-1">Smart Travel</h6>
    </li>
    <li>
    <div class="footer-copyright text-center py-3">© 2023 Copyright:
    <a href="index.php"> Sahayatri.com</a>
    </li>
  </ul>
</footer>








<script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>