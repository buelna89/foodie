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
                    <span><strong>Update</strong> Details</span>
                </div>

              
                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

           <div class="mainBodyContentContainer">
                <div class="settingsPage updateSettings">
                    <div class="heading flex">
                        <span>Delivery Boy Details</span>
                        <button class="btn">
                            <a href="db.php" class="flex">All Delivery Boys <i class="uil uil-arrow-right icon"></i></a>
                        </button>
                    </div>

                    <div class="informationContainer flex">
                    <?php 
                        // Get the values from the database=========>
                        $tableID = $_GET['id'];
                        $sql = "SELECT * FROM deliveryboys WHERE id = $tableID";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE){
                            $count = mysqli_num_rows($res);
                            if($count==1){
                                while($row = mysqli_fetch_assoc($res)){
                                    $ID = $row['id'];
                                    $name = $row['name'];
                                    $image = $row['db_image'];
                                    $nationality = $row['nationality'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                }

                            }
                            else{
                                header('location:' .SITEURL. 'admin/settings.php');
                                exit();
                            }
                        }
                     ?>
                        <form method="post" enctype="multipart/form-data" class="flex">
                            <div class="grid">
                               <span class="flex span">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="<?php echo $name ?>">
                               </span>

                               <span class="flex span">
                                <label for="nationality">Nationality</label>
                                <input type="text" name="nationality" value="<?php echo $nationality ?>">
                               </span>

                               <span class="flex span">
                                <label for="Phone">Phone</label>
                                <input type="number" name="phone" value="<?php echo $phone ?>">
                                </span>
                            </div>
    
                            <div class="grid">
                               
                                <span class="flex span">
                                    <label for="email">email</label>
                                    <input type="email" name="email" value="<?php echo $email ?>">
                                </span>

                                <span class="flex span">
                                    <label for="pci">Profile Picture</label>
                                    <input type="file" name="dbImage">
                                </span>
                                   
                                    <button class="btn bg" name="submit">Update Delivery Boy</button>
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

  $name = $_POST['name'];
  $nationality = $_POST['nationality'];
  $Phone = $_POST['phone'];
  $email = $_POST['email'];

   //  Uploading Image 1 to the database =======================>
   if(isset($_FILES['dbImage']['name'])){
    //To upload the image we need the image name, source and destination.
    $dbImage = $_FILES['dbImage']['name'];
    // Source ================>
    $imageSource = $_FILES['dbImage']['tmp_name'];
    // Destination ================>
    $imageDestination = "../databaseImages/foodie".$dbImage; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
            // header('location:' .SITEURL. '.php');
   
    }
  }else{
    
    $dbImage ="";
    }

  $sql = "UPDATE deliveryboys SET
  name = '$name',
  nationality = '$nationality',
  phone = '$Phone',
  email = '$email',
  db_image = '$dbImage'
  WHERE id = $tableID
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['dbUpdated'] = '<span class="success">Delivery Boy Updated Successfully!</span>';
      header('location:'.SITEURL. 'admin/db.php');
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 
}
?>