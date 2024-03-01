<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"href="css/bootstrap.css">
</head>
<body>
<?php
include("header.php");
?>

<div class="gb-breadcrumb gb-bg white-color p-3"style="background-color:rgb(20, 35, 39)">
			<div class="container">
				<div class="breadcrumb-info text-center">
					<div class="page-title">
						<h1>
							<span class="before-top"></span>
							<span>Leave a reply</span>
							<span class="before-bottom"></span>
						</h1>
					</div>
					
				</div>
			</div>
		</div>		
		
		<div class="gb-contact-form gb-section p-2">
			<div class="container"style="background-color:rgb(20, 35, 39)">
				<form action="" enctype="multipart/form-data" class="gb-form"  method="post">
					<div class="row"> 
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" class="form-control" required="required" placeholder="Your Name" name="name">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="email" class="form-control" required="required" placeholder="Your Email" name="email">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" class="form-control" required="required" placeholder="Subject" name="subject">
							</div> 
						</div>  
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="message" class="form-control" required="required" rows="7" placeholder="Comment" name="message"></textarea>
							</div>             
						</div> 					  
					</div>
				 <button type="submit" class="btn btn-dark" name="submit"><span>Send Message</span></button>
				</form>					
			</div>


           
            <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
