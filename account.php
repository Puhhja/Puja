<?php
include('layout/header.php');
?>
<div class="container-fluid">
  <div class="row">
     <?php 
        include('layout/sidebar.php');
        ?>
        <div class="col-9">
        <h1>Account details</h1>
        <div class="card">
       
            <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    
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
                  $sql="select * from register";
                  $result=$conn->query($sql);
                while($row=$result->fetch_assoc())
                    {
                        echo "
                        <tr>
                
                            <td>".$row['id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['address']."</td>
                            <td>".$row['email']."</td>
                           
                            
                            <td>
                            <input type='submit' id='".$row['id']."' class='add btn btn-success btn-sm' value='Add account' />
                        </td>
                     ";
                     }
                    ?>
    
            </tbody>
            </table>
        </div>
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
    <script>
        $(document).ready(function(){
          $('.add').click(function(){
            var id= this.id;
            $('#hidden_id').val(id);
            $('#mdladd').modal('show');
          });
          $('#insert').click(function(){
            var amount_deposited=$('#amount_deposited').val();
              var user_id=$('#hidden_id').val();
              $.ajax({
                  type:'POST',
                  url:'addaccount.php',
                  data:{user_id:user_id,amount_deposited:amount_deposited},
                  success:function(data){
                  alert(data);
                 location.reload();
                  }
                });
          });
          });
</script>
</body>
</html>
<div class="modal fade" id="mdladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Amount Entry Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="mb-3">
          <label for="amount_deposited" class="form-label">Amount Deposited</label>
          <input type="number" class="form-control" id="amount_deposited">
        </div>
      </div>

      <div class="modal-footer">
            <input type="hidden" name="hidden_id" id="hidden_id">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="insert">Insert</button>
      </div>
    </div>
  </div>
</div>
