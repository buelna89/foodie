<?php 
include('./adminPartials/adminHeader.php');
ob_start();
?>

    <div class="adminPage flex">
       <?php 
       include('./adminPartials/sideMenuA.php');
       ?>

         <div class="mainBody">
            <div class="topSection flex">
                <div class="title">
                    <span><strong>Add Food</strong> Item</span>
                </div>

                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

           <div class="mainBodyContentContainer">
                <div class="settingsPage updateSettings">
                    <div class="heading flex">
                        <span>Fill the form below</span>
                        <?php 
                            if(isset($_SESSION['addedFood'])){
                            echo $_SESSION['addedFood'];
                            unset ($_SESSION['addedFood']);
                            }
                        ?>
                        <button class="btn">
                            <a href="adminMenuA.php" class="flex">All Food <i class="uil uil-arrow-right icon"></i></a>
                        </button>
                    </div>

                    <div class="informationContainer flex">
                        <form method="post" enctype="multipart/form-data" class="flex">
                            <div class="grid">
                               <span class="flex span">
                                <label for="name">Item Name</label>
                                <input type="text" name="itemName" placeholder="Item Name" required>
                               </span>
                               <span class="flex span ">
                                <label for="Username">Description</label>
                                <textarea name="desc" placeholder="Describe the item" required></textarea>
                               </span>
                               <span class="flex span">
                                <label for="nationality">Price</label>
                                <input type="number" name="price" placeholder="Item price" required>
                               </span>

                            </div>
    
                            <div class="grid">     
                                <span class="flex span">
                                    <label for="Picture">Food Image</label>
                                    <input type="file" name="itemImage" required>
                                </span>
                                <span class="flex span">
                                    <label for="Picture">Food Category</label>
                                    <select name="category" required>
                                        <option value="localfood"> Local Food</option>
                                        <option value="drinks">Drinks</option>
                                        <option value="fastfood">Fast Food</option>
                                        <option value="cakes">Cakes</option>
                                        <option value="dessert">Dessert</option>
                                       
                                    </select>
                                </span>
                                <button class="btn bg" name="submit">Add Item</button>
                            </div>
                        </form>
                        
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

  $foodName = $_POST['itemName'];
  $foodDesc = $_POST['desc'];
  $foodPrice = $_POST['price'];
  $category = $_POST['category'];


   //  Uploading Image 1 to the database =======================>
     
   if(isset($_FILES['itemImage']['name'])){
    //To upload the image we need the image name, source and destination.
    $image = $_FILES['itemImage']['name'];
    // Source ================>
    $imageSource = $_FILES['itemImage']['tmp_name'];
    // Destination ================>
    $imageDestination = "../databaseImages/foodie".$image; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
    }
  }else{
    
    $image ="";
    }

  $sql = "INSERT INTO food SET
  food_name = '$foodName',
  image = '$image',
  food_desc = '$foodDesc',
  price = '$foodPrice',
  category = '$category'
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['addedFood'] = '<span class="success">Item Added Successfully, add more?</span>';
      header('location:'.SITEURL. 'admin/addFoodA.php');
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 

}
?>