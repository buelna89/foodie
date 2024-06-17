<?php 
include('clientPartials/clientHeader.php');
ob_start();
?>
                   
    <div class="section container loginPage flex">
          <div class="pageContent">
                <h1 class="title">Login Here!</h1>
                 <p>Please be authentic!</p>

                 <?php 
                        if(isset($_SESSION['noAdmin'])){
                            echo $_SESSION['noAdmin'];
                            unset($_SESSION['noAdmin']);
                        }

                        if(isset($_SESSION['notLoggedIn'])){
                            echo $_SESSION['notLoggedIn'];
                            unset ($_SESSION['notLoggedIn']);
                        }
            
                        if(isset($_SESSION['settings'])){
                        echo $_SESSION['settings'];
                        unset($_SESSION['settings']);
                        }

                        if(isset($_SESSION['credentialsChanged'])){
                        echo $_SESSION['credentialsChanged'];
                        unset($_SESSION['credentialsChanged']);
                        }
                    ?> 
                  

                 <form method="POST">
                    <div class="input">
                        <label for="name">Username</label>
                        <input type="text" id="name" name="userName" placeholder="Enter Username">
                        
                    </div>
                    <div class="input">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="passWord" placeholder="Enter Password">
                    </div>
                    <button class="btn flex" name="submit"> Login <i class="uil uil-signin icon"></i></button>
                   
                 </form>

                 <p class="text">Having Trouble Logging In? <br> Contact Admin</p>

                 <img src="./Assests/floating (2).png" alt="">
          </div>
          <img src="./Assests/floating (2).png" alt="" class="designImage1">
          <img src="./Assests/floating (1).png" alt="" class="designImage2">
    </div>

<?php 
include('clientPartials/clientFooter.php');
?>
 
<?php 

if(isset($_POST['submit'])){

     $userName = $_POST['userName'];
     $loginPassword = $_POST['passWord'];

    $sql = "SELECT * FROM admins WHERE username='$userName' AND password= '$loginPassword'";

    $res = mysqli_query($conn,$sql);
 
        $count = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
        if($count==1 && $row['role']=='manager'){
            $_SESSION['loginMessage'] = '<span class="success">Welcome ' .$firstName. '!</span>';
            $_SESSION['username'] = $userName;
            header('location:' .SITEURL. 'admin/dashboard.php');
            exit();
            
        }
        
        else if($count==1 && $row['role']=='admin'){
            $_SESSION['loginMessage'] = '<span class="success">Welcome ' .$firstName. '!</span>';
            $_SESSION['username'] = $userName;
            header('location:' .SITEURL. 'admin/dashboardA.php');
            exit();
    
        }
        else{
            $_SESSION['noAdmin'] = '<span class="fail" style="color: red;">Incorrect Credentials!</span>';
            header('location:' .SITEURL. 'login.php');
            exit();
        }
    
}


?>