
<div class="panel-group">
             <div class="panel panel-default">
                 <div class="panel-heading"  style="background-color: green; color:white">
                     <div class="row">
                         <div class="col-md-12">
                             <h4 class="text-center"><?php echo $row_expense_show['expense_title']; ?></h4>
                         </div>
                         
                      </div>
            </div>
           </div>
            <div class="panel panel-default" style="width: 100%; margin-bottom: -4%;">
                <div class="panel-body" >
                    <table class="table" style="margin-bottom: 0%">
                        <tbody>
                           <tr>
                            <td><b>Amount</b></td>
                            <!-- comment -->
                            <td class="text-right" style="">&#8377 <?php echo $row_expense_show['amount'] ?></td>
                           </tr><!-- comment -->
                           <tr>
                             <td><b>Paid By</b></td>
                             <td class='text-right' ><?php echo $row_expense_show['person_name'] ?></td>
                           </tr><!-- comment -->
                           <tr>
                             <td><b>Paid On</b></td>
                             <td class="text-right"><?php 
                             $date_paid =$row_expense_show['date'] ;
                             $date=date_create($date_paid);
                             echo date_format($date,"dS M-Y"); ?></td>
                           </tr>
                           <tr><td></td>
                               <td></td>
                           </tr>
                        
                           
                        </tbody>
                        
                    </table>
                             <?php 
                                 if($row_expense_show['target_path']!= NULL){
                                     $path = $row_expense_show['target_path'];
                                     echo "<p class='text-center'><a href='$path'>Show Bill</a></p>";
                                 }
                                 else{
                                      echo "<p class='text-center'><a href=''>You don't have a Bill</a></p>";

                                 }
                               
                               ?>
                </div>
            </div>
</div>
