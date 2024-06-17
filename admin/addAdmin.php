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
                    <span><strong>Add New</strong> Administrator</span>
                </div>

                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

           <div class="mainBodyContentContainer">
                <div class="settingsPage updateSettings">
                    <div class="heading flex">
                        <span>Fill the form below</span>
                        <button class="btn">
                            <a href="administrators.php" class="flex">All Administrators <i class="uil uil-arrow-right icon"></i></a>
                        </button>
                    </div>

                    <div class="informationContainer flex">
                        <form method="post" enctype="multipart/form-data" class="flex">
                            <div class="grid">
                               <span class="flex span">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Type Full name" required>
                               </span>
                               <span class="flex span">
                                <label for="Username">Username</label>
                                <input type="text" name="Username" placeholder="Type Username" required>
                               </span>
                               <span class="flex span">
                                <label for="nationality">Nationality</label>
                                <input type="text" name="nationality" placeholder="Type Nationality" required>
                               </span>

                               <span class="flex span">
                                <label for="Phone">Phone</label>
                                <input type="number" name="Phone" placeholder="Type Phone" required>
                                </span>
                            </div>
    
                            <div class="grid">
                               
                                <span class="flex span">
                                    <label for="email">email</label>
                                    <input type="email" name="email" placeholder="Type Your Email" required>
                                </span>
                                <span class="flex span">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" placeholder="Enter Password" required>
                                </span>
                                <span class="flex span">
                                    <label for="role">Admin Role</label>
                                    <select name="role" required>
                                        <option value="manager">Manager</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </span>
                                <span class="flex span">
                                    <label for="pci">Picture</label>
                                    <input type="file" name="itemImage" required>
                                </span>
                                   
                                    <button class="btn bg" name="submit">Add Admin <i class="uil uil-plus icon"></i></button>
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

  $sql = "INSERT INTO admins SET
  name = '$name',
  username = '$Username',
  nationality = '$nationality',
  phone = '$Phone',
  email = '$email',
  password = '$password',
  role = '$role',
  admin_image = '$adminImage'
  ";

  $result = mysqli_query($conn, $sql);

  if($result == TRUE){
    $_SESSION['addedAdmin'] = '<span class="success">Administrator Added Successfully!</span>';
      header('location:'.SITEURL. 'admin/administrators.php');
      exit();
  }
  else{
    
  die('Failed to connect to database!');
  } 

}
?>