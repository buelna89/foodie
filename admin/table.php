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
                    <span><strong>Table Reservations</strong> Page </span>
                </div>
                <?php 
                   if (isset($_SESSION['reservationUpdated'])) {
                    echo $_SESSION['reservationUpdated'];
                    unset($_SESSION['reservationUpdated']);
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
                            <th>Date</th>
                            <th>Time</th>
                            <th>T/L People</th>
                            <th>Billed</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php 
                            $sql = "SELECT * FROM tablereservations";
                            $res = mysqli_query($conn, $sql);
                            $tableID = 1;
                            if($res == TRUE){
                               $count = mysqli_num_rows($res);
                                if($count > 0){
                                  while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $guestName = $row['guest_name'];
                                    $guestEmail = $row['email'];
                                    $guestPhone = $row['contact'];
                                    $totalPeople = $row['people'];
                                    $date = $row['date'];
                                    $Time = $row['time'];
                                    $guestMessage = $row['message'];
                                    $expenses = $row['expenses'];
                                    $status = $row['status'];
                                    $updatedBy = $row['updated_by'];

                                    ?>
                                    <tr class="tblRow orderRow">
                                        <td class="id"><?php echo $tableID++?></td>
                                        <td class="customerName">
                                        <span class="name" style="text-transform:capitalize"><?php echo $guestName?></span>
                                        </td>
                
                                        <td class="contact">
                                            <p><?php echo $guestPhone?></p>
                                        </td>
                
                                        <td class="date">
                                            <p><?php echo $date?></p>
                                        </td>
                                        <td class="date">
                                            <p><?php echo $Time?></p>
                                        </td>
                
                                        <td class="occupancy">
                                            <p><?php echo $totalPeople?></p>
                                        </td>

                                        <td class="billedAmount">
                                            <p>$<?php echo $expenses?></p>
                                        </td>


                                        <?php 
                                            if($status == 'checkedin'){
                                                ?>
                                                <td class="status">            
                                                <p  class="delivered"><?php echo $status?></p>
                                                </td>
                                                <?php
                                            }

                                            elseif ($status == 'canceled') {
                                                ?>
                                                <td class="status">            
                                                <p class="canceled"><?php echo $status?></p>
                                                </td>
                                                <?php
                                            }

                                            elseif ($status == 'closed') {
                                                ?>
                                                <td class="status">            
                                                <p class="OTW"><?php echo $status?></p>
                                                </td>
                                                <?php
                                            }

                                            else {
                                                ?>
                                                <td class="status" style="text-transform: capitalize;">            
                                                <p><?php echo $status?></p>
                                                </td>
                                                <?php
                                            }
                                        ?>
                                            <td class="action">
                                                <a href="<?php echo SITEURL?>admin/tableBookingDetails.php?id=<?php echo $id?>">
                                                    <i class="uil uil-file-info-alt icon"></i>
                                                </a>
                                            </td>
                                    </tr>
                                    <?php 
                                    
                                }
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