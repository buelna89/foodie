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
                    <span><strong>Delivery Boy</strong> Settings</span>
                </div>

                
                <?php 
                    include('./adminPartials/headerAdminAccount.php');
                ?> 
            </div>

           <div class="mainBodyContentContainer">
                    <?php 
                        // Get the values from the database=========>
                        $singleDbID = $_GET['id'];
                        $sql = "SELECT * FROM deliveryboys WHERE id = '$singleDbID'";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE){
                            $count = mysqli_num_rows($res);
                            if($count==1){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
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
                <div class="settingsPage">
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
                                $adminName = $row['name'];
                                $adminImage = $row['admin_image'];
                                $adminRole = $row['role'];
                            }

                        }
                        else{
                            header('location:' .SITEURL. 'admin/settings.php');
                            exit();
                        }
                    }
                ?>
                    <div class="heading flex">
                        <span>Delivery Boy Details</span>
                        <button class="btn">
                            <a href="<?php echo SITEURL?>admin/updateDb.php?id=<?php echo $id?>" class="flex">Update<i class="uil uil-arrow-right icon"></i></a>
                        </button>
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
                                <span>0<?php echo $id;?></span>
                            </span>
                            <span class="flex span">
                                <span>Name:-</span>
                                <span><?php echo $name;?></span>
                            </span>
                            <span class="flex span">
                                <span>Nationality:-</span>
                                <span><?php echo $nationality?></span>
                            </span>
                            <span class="flex span">
                                <span>Phone:-</span>
                                <span><?php echo $phone?></span>
                            </span>
                            <span class="flex span">
                                <span>Email:-</span>
                                <span><?php echo $email?></span>
                            </span>
                           
                        </div>
                    </div>
                </div>
           </div>

         </div>
    </div>


<?php 
include('./adminPartials/adminFooter.php');
?>