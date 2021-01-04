<?php
       $user_id = $_SESSION['user_id'];
       if (!isset($_SESSION['email'])) 
 {
     header('location: login.php'); 
 }
   
?>
<div class="panel-group" >
             <div class="panel panel-default">
                 <div class="panel-heading" style="background-color: green; color: white"><center><h4>Add New Expense</h4></center></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body" >
                    <form class="form-horizontal" method="POST" action="expensedistribution_script.php" enctype="multipart/form-data"> 
                     
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Title</label>
                         <input type="text" class="form-control is-valid" placeholder="Expense Name" id="validationServer01" required name="title">
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Date</label>
                         <input type="date" class="form-control is-valid" placeholder="dd-mm-yyyy" id="validationServer01" required name="date_of">
                       </div>
                     </div>
                    <div class="form-group">
                       <div class="col-md-12">
                         <label for="validationServer01">Amount Spent</label>
                         <input type="number" class="form-control is-valid" placeholder="Amount" id="validationServer01" required name="amount"><!-- comment -->
                       </div>
                     </div>
                    <div class="form-group">
                       <div class="col-md-12">
                           <div class="input-group" style="width:100%">
                               <select class="custom-select form-control" id="inputGroupSelect04" name="person_name" required>
                              <option selected >Choose...</option>
                              <?php 
                              
                              $expense_query = "SELECT person_name FROM budget_persons WHERE user_id='$user_id' AND plan_id='$plan_id'";
                              $expense_query_result = mysqli_query($con, $expense_query) or die(mysqli_error($con));
                              
                              $i=1;
                              while($row_expense = mysqli_fetch_array($expense_query_result)){  ?>
                              <option value="<?php echo $row_expense['person_name']; ?>"><?php echo $row_expense['person_name'] ?></option>
                              <?php
                              $i = $i+1;
                              }
                              ?>
                            </select>
                          </div>
                       </div>
                    </div><!-- comment -->
                    <div class="form-group">
                       <div class="col-md-12">
                           <label for="validationServer01">Upload Bill</label><!-- comment -->
                           <div class="custom-file form-control">
                                 <input type="file" name="fileToUpload" id="fileToUpload">
                          </div>
                       </div>
                     </div>
                        <button class="btn btn-primary" style="width: 100%; background-color: green" type="submit">Add</button>
                   </form>
                </div>
            </div>
            </div>
