<?php 
include('clientPartials/clientHeader.php');
?>

    <!-- Cart Section -->
    <section class="section container cart">

        <div class="secTitle">
            <h2 class="title flex">
                Cart <img src="./Assests/cart.png" alt="Icon">
            </h2>
        </div>

        <div class="secContent">

               <div class="gridDiv grid">
                    <div class="cartDiv grid">
                        <h3 class="title" >
                            Dear <span style="text-transform: capitalize;">Customer</span>, below is your cart details: 
                        </h3>

                        <?php 
                        if (isset($_SESSION['deletedCartItem'])) {
                            echo $_SESSION['deletedCartItem'];
                            unset($_SESSION['deletedCartItem']);
                        }
                        ?> 

                        <?php 
                            // Get the values from the database=========>
                            $currentSession = session_id();
                            $sql = "SELECT * FROM cart WHERE session_id = '$currentSession'";
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
                                                            $foodDesc = $eachRow['food_desc'];
                                                            $foodPrice = $eachRow['price'];
                                                            $category = $eachRow['category'];
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
                                                                        <a href="<?php echo SITEURL?>deleteCartItem.php?id=<?php echo $cartID?>" class="deleteCartItem"><i class='bx bx-x icon' ></i></a>
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
                                else{
                                    echo '<span class="blank">No item in the cart yet!</span>';
                                  }

                                
                            }
                        ?>

                    </div>
            
                    <div class="amountDiv">
                        <h3 class="title flex">
                        Order Fees: <img src="./Assests/order.png" alt="Icon">
                        </h3>
                
                        <span class="cartList flex">
                            <span class="subTitle">
                                Subtotal:
                            </span>
                            <span class="cost">
                            $<?php echo $subTotal?>
                            </span>
                        
                        </span>
            
                        <span class="cartList flex">
                            <span class="subTitle">
                                Total:
                            </span>
                            <span class="gradCost">
                            $<?php echo $subTotal?>
                            </span>
                        </span>
            
                        <a href="menu.php" class="btn shopping">Continue Shopping</a> 
                        <?php 
                        if($subTotal > 0){
                            ?>
                            <a href="checkout.php" class="btn">Check Out</a> 
                            <?php
                        }else{
                            echo '<script>alert("Your cart is empty")</script>';
                        }
                        ?>
                    </div>
                    
               </div>

        </div>
       
    </section>
    <!-- Cart Section End -->

<?php 
include('clientPartials/clientFooter.php');
?> 


