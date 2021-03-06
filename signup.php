<?php
    if (isset($_SESSION['email'])) 
 {
     header('location: home.php'); 
 }
    
?>
<!DOCTYPE html>
<html>
    <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
     <link rel="stylesheet" href="css/cascade.css" type="text/css">

     <!--jQuery library--> 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

     <!--Latest compiled and minified JavaScript--> 
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Ct&#8377;l Budget</title>
 </head>
    <body>
        <?php
        include 'include/header.php';
        ?>
        <div class="container" style="position: relative">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel-group">
             <div class="panel panel-default">
                 <div class="panel-heading"><center><h3>Sign Up</h3></center></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body" >
                    <form class="form-horizontal" method="POST" action="signup_script.php">
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Name:</label>
                         <input type="text" class="form-control is-valid" placeholder="Name" id="validationServer01" required name="name">
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Email:</label>
                         <input type="email" class="form-control is-valid" placeholder="Enter Valid Email" id="validationServer01" required name="email">
                          <div><?php 
                        error_reporting(0); 
                        echo $_GET['email_error']; 
                        ?></div>
                       </div>
                     </div>
                    <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Password:</label>
                         <input type="password" class="form-control is-valid" placeholder="Password(Min. 6 Characters)" id="validationServer01" required name="password"><!-- comment -->
                         <div><?php 
                        error_reporting(0); 
                        echo $_GET['password_error']; 
                        ?></div>
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Phone No:</label>
                         <input type="tel" class="form-control is-valid" placeholder="Enter Valid Phone Number (Ex 9795433934)" id="validationServer01" required name="contact">
                       <div><?php 
                        error_reporting(0); 
                        echo $_GET['contact_error']; 
                        ?></div>
                       </div>
                     </div>
                        <button class="btn btn-primary" type="submit" style="width: 100%">Submit</button>
                   </form>
                </div>
            </div>
            </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            
        </div>
        <div style="margin-bottom: 20%"></div>
        <?php
        include 'include/footer.php';
        ?>
    </body>
</html>