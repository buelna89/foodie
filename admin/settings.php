<?php 
include('./adminPartials/adminHeader.php');
?>

    <div class="adminPage flex">
       <?php 
       include('./adminPartials/sideMenu.php');
       ?>

        <?php 
            // Get the values from the database=========>
            $userName = $_SESSION['username'];
            $sql = "SELECT * FROM admins WHERE username = '$userName'";
            $res = mysqli_query($conn, $sql);
            if($res==TRUE){
                $count = mysqli_num_rows($res);
                if($count==1){
                    while($row = mysqli_fetch_assoc($res)){
                        $ID = $row['id'];
                        $name = $row['name'];
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
                    <span><strong>Settings</strong> Page</span>
                </div>

               
                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

           <div class="mainBodyContentContainer">
                <div class="settingsPage">
                    <div class="heading flex">
                        <span>Personal Details</span>
                       
                        <span class="flex" style="gap: 1rem;">
                            <button class="btn">
                                <a href="addAdmin.php" class="flex">Add Admin <i class="uil uil-plus icon"></i></a>
                            </button>
                            <button class="btn">
                                <a href="addDb.php" class="flex">Add Delivery Boy <i class="uil uil-plus icon"></i></a>
                            </button>
                            <button class="btn">
                                <a href="administrators.php" class="flex">All Administrators <i class="uil uil-arrow-right icon"></i></a>
                            </button>
                        </span>
                        
                    </div>

                    <div class="informationContainer flex">

                        <?php 
                            if($image!=""){   
                            ?>
                                <div class="imgDiv flex">
                                    <img src="<?php echo SITEURL;?>databaseImages/foodie<?php echo $image;?>" alt="Account Admin Image">
                                </div>
                                

                            <?php
                            }
                            else{
                            echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image 1</span>';
                            }
                        ?>
                       

                        <div class="detailsDiv grid">
                            <span class="flex span id">
                                <span>ID Number:-</span>
                                <span><?php echo $ID;?></span>
                            </span>
                            <span class="flex span">
                                <span>Name:-</span>
                                <span><?php echo $name;?></span>
                            </span>
                            <span class="flex span">
                                <span>User Name:-</span>
                                <span><?php echo $userName?></span>
                            </span>
                            <span class="flex span">
                                <span>Phone:-</span>
                                <span><?php echo $phone?></span>
                            </span>
                            <span class="flex span">
                                <span>Email:-</span>
                                <span><?php echo $email?></span>
                            </span>
                            <span class="flex span">
                                <span>Nationality:-</span>
                                <span><?php echo $nationality?></span>
                            </span>

                            <button class="btn" style="width: max-content;" >
                                <a href="<?php echo SITEURL?>admin/updateMyDetails.php?id=<?php echo $ID?>" class="flex">Update Details<i class="uil uil-arrow-right icon"></i></a>
                                </button>
                          
                        </div>
                    </div>
                </div>
           </div>

         </div>
    </div>


<?php 
include('./adminPartials/adminFooter.php');
?>