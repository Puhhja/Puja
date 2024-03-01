<?php
include('layout/userheader.php');
?>
<div class="container-fluid">
    <div class="row">
    <?php 
    include('layout/usersidebar.php');
    ?>
    <div class="col-9">
        <h1>Balance details</h1>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                         <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Deposited Amount</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $conn= new mysqli("localhost","root","","travelcard");
                      if($conn->connect_error)
                      {
                        die("Connection error");
                        }
                        $uid=$row['id'];
                        $sql="select * from register,balance where register.id=balance.user_id and register.id='$uid'";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc())
                        {
                           echo "
                           <tr>
              <td>".$row['id']."</td>
                  <td>".$row['name']."</td>
                  <td>".$row['address']."</td>
                  <td>".$row['email']."</td>
                  <td>".$row['amount_deposited']."</td> 
                  <td>".$row['amount_available']."</td>
                  
                
              </tr>
              
                           ";
                        }
                         
                    ?>
                    </tbody>
                </tabel>
            </div>
        </div>
    </div>
</div>
</div>

<script src="//cdnjs.cloudfare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>