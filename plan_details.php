<?php
    require 'include/common.php';
    if (!isset($_SESSION['email'])) 
 {
     header('location: login.php'); 
 }
    $num = $_POST['num'];
    $budget = $_POST['initialbudget'];
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
                <div class="panel-body" >
                    <form class="form-horizontal" method="POST" action="createnewplan_script.php">
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Title</label>
                         <input type="text" class="form-control is-valid" placeholder="Enter Title(Ex. Trip to Goa)" id="validationServer01" required name="title">
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="col-md-6">
                         <label for="validationServer01">From</label>
                         <input type="date" class="form-control is-valid" placeholder="dd/mm/yyyy" id="validationServer01" required name="from_date" max="<?php echo date("Y-m-d") ?>">
                       </div>
                       <div class="col-md-6">
                         <label for="validationServer01">To</label>
                         <input type="date" class="form-control is-valid" placeholder="dd/mm/yyyy" id="validationServer01" required name="to_date" min="<?php echo date("Y-m-d") ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="col-md-7">
                         <label for="validationServer01">Initial Budget</label>
                         <input type="number" class="form-control is-valid" placeholder="10000" id="validationServer01" required name="initial_budget" value="<?php echo $budget; ?>">
                       </div>
                       <div class="col-md-5">
                         <label for="validationServer01">No. of People</label>
                         <input type="number" min="2" max="10" class="form-control is-valid" placeholder="2" id="validationServer01" required name="no_of_people" value="<?php echo $num; ?>">
                       </div>
                     </div><!-- comment -->
                     <?php
                     $i=1;
                     while($i<=$num){
                         echo "<div class='form-group'>
                       <div class='col-md-12'>
                         <label for='validationServer01'>Person $i</label>
                         <input type='text' class='form-control is-valid' placeholder='Person $i Name' id='validationServer01' required name='person$i'>
                       </div>
                     </div>";
                         $i = $i+1;
                     }
                     
                    ?>
                        <button class="btn btn-primary" style="width: 100%; background-color: green; border: 1px green" type="submit">Submit</button>
                   </form>
                </div>
            </div>
            </div>
                 </div><!-- comment -->
                 <div class="col-md-4"></div><!-- comment -->
             
             </div>
            
            
        </div>
        <div style="margin-bottom: 15%"></div>
        <?php
        include 'include/footer.php';
        ?>
        
    </body>
</html>