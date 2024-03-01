<?php
    
     $name=$_POST['name'];
     $address=$_POST['address'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $type=$_POST['type'];
    
     $uid=$_POST['id'];
                
     $conn=new mysqli("localhost","root","","travelcard");
    if($conn->connect_errno!=0)
     {
         die("Connection Error".$conn->connect_errno);
     }
     $sql="UPDATE register SET name='$name', address='$address', email='$email',password='$password', type='$type' WHERE id='$uid'";
     $result =$conn->query($sql);
     if ($result) {
         echo "User Updated Successfully";
     } else {
         die(mysqli_error($conn));
    }       
?>