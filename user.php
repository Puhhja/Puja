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
          <h1>User details</h1>
            <div class="card">
              <div class="card-header d-flex justify-content-end">
                <input class="btn btn-primary" id="new" type="submit" name="New user" value="New user">
              </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                <th scope="col">SN</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
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
                  $sql="SELECT * from register";
                  $result=$conn->query($sql);
                while($row=$result->fetch_assoc())
              {
                echo "
                <tr>
                
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['address']."</td>
                    <td>".$row['email']."</td> 
                    <td>".$row['type']."</td>
                  <td>
                  <input type='submit' id='".$row['id']."' class='generate btn btn-success btn-sm' value='Generate' />
                  <input type='submit' id='".$row['id']."' class='edit btn btn-info btn-sm' value='Edit' />                      
                  <input type='submit' id='".$row['id']."' class='delete btn btn-danger btn-sm' value='Delete' />  
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
<html>
  <body>
<script src="//cdnjs.cloudfare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script>

      $(document).ready(function(){
          $('#new').click(function(){ 
            $('#mdlNew').modal('show');
          });
            $('#einsert').click(function(){
              var name=$('#name').val();
              var add=$('#add').val();
              var email=$('#email').val();
              var password=$('#password').val();
              var type=$('#type').val();
               $.ajax({
                  type:'POST',
                  url:'phpfiles/uinsert.php',
                  data:{name:name,add:add,email:email,password:password,type:type},
                  success:function(data){
                  alert(data);
                 location.reload();
                  }
                });
            });
          
            $(".edit").click(function(){
              var id=this.id;
              $("#mdlEdit").modal('show');
              $.ajax({
                url: "phpfiles/uedit.php", 
                method:'POST',
                data:{id:id},
                success: function(data){
                  var jData=JSON.parse(data);
                  $('#upt_name').val(jData[0].name);
                  $('#upt_add').val(jData[0].address);
                  $('#upt_email').val(jData[0].email);
                  $('#upt_password').val(jData[0].password);
                  $('#upt_type').val(jData[0].type);
               
                  $('#hidden_id').val(id);
                  $("#mdlEdit").modal('show');
                }
              });
            });

           $('#userUpdate').click(function(e){
                e.preventDefault();
                
                var name=$('#upt_name').val();
                var address=$('#upt_add').val();
                var email=$('#upt_email').val();
                var password=$('#upt_password').val();
                var type=$('#upt_type').val();
               
                var id = $('#hidden_id').val();  
                $.ajax({
                    url: "phpFiles/updateuser.php", 
                    type:'POST',
                    data:{id:id,name:name,address:address,email:email,password:password,type:type},
                    success: function(result){
                        alert(result);
                        location.reload();
                    }
                  });
            }); 
            
            $('.delete').click(function(){
              var id=this.id;
                $('#hidden_id').val(id);
                $("#deletemdl").modal("show");
            });

            $('#Delete').click(function(e){
                e.preventDefault();
                
                var id=$('#hidden_id').val();
                    
                $.ajax({
                    url: "phpfiles/delete.php", 
                    type:'POST',
                    data:{id:id},
                    success: function(result){
                        alert(result);
                        
                        location.reload();
                    }
                    });
                    

            });
            
            $('.generate').click(function(){
              
              var today = new Date();
              var id= this.id;
              $('#hidden_id').val(id);
            $('#issue_date').val(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate());
              $('#expiry_date').val(2+today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate());
              $('#mdlgenerate').modal('show');
            });
            $('#insert').click(function(){
              
              var card_category=$('#card_category').val();
              var issue_date=$('#issue_date').val();
              var expiry_date=$('#expiry_date').val();
              var user_id=$('#hidden_id').val();
              
              $.ajax({
                  type:'POST',
                  url:'card/generate.php',
                  data:{user_id:user_id,card_category:card_category,issue_date:issue_date,expiry_date:expiry_date},
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
<!--  Code for Inserting user Details   -->
<div class="modal fade" id="mdlNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Entry Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" required/>
        </div>
        <div class="mb-3">
          <label for="add" class="form-label">Address</label>
          <input type="text" class="form-control" id="add" required/>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email"required/>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>

          
          <input type="password" class="form-control"id="password"required/>
        </div>
       
     <div class="mb-3">
          <label for="type" class="form-label">Type</label>
          <select id="type" class="form-select" >
            <option>Student</option>
            <option>Normal</option>
            <option>Elderly(60+)</option>
          </select>
        </div>
       
        
    
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="einsert">Insert</button>
      </div>
    </div>
  </div>
</div>

<!--editing details-->
  <div class="modal fade" id="mdlEdit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit This Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="upt_name">
          </div>
          <div class="mb-3">
            <label for="add" class="form-label">Address</label>
            <input type="text" class="form-control" id="upt_add">
          </div>
          <div class="mb-3">
            <label for="eadd" class="form-label">Email</label>
            <input type="text" class="form-control" id="upt_email">
    </div>
    <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="upt_password">
    </div>
      <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select id="upt_type" class="form-select">
              <option>Student</option>
              <option>Normal</option>
              <option>Elderly(60+)</option>
            </select>
            
          </div>
        </div>
        <div class="modal-footer">
        <input type="hidden" name="hidden_id" id="hidden_id">
          <input type="submit" class="update_user btn btn-secondary" id="userUpdate" data-bs-dismiss="modal" value="Update" />
        </div>
      </div>
    </div>
  </div>
  
 
    <!-- Modal for Deleting user Starts-->
    <div class="modal fade" tabindex="-1" id="deletemdl">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body ">
                    <form  method="post">  
                    <p>Do you really want to delete these records? This process cannot be undone.</p>      
                   
                    
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <button type="submit" class="btn btn-secondary btn-sm" id="cancel">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm" id="Delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>   


    <!-- Model for generation Travel Card-->
<div class="modal fade" id="mdlgenerate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Entry Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
       
        
      <div class="mb-3">
          <label for="type" class="form-label">Card_category</label>
          <select id="card_category" class="form-select">
            <option>Student</option>
            <option>Normal</option>
            <option>Elderly(60+)</option>
          </select>
        </div>
       <div class="mb-3">
          <label for="issue_date" class="form-label">Issue Date</label>
          <input type="text" class="form-control" id="issue_date">
        </div>
        <div class="mb-3">
          <label for="expiry_date" class="form-label">Expiry Date</label>
          <input type="text" class="form-control" id="expiry_date">
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
