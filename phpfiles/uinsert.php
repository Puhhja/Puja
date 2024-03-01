<?php
$name=$_POST['name'];
$address=$_POST['add'];
$email=$_POST['email'];
$password=$_POST['password'];
$type=$_POST['type'];

$conn=new mysqli("localhost","root","","travelcard");
if($conn->connect_error)
{
    die("Connection Error");
}
$sql="INSERT into register(name,address,email,password,type)
values('$name','$address','$email','$password','$type')";
$result=$conn->query($sql);
if($result)
{
    echo "Success";
}
else
{
    echo "Error";
}

?>