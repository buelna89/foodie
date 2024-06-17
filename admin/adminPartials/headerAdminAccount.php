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
                $adminRole = $row['role'];
            }

        }
        else{
            header('location:' .SITEURL. 'admin/settingsA.php');
            exit();
        }
    }
            
?>

<?php 
    // Get the values from the database=========>
    $sql = "SELECT * FROM orders WHERE order_status = 'ordered'";
    $res = mysqli_query($conn, $sql);
    if($res==TRUE){
        $currentOrders = mysqli_num_rows($res);
    }
?>

<div class="adminDiv flex">
    <div class="notDiv">
        <i class='bx bxs-bell icon' title="New Food Order"></i>
        <span class="count" ><?php echo $currentOrders?></span>
    </div>
    
    <?php 
        if($image!=""){   
        ?>
            <div class="imgDiv flex">
                <img src="<?php echo SITEURL;?>databaseImages/foodie<?php echo $image;?>" alt="Account Admin Image">
                <span class="name"><?php echo $name;?> <br><small><?php echo $adminRole;?></small></span>
            </div>

        <?php
        }
        else{
        echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image 1</span>';
        }
    ?>

<a href="logOut.php" title="Log Out" ><img src="../Assests/logOutIcon.png" alt="" style="width: 40px; transform: translateY(5px);"></a>
</div>