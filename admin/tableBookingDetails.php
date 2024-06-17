<?php 
include('./adminPartials/adminHeader.php');
ob_start();
?>

    <div class="adminPage flex">
       <?php 
       include('./adminPartials/sideMenu.php');
       ?>
        
         <div class="mainBody">
            <div class="topSection flex">
                <div class="title">
                    <span><strong>Table Reservation</strong> Details</span>
                </div>

               
                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

            <div class="mainBodyContentContainer">

                <?php           

                    $tableID = $_GET['id'];
                    $sql = "SELECT * FROM tablereservations WHERE id = $tableID";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE){
                        $count = mysqli_num_rows($res);
                        if($count == 1){
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
                                
                              }
                        }

                        else{
                        echo 'Something is wrong :)';
                        }
                    }
                ?>
                <div class="heading flex">
                    <span>#<?php echo $id?> Reservation Details</span>
                    <button class="btn">
                        <a href="table.php" class="flex">All Reservations <i class="uil uil-arrow-right icon"></i></a>
                    </button>
                </div>
                <div class="orderDetails flex">
                    <div class="amountDiv">
                        <h3 class="title flex">
                           Expenses Fees: <img src="../Assests/order.png" alt="Icon">
                        </h3>
                
                        <span class="cartList flex">
                            <span class="subTitle">
                                Total:
                            </span>
                            <span class="gradCost">
                                $<?php echo $expenses;?>
                            </span>
                        </span>

                         <div class="updateOrderDiv">
                            <h3 class="updateOrderTitle flex">
                                Upadate Reservation
                            </h3>
    
                            <form method="post">
                            <div class="inputDiv flex">
                            <label for="tl">Expenses</label>
                            <input type="number" name="expenses" value="<?php echo $expenses;?>">
                            </div>
                                <div class=" inputDiv flex">
                                    <label>Status</label>
                                    <select name="status">
                                        <option value="booked" selected>Booked</option>
                                        <option value="canceled">Canceled</option>
                                        <option value="checkedin">Checkedin</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </div>
                                <input type="hidden" name="updated" value="<?php echo $_SESSION['username']?>">
                                <button name="submit" class="btn">Update Reservation</button> 
                            </form>
                         </div>
        
                    </div>
                    
                </div>

                <div class="customerDetails grid">
                    <div class="heading flex">
                        <span>Guest Information</span>
                    </div>
                    <div class="singleDetail flex">
                        <span class="dTitle">Guest Name:-</span>
                        <span class="detail"><?php echo $guestName;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Email:-</span>
                        <span class="detail"><?php echo $guestEmail;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Phone:-</span>
                        <span class="detail"><?php echo $guestPhone;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Total Guests:-</span>
                        <span class="detail" ><?php echo $totalPeople;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Date:-</span>
                        <span class="detail" ><?php echo $date;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Time:-</span>
                        <span class="detail" ><?php echo $Time;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Message:-</span>
                        <span class="detail" ><?php echo $guestMessage;?></span>
                    </div>
                </div>

                <div class="customerDetails grid">
                    <div class="heading flex">
                        <span>Reservation Notes</span>
                    </div>
                    <div class="singleDetail flex">
                    <span class="detail">This reservation was last updated by;</span>

                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Admin Name:-</span>
                        <span class="detail" style="text-transform: capitalize;"><?php echo $updatedBy;?></span>
                    </div>
                </div>
               
            </div>

         </div>
    </div>


<?php 
include('./adminPartials/adminFooter.php');
?>

<?php 

if(isset($_POST['submit'])){

  $Status = $_POST['status'];
  $updated = $_POST['updated'];
  $expenses = $_POST['expenses'];

  $sql = "UPDATE tablereservations SET
  status = '$Status',
  updated_by = '$updated',
  expenses = '$expenses'
  WHERE id = $tableID
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['reservationUpdated'] = '<span class="success">Reservation Updated Successfully!</span>';
      header('location:'.SITEURL. 'admin/table.php');
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 
}
?>