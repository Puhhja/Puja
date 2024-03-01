<?php

$card_category=$_POST['card_category'];
$issue_date=$_POST['issue_date'];
$expiry_date=$_POST['expiry_date'];
$uid=$_POST['user_id'];
$conn=new mysqli("localhost","root","","travelcard");
if($conn->connect_error)
{
    die("Connection Error");
}
$sql="insert into card(user_id,card_category,issue_date,expiry_date)
values('$uid','$card_category','$issue_date','$expiry_date')";
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