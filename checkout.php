<?php 
include('clientPartials/clientHeader.php');
ob_start();
?>

    <!-- Check Out Page -->
    <section class="section container checkOut">
        <div class="secTitle">
            <h2 class="title flex">
                Checkout <img src="./Assests/trolley.png" alt="Icon">
            </h2>
        </div>

        <div class="secContent">
        <form method="POST">
            <div class="mainContent grid">
 
                <div class="rightDiv grid">
                    <div class="personalInfo">
                        <h3 class="title flex">Personal Information: <img src="./Assests/details.png" alt="Icon"></h3>
        
                        
                            <div class="inputDiv ">
    
                                <div class="input">
                                    <label for="fName">First Name</label>
                                    <input type="text" name="fName" placeholder="Enter First Name" required>
                                </div>
    
                                <div class="input">
                                    <label for="LName">Last Name</label>
                                    <input type="text" name="LName" placeholder="Enter Last Name" required>
                                </div>
    
                                <div class="input">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" placeholder="Enter Phone Number" required>
                                </div>
    
                                <div class="input">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="Enter Your Email" required>
                                </div>
                            </div>
                        
                    </div>
        
                    <div class="deliveryAddress">
                        <h3 class="title flex">Delivery Details: <img src="./Assests/house.png" alt="Icon"></h3>
                        
                            <div class="inputDiv">
                                    <div class="input">
                                        <label for="town">Location</label>
                                        <select name="town" required>
                                            <option value="London">London</option>
                                            <option value="Liverpool">Liverpool</option>
                                            <option value="Shefield">Shefield</option>
                                            <option value="Leicester">Leicester</option>
                                        </select>
                                    </div>
                
                                    <div class="input">
                                    <label for="street">Street</label>
                                    <input type="text" name="street" placeholder="Enter Your Street" required>
                                    </div>
                
                                    <div class="input">
                                    <label for="buildingNo">Building Number</label>
                                    <input type="text" name="buildingNo" placeholder="Enter Building Number" required>
                                    <input type="hidden" name="orderStatus" value="ordered">
                                    </div>
                                    
                                    <div class="input">
                                    <label for="message">Message (Optional)</label>
                                    <textarea name="message" placeholder="Any Message"></textarea>
                                    </div>
                            </div>
                        
                    </div>
        
                    <div class="paymentOption">
                        <h3 class="title flex">Payment: <img src="./Assests/debit-card.png" alt="Icon"></h3>
                        <div class="optionDiv">
                            <div class="input flex">
                               <div class="radio">
                                <input type="radio" name="payment" id="cod" class="input1" value="C.O.D" required>
      
                               </div>
                                <label for="cod">Pay On Delivery: (Delivery fees: $5)</label>
                            </div>
    
                            <div class="input flex">
                                <div class="radio">
                                    <input type="radio" id="mobile" name="payment" value="Dining">
                                </div>
                                <label for="mobile">Restuarant Dining</label>              
                            </div>

                            
                            
                        </div>
                    </div>
                </div>

                <div class="leftDiv grid">
                    <div class="cartDiv grid">
                        <h3 class="title flex">
                            Your order: <img src="./Assests/cart.png" alt="Icon">
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
                            <input type="hidden" name="cartID" value="<?php echo $cartID?>">
                            <input type="hidden" name="subTotal" value="<?php echo $subTotal?>">
                            $<?php echo $subTotal?>
                            </span>
                        </span>
                         
                        <button type="submit" name="submit" class="btn">Order Now</button> 
                    </div>
                </div>
            </div>
        </form>


         
       
        </div>
    </section>
    <!-- Check Out Page End -->

<?php 
include('clientPartials/clientFooter.php');
?>



<?php 
if(isset($_POST['submit'])){

  $fName = $_POST['fName'];
  $LName = $_POST['LName'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $town = $_POST['town'];
  $street = $_POST['street'];
  $buildingNo = $_POST['buildingNo'];
  $message = $_POST['message'];
  $payment = $_POST['payment'];
  $cartID = $_POST['cartID'];
  $orderStatus = $_POST['orderStatus'];
  $subTotal = $_POST['subTotal'];
  $tableNo = $_POST['tableNo'];


  $sql = "INSERT INTO orders SET
  cart_ID = '$cartID',
  cust_fname = '$fName',
  cust_sname = '$LName',
  location = '$town',
  contact = '$phone',
  email = '$email',
  street = '$street',
  building = '$buildingNo',
  message = '$message',
  total_cost = '$subTotal',
  order_status = '$orderStatus',
  payment = '$payment'
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['OrderAdded'] = '
        <div class="messageConatainerHome flex">
        <span class="messageCard">
            <img src="./Assests/checkIcon.png" class="checkIconHome">
            <small>Your order has been submitted successfully! <br>So glad to serve you!</small>
        <br><br>
        - Thank you! -

        </span>
    </div>';
      header('location:'.SITEURL. 'closeSession.php');
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 

}
?>