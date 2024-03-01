<?php
    
     $uid=$_POST['id'];
                
     $conn=new mysqli("localhost","root","","travelcard");
    if($conn->connect_errno!=0)
     {
         die("Connection Error".$conn->connect_errno);
     }
     $sql="DELETE FROM register WHERE id='$uid'";
     $result =$conn->query($sql);
     if ($result) {
         echo "User Deleted Successfully";
     } else {
         die(mysqli_error($conn));
    }       
?>