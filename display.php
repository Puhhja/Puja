<?php
include('layout/header.php');
?>
<div class="col-15">
    <div class="container-fluid">
        <div class="row">
            <?php 
            include('layout/sidebar.php');
              ?>
<div class="card" style="width: 20rem">
  <div class="card-header">
  <h5 class="Sahayatri">Sahayatri</h5>
  
  </div>
  <div class="card-body">
    <?php
  $conn= new mysqli("localhost","root","","travelcard");
  if($conn->connect_error)
                  {
                  die("Connection error");
                  }
                  $uid=$_GET['uid'];
                  $sql="select * from register,card where register.id=card.user_id and card.id='$uid'";
                  $result=$conn->query($sql);
                $row=$result->fetch_assoc();
                
                  echo "
                  <b>Name</b> :".$row['name']."<br>
                  <b>Address</b> : ".$row['address']."<br>
                  <b>Card Category</b> : ".$row['card_category']."<br>
                  <b>Issue date</b> :".$row['issue_date']."<br>
                  <b>Expiry date</b> :".$row['expiry_date']."<br>
                  ";
                  ?>
                
</form>
</div>
</div>
</div>
</div>
</div>
<?php 
    include('layout/footer.php');
?>

      

    	