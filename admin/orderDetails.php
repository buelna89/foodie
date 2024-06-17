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
                    <span><strong>Single Order</strong> Page</span>
                </div>

               
                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

            <div class="mainBodyContentContainer">

                <?php           

                    $tableID = $_GET['id'];
                    $sql = "SELECT * FROM orders WHERE id = $tableID";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE){
                        $count = mysqli_num_rows($res);
                        if($count == 1){
                            while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $cartID = $row['cart_ID'];
                            $cust_fname = $row['cust_fname'];
                            $cust_sname = $row['cust_sname'];
                            $contact = $row['contact'];
                            $location = $row['location'];
                            $email = $row['email'];
                            $street = $row['street'];
                            $building = $row['building'];
                            $message = $row['message'];
                            $total_cost = $row['total_cost'];
                            $order_status = $row['order_status'];
                            $payment = $row['payment'];
                            $updatedBy = $row['updated_by'];
                            $updatedDate = $row['updated_date'];
                            }
                        }

                        else{
                        echo 'Something is wrong :)';
                        }
                    }
                ?>
                <div class="heading flex">
                    <span>#<?php echo $id?> Order Details</span>
                    <button class="btn">
                        <a href="orderDetails.php" class="flex">All Orders <i class="uil uil-arrow-right icon"></i></a>
                    </button>
                </div>
                <div class="orderDetails flex">
                    <div class="cartDiv grid">

                    <?php           
                        // Select item from the cart table ====> 
                        $sql = "SELECT * FROM cart where id = $cartID";
                        $res = mysqli_query($conn, $sql);
                        $totalOrderPrice = 0;
                        if($res == TRUE){
                             $count = mysqli_num_rows($res);
                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $sessionID = $row['session_id'];

                                   ?>
                                    <?php 
                                        // Get the values from the database=========>
                                        $sql = "SELECT * FROM cart WHERE session_id = '$sessionID'";
                                        $res = mysqli_query($conn, $sql);
                                        $subTotal = 0;
                                        if($res==TRUE){
                                            $currentOrders = mysqli_num_rows($res);
                                
                                            if($currentOrders > 0){
                                                while($eachRow = mysqli_fetch_assoc($res)){
                                                    $cartID = $eachRow['id'];
                                                    $foodID = $eachRow['food_id'];
                                                    $sessionID = $eachRow['session_id'];
                                                    $qty = $eachRow['qty'];
                                                    $totalCost = $eachRow['total_cost'];
                                                    $subTotal += $totalCost;

                                                    ?>
                                                        <?php 
                                                            $sql = "SELECT * FROM food WHERE id =$foodID";
                                                            $result = mysqli_query($conn, $sql);
                        
                                                            if($result ==TRUE){
                                                                $foodDetails = mysqli_num_rows($result);
                                                                if($foodDetails > 0){
                                                                    while($eachRow = mysqli_fetch_assoc($result)){
                                                                        $id = $eachRow['id'];
                                                                        $img = $eachRow['image'];
                                                                        $foodName = $eachRow['food_name'];
                                                                        $foodPrice = $eachRow['price'];
                                                                        ?>
                                                                        <div class="singleCart flex">
                                                                            <?php 
                                                                                if($img!=""){   
                                                                                    ?>
                                                                                    <img src="<?php echo SITEURL;?>databaseImages/foodie<?php echo $img;?>"  alt="Online Food Order">
                                                                                    <?php
                                                                                }
                                                                                else{
                                                                                    echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image 1</span>';
                                                                                }
                                                                            ?>
                                                                            <div class="foodDetails">
                                                                                <span class="name_closeIcon flex">
                                                                                    <?php echo $foodName?>
                                                                                    <i class="uil uil-check-circle icon"></i>
                                                                                </span>
                                                                                <span class="qty_price flex">
                                                                                    <span>Quantity: <?php echo $qty?></span>
                                                                                    <span>$<?php echo $totalCost?></span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                    <?php
                                                }
                                            } 
                                        }
                                    ?>
                                   <?php

                                }
                            }

                            else{
                            echo 'Something is wrong :)';
                            }
                        }
                    ?>

                    </div>
                    <div class="amountDiv">
                        <h3 class="title flex">
                           Order Fees: <img src="../Assests/order.png" alt="Icon">
                        </h3>
                
                        <span class="cartList flex">
                            <span class="subTitle">
                                Subtotal:
                            </span>
                            <span class="cost">
                                $<?php echo $subTotal;?>
                            </span>
                           
                        </span>
        
                        <span class="cartList flex">
                            <span class="subTitle">
                                Total:
                            </span>
                            <span class="gradCost">
                                $<?php echo $subTotal;?>
                            </span>
                        </span>

                        <span class="cartList flex">
                            <span class="subTitle">
                                Payment:
                            </span>
                            <span class="gradCost">
                                <?php echo $payment;?>
                            </span>
                        </span>

                         <div class="updateOrderDiv">
                            <h3 class="updateOrderTitle flex">
                                Upadate Order
                             </h3>
    
                            <form method="post">
                                <div class=" inputDiv flex">
                                    <label>Status</label>
                                    <select name="status">
                                        <option value="ordered" selected>Ordered</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="canceled">Canceled</option>
                                        <option value="on the way">On the way</option>
                                    </select>
                                </div>
                                <input type="hidden" name="updated" value="<?php echo $_SESSION['username']?>">
                                <input type="hidden" name="dateTime" value="<?php echo date("Y-m-d H:i:s")?>">
                                <button name="submit" class="btn">Update Order</button> 
                            </form>
                         </div>
        
                    </div>
                    
                </div>

                <div class="customerDetails grid">
                    <div class="heading flex">
                        <span>Customer Details</span>
                    </div>
                    <div class="singleDetail flex">
                        <span class="dTitle">Cust. First Name:-</span>
                        <span class="detail"><?php echo $cust_fname;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Cust. Second Name:-</span>
                        <span class="detail"><?php echo $cust_sname;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Email:-</span>
                        <span class="detail"><?php echo $email;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Phone:-</span>
                        <span class="detail"><?php echo $contact;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Location:-</span>
                        <span class="detail" ><?php echo $location;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Street:-</span>
                        <span class="detail" ><?php echo $street;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Building:-</span>
                        <span class="detail" ><?php echo $building;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Message:-</span>
                        <span class="detail" ><?php echo $message;?></span>
                    </div>
                </div>

                <div class="customerDetails grid">
                    <div class="heading flex">
                        <span>Order Notes</span>
                    </div>
                    <div class="singleDetail flex">
                        <span class="detail">This order was last updted by;</span>

                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Admin Name:-</span>
                        <span class="detail" style="text-transform: capitalize;"><?php echo $updatedBy;?></span>
                    </div>
                    <div class="singleDetail  flex">
                        <span class="dTitle">Date:-</span>
                        <span class="detail"><?php echo $updatedDate;?></span>
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
  $dateTime = $_POST['dateTime'];

  $sql = "UPDATE orders SET
  order_status = '$Status',
  updated_by = '$updated',
  updated_date = '$dateTime'
  WHERE id = $tableID
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['orderUpdated'] = '<span class="success">Order Updated Successfully!</span>';
      header('location:'.SITEURL. 'admin/orders.php');
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 
}
?>