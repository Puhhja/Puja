<?php
    $conn = new mysqli("localhost","root","","travelcard");
    if($conn->connect_errno!=0)
    {
        die("Connection failed".$conn->connect_errno);
    }
    $id=$_POST['id'];
    $sql="SELECT * FROM register WHERE id='$id' ";
    if($result= $conn->query($sql))
    {
        $data=array();
        while($row=$result->fetch_assoc())
        {
            array_push($data,$row);
        }
        echo json_encode($data);
    }
?>