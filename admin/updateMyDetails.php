<?php 
include('./adminPartials/adminHeader.php');
ob_start();
?>

    <div class="adminPage flex">
       <?php 
       include('./adminPartials/sideMenu.php');
       ?>

        <?php 
            // Get the values from the database=========>
            $singleAdminID = $_GET['id'];
            $sessionName = $_SESSION['username'];
            $userName = $_SESSION['username'];
            $sql = "SELECT * FROM admins WHERE id =$singleAdminID AND username = '$sessionName'";
            $res = mysqli_query($conn, $sql);
            if($res==TRUE){
                $count = mysqli_num_rows($res);
                if($count==1){
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $userName = $row['username'];
                        $image = $row['admin_image'];
                        $nationality = $row['nationality'];
                        $email = $row['email'];
                        $adminRole = $row['role'];
                        $phone = $row['phone'];
                    }

                }
                else{
                    header('location:' .SITEURL. 'admin/settings.php');
                    exit();
                }
            }
            
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
                        <span>Personal Details</span>
                        <button class="btn">
                            <a href="administrators.php" class="flex">All Administrators <i class="uil uil-arrow-right icon"></i></a>
                        </button>
                    </div>

                    <div class="informationContainer flex">
                        
                    <?php 
                        // Get the values from the database=========>
                        $singleAdminID = $_GET['id'];
                        $sessionName = $_SESSION['username'];
                        $userName = $_SESSION['username'];
                        $sql = "SELECT * FROM admins WHERE id =$singleAdminID AND username = '$sessionName'";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE){
                            $count = mysqli_num_rows($res);
                            if($count==1){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $userName = $row['username'];
                                    $image = $row['admin_image'];
                                    $nationality = $row['nationality'];
                                    $email = $row['email'];
                                    $adminRole = $row['role'];
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
                                <label for="Username">Username</label>
                                <input type="text" name="Username" value="<?php echo $userName ?>">
                               </span>
                               <span class="flex span">
                                <label for="nationality">Nationality</label>
                                <input type="text" name="nationality" value="<?php echo $nationality ?>">
                               </span>

                               <span class="flex span">
                                <label for="Phone">Phone</label>
                                <input type="number" name="Phone" value="<?php echo $phone ?>">
                                </span>
                            </div>
    
                            <div class="grid">
                               
                                <span class="flex span">
                                    <label for="email">email</label>
                                    <input type="email" name="email" value="<?php echo $email ?>">
                                </span>
                                <span class="flex span">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" placeholder="Enter Password">
                                </span>
                                <span class="flex span">
                                    <label for="role">Admin Role</label>
                                    <select name="role" value="<?php echo $role ?>">
                                        <option value="manager">Manager</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </span>
                                <span class="flex span" >
                                    <label for="pci">Profile Picture</label>
                                    <input type="file" name="itemImage">
                                </span>
                                   
                                    <button class="btn bg" name="submit">Update Admin</button>
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
  $Username = $_POST['Username'];
  $nationality = $_POST['nationality'];
  $Phone = $_POST['Phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];


   //  Uploading Image 1 to the database =======================>
     
   if(isset($_FILES['itemImage']['name'])){
    //To upload the image we need the image name, source and destination.
    $adminImage = $_FILES['itemImage']['name'];
    // Source ================>
    $imageSource = $_FILES['itemImage']['tmp_name'];
    // Destination ================>
    $imageDestination = "../databaseImages/foodie".$adminImage; 
    // Finally upload the image ========>
    $uploadImage = move_uploaded_file($imageSource, $imageDestination);

    if($uploadImage == false){
      $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
            // header('location:' .SITEURL. '.php');
   
    }
  }else{
    
    $adminImage ="";
    }

  $sql = "UPDATE admins SET
  name = '$name',
  username = '$Username',
  nationality = '$nationality',
  phone = '$Phone',
  email = '$email',
  password = '$password',
  role = '$role',
  admin_image = '$adminImage'

  WHERE id = $singleAdminID
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['credentialsChanged'] = '<span class="fail" style="color: red;">Login Again!</span>';
      header('location:'.SITEURL. 'login.php');
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 

}
?>