<?php

$Card_Category=$_POST['Card_Category'];
$Issue_Date=$_POST['Issue_Date'];
$Expiry_Date=$_POST['Expiry_Date'];
$Amount_Deposited=$_POST['Amount_Deposited'];
$Amount_Available=$_POST['Amount_Available'];




$conn=new mysqli("localhost","root","","travelcard");
if($conn->connect_error)
{
    die("Connection Error");
}
$sql="insert into card(card_category,issue_date,expiry_date,amount_deposited,amount_available)
values('$Card_Category','$Issue_Date','$Expiry_Date','$Amount_Deposited','$Amount_Available')";
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