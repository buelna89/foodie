<?php 
include('./adminPartials/adminHeader.php');
?>

    <div class="adminPage flex">
       <?php 
       include('./adminPartials/sideMenu.php');
       ?>
         <div class="mainBody">
            <div class="topSection flex">
                <div class="title">
                    <span><strong>Orders</strong> Page</span>
                </div>

                <?php 
                   if (isset($_SESSION['orderUpdated'])) {
                    echo $_SESSION['orderUpdated'];
                    unset($_SESSION['orderUpdated']);
                   }
                ?> 

                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

            <div class="mainBodyContentContainer">

                <div class="orderDiv">
                    <table class="table">
                        <tr class="tblHeader">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                            <th>Payments</th>
                            <th>Action</th>
                        </tr>

                        <?php 
                            $sql = "SELECT * FROM orders";
                            $res = mysqli_query($conn, $sql);
                            $tableID = 1;
                          if($res == TRUE){
                            $count = mysqli_num_rows($res);
                              if($count > 0){
                                  while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $cust_fname = $row['cust_fname'];
                                    $contact = $row['contact'];
                                    $total_cost = $row['total_cost'];
                                    $order_status = $row['order_status'];
                                    $payment = $row['payment'];
                                    ?>
                                      
                                        <tr class="tblRow orderRow">
                                            <td class="id"><?php echo $tableID++?></td>
                                            <td class="customerName">
                                            <span class="name"><?php echo $cust_fname?></span>
                                            </td>
                    
                                            <td class="contact">
                                                <p><?php echo $contact?></p>
                                            </td>
                    
                                            <td class="cost">
                                                <p>$<?php echo $total_cost?></p>
                                            </td>
                                            

                                            <?php 
                                            if($order_status == 'delivered'){
                                                ?>
                                                <td class="status">            
                                                <p  class="delivered"><?php echo $order_status?></p>
                                                </td>
                                                <?php
                                            }

                                            elseif ($order_status == 'canceled') {
                                                ?>
                                                <td class="status">            
                                                <p class="canceled"><?php echo $order_status?></p>
                                                </td>
                                                <?php
                                            }

                                            elseif ($order_status == 'on the way') {
                                                ?>
                                                <td class="status">            
                                                <p class="OTW"><?php echo $order_status?></p>
                                                </td>
                                                <?php
                                            }

                                            else {
                                                ?>
                                                <td class="status" style="text-transform: capitalize;">            
                                                <p><?php echo $order_status?></p>
                                                </td>
                                                <?php
                                            }
                                            ?>

                                            <td class="payments">
                                                <p><?php echo $payment?></p>
                                            </td>
                    
                                            <td class="action">
                                                <a href="<?php echo SITEURL?>admin/orderDetails.php?id=<?php echo $id?>">
                                                    <i class="uil uil-file-info-alt icon"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php 
                                    
                                  }
                              }

                              else{
                                echo '<span class="blank">No Orders have been made yet!</span>';
                              }
                          }
                        ?>
                    </table>
                </div>
                
               
            </div>

         </div>
    </div>


<?php 
include('./adminPartials/adminFooter.php');
?>