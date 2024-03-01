<nav class="navbar shadow navbar-expand-lg navbar-light" style="background-color:#c89b93;">
  <div class="container-fluid ">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo.png" width="200" height="auto">
      
    </a>
      <nav class="navbar shadow navbar-expand-lg navbar-light" >
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <a class="btn btn-default" href="index.php" role="button">Home</button></a>
<button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#exampleModal">
 About Us
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sahayatri-A travel card generator system</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><h3 style="text-align: center">We are <b>Sahayatri</b><h3>
        <h5 style="text-align: center">Helping you in your smart journey<br></h5>
        <h5 style="text:align:center">At Sahayatri,we believe in smart travelling.We are here to help you generate travel card for you 
        inorder to make your travelling easy and fun.Our main purpose is to overcome the problems we that have
        been  faced during our journey<h5></p>
      </div>
      <div class="modal-footer">
      <a class="btn btn-secondary" href="register.php" role="button">Register</button></a>
      <a class="btn btn-primary" href="login.php" role="button">Login</button></a>
      </div>
    </div>
  </div>
</div>

  <a class="btn btn-default" href="contact.php" role="button">Support</button></a>
  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Account
    </button>
    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <li><a class="dropdown-item" href="register.php">Register</a></li>
      <li><a class="dropdown-item" href="login.php">Login</a></li>
    </ul>
  </div>
</div>


  </div>
  

</nav>
<script>
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
</script>


  
    

