<?php
 require 'include/common.php';
  if (!isset($_SESSION['email'])) 
 {
     header('location: login.php'); 
 }
?>

<?php
        $user_id = $_SESSION['user_id'];
        $plan_id = $_GET['id'];
       $plan_query = "SELECT * FROM budget_plans WHERE user_id='$user_id' AND id='$plan_id'";
       $plan_query_result = mysqli_query($con, $plan_query) or die(mysqli_error($con));
       $total_rows_fetched = mysqli_num_rows($plan_query_result);
       $_SESSION['plan_id'] = $plan_id; 
       

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
        <div class="container" style="position: relative;">
          <?php 
          $row_plan = mysqli_fetch_array($plan_query_result);
          
          ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                                include 'showplans.php';
                        ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php 
                                $expense_find_query = "SELECT * FROM budget_expense up INNER JOIN budget_persons u ON u.id = up.person_id WHERE up.user_id='$user_id' AND up.plan_id='$plan_id'";
                                $expense_find_query_result = mysqli_query($con, $expense_find_query) or die(mysqli_error($con));
                                while($row_expense_show = mysqli_fetch_array($expense_find_query_result)){
                        
                        ?>
                        <div class="col-md-5">
                            <?php
                               include 'showexpenses.php';
                            ?>
                        </div>
                                <?php } ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" row">
                        <div class="col-md-12">
                            <?php
                             include 'showexpensedistribution.php';
                         ?>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-md-12">
                           <?php
                                    include 'addexpense.php';
                                    
                              ?>
                        </div>
                    </div>
                    
                </div>
            </div>
     
        </div>
        <?php
        include 'include/footer.php';
        ?>
    </body>
</html>