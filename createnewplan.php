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
         <div class="container" style=" position: relative">
             <div class="row">
                 <div class="col-md-4">
                 </div>
                 <div class="col-md-4">
                     <div class="panel-group">
             <div class="panel panel-default" style="background-color: green">
                 <div class="panel-heading"><center><h3>Create New Plan</h3></center></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body" >
                    <form class="form-horizontal" method="POST" action="plan_details.php">
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Initial Budget:</label>
                         <input type="number" class="form-control is-valid" placeholder="Initial Budget(Ex. 4000)" id="validationServer01" required name="initialbudget">
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">How many peoples you want to add in your group?:</label>
                         <input type="number" class="form-control is-valid" placeholder="No. of people" id="validationServer01" required name="num">
                       </div>
                     </div>
                        <button class="btn btn-primary" style="width: 100%; background-color: green; border: 1px green" type="submit">Next</button>
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