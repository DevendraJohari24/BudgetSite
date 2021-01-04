<div class="panel-group">
             <div class="panel panel-default">
                 <div class="panel-heading"  style="background-color: green; color:white">
                     <div class="row">
                         <div class="col-md-10">
                             <h4 class="text-center"><?php echo $row_plan['title']; ?></h4>
                         </div>
                         <div class="col-md-2">
                             <p style="font-size:large; padding-top: 8px" class="text-right"><span class="glyphicon glyphicon-user" style=""></span> <?php echo $row_plan['no_of_people'];  ?></p>
                         </div>
                      </div>
            </div>
           </div>
            <div class="panel panel-default" style="width: 100%">
                <div class="panel-body" >
                    <table class="table"  style="margin-bottom: -1%">
                        <tbody>
                           <tr>
                            <td><b>Budget</b></td>
                            <!-- comment -->
                            <td class="text-right" style="">&#8377 <?php echo $row_plan['initial_budget'] ?></td>
                           </tr><!-- comment -->
                           <?php
                           
                            $user_knowing_query = "SELECT * FROM budget_expense u LEFT JOIN budget_persons up ON up.id = u.person_id WHERE up.plan_id='$plan_id' AND u.plan_id='$plan_id' AND u.user_id='$user_id' AND up.user_id='$user_id'";
                            $user_knowing_query_result = mysqli_query($con, $user_knowing_query) or die(mysqli_error($con));
                            $total_amount_spent=0;
                           while($row_person = mysqli_fetch_array($user_knowing_query_result)){
                            $total_amount_spent = $total_amount_spent + $row_person['amount'] ;
                            }
                           $remaining_amount = $row_plan['initial_budget'] - $total_amount_spent;
                           ?>
                           <tr>
                             <td><b>Remaining Amount</b></td>
                              <?php if($remaining_amount> 0){
                                echo "<td class='text-right'  style='color: green;'><b>&#8377 $remaining_amount</b></td>";
                                
                            } else if($remaining_amount<0){ 
                                echo "<td class='text-right' style='color: red;'><b>&#8377 ".abs($remaining_amount)."</b></td>"; 
                            }else{
                                echo "<td class='text-right' style=''><b>&#8377 $remaining_amount</b></td>"; 
                            }
                            ?>
                           </tr><!-- comment -->
                           <tr>
                             <td><b>Date</b></td>
                             <td class="text-right"><?php 
                             $date_from = $row_plan['from_date'] ;
                             $date1=date_create($date_from);
                             $date_to = $row_plan['to_date'] ;
                             $date2= date_create($date_to);
                             $date_format1 = date_format($date1,"dS M -");
                             $date_format2 = date_format($date2,"dS M-Y");
                             echo "$date_format1.$date_format2"; 
                             ?></td>
                           </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
            </div>