<?php
 require 'include/common.php';
 if (!isset($_SESSION['email'])) 
 {
     header('location: login.php'); 
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
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <div class="panel-group">
             <div class="panel panel-default">
                 <div class="panel-heading"><center><h3>Change Password</h3></center></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body" >
                    <form class="form-horizontal" method="POST" action="change_password_script.php">
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Old Password</label>
                         <input type="password" class="form-control is-valid" placeholder="Old Password" id="validationServer01" required name="real_password">
                       <div><?php 
                        error_reporting(0); 
                        echo $_GET['real_password_error']; 
                        ?></div>
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">New Password</label>
                         <input type="password" class="form-control is-valid" placeholder="New Password(Min. 6 characters)" id="validationServer01" required name="newpassword">
                       <div><?php 
                        error_reporting(0); 
                        echo $_GET['password_error']; 
                        ?></div>
                       </div>
                     </div>
                    <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Confirm New Password</label>
                         <input type="password" class="form-control is-valid" placeholder="Re-type New Password" id="validationServer01" required name="retypepassword"><!-- comment -->
                       <div><?php 
                        error_reporting(0); 
                        echo $_GET['newpassword_error']; 
                        ?></div>
                       </div>
                     </div>
                        <button class="btn btn-primary" style="width: 100%; background-color: green" type="submit">Submit</button>
                   </form>
                </div>
            </div>
            </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            
            
        </div>
        <div style="margin-bottom: 20%"></div>
        <?php
        include 'include/footer.php';
        ?>
    </body>
</html>