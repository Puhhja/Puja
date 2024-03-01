<?php
$amount_deposited=$_POST['amount_deposited'];
$uid=$_POST['user_id'];
$conn=new mysqli("localhost","root","","travelcard");
if($conn->connect_error)
{
    die("Connection Error");
}



$sql="Select * from balance where user_id='$uid'";
$result=$conn->query($sql);


if($result->num_rows>0)
{
    $row=$result->fetch_assoc();
    $b=$row['amount_available'];
    $b=$b+$amount_deposited;

    $sql="update balance set amount_deposited='$amount_deposited',amount_available='$b' where user_id='$uid'";
    $result=$conn->query($sql);
    if($result)
    {
        echo "Success";
    }
    else
    {
        echo "Error";
    }

}
else
{
    $sql="insert into balance(user_id,amount_deposited,amount_available)
    values('$uid','$amount_deposited','$amount_deposited')";
    $result=$conn->query($sql);
    if($result)
    {
        echo "Success";
    }
    else
    {
        echo "Error";
    }

}

?>