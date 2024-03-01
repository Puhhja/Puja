<?php
include('layout/header.php');
?>
    <!--Content Container start--->
<div class="container-fluid">
  <div class="row">
    <?php 
    include('layout/sidebar.php');
    ?>

    <div class="col-9">
      <h1>Card details</h1>
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          
        </div>

        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Card Category</th>
                <th scope="col">Issue date</th>
                <th scope="col">Expiry date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

          <tbody>
          <?php
                  $conn= new mysqli("localhost","root","","travelcard");
                  if($conn->connect_error)
                  {
                  die("Connection error");
                  }
                  $sql="select * from register,card where register.id=card.user_id";
                  $result=$conn->query($sql);
                 
                while($row=$result->fetch_assoc())
                {
                  echo "
                
                <tr>
                <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['address']."</td>
                    <td>".$row['card_category']."</td> 
                    <td>".$row['issue_date']."</td>
                    <td>".$row['expiry_date']."</td>
                  <td>
                  <a href='display.php?uid=".$row['id']."' class='btn btn-info'>View</a>
                   </td>
                </tr>
                
      

       
                ";
              }
            ?>

    	
            
    
          </tbody>
        </table>
    </div>
  </div>
</div>
</div>
<!--Content Container end--->
<?php 
    include('layout/footer.php');
    ?>

<script src="//cdnjs.cloudfare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

   