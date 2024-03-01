<?php
include('layout/userheader.php');
?>
  <div class="col-15">
    <div class="container-fluid">
      <div class="row">
        <?php 
        include('layout/usersidebar.php');
        ?>
        <div class="col-9">
          <div class="card" style="width: 20rem">
            <div class="card-header d-flex justify-content-left">
              <h1>Welcome</h1>
            </div>
            <div class="card-body">
            <?php
           
             $conn= new mysqli("localhost","root","","travelcard");
             if($conn->connect_error)
                  {
                  die("Connection error");
                  }
                  $uid=$row['id'];
                  $sql="select * from register,card where register.id=card.user_id and register.id='$uid'";
                  $result=$conn->query($sql);
                $row=$result->fetch_assoc();{
                  echo "
                
                <tr>
              
                    <td><label><b>Name:</b></label>".$row['name']."</td></br>
                    <td><label><b>Address:</b></label>".$row['address']."</td></br>
                    <td><label><b>Card category:</b>".$row['card_category']."</td></br> 
                    <td><label><b>Issue date:</b>".$row['issue_date']."</td></br>
                    <td><label><b>Expiry date:</b>".$row['expiry_date']."</td></br>
                 
                </tr>
                
      

       
                ";
              }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
    include('layout/footer.php');
    ?>
<html>
  <body>
<script src="//cdnjs.cloudfare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
             
</body>
 </html>