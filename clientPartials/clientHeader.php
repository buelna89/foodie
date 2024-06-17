<?php 
include('./config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title>Foodie Project</title>

    <!-- Link to css -->
    <link rel="stylesheet" href="./main.css">

    <!-- Link to swiper css -->
    <link rel="stylesheet" href="./swiper-bundle.min.css">

    <!-- Link to icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/c93511b22d.js" crossorigin="anonymous"></script>

</head>
<body>

    <!-- Header/NavBar -->
    <header class="header flex" id="header">
        <div class="logoDiv">
            <a href="index.php" class="logo">
                FOODIE.
            </a>
        </div>

        <!-- Navbar -->
        <div class="navBar" id="navBar">
            <ul class="navLists flex">
                <li class="navItem">
                    <a href="index.php" class="navLink">Home</a>
                </li>

                <li class="navItem">
                    <a href="menu.php" class="navLink">Menu</a>
                </li>

                <li class="navItem">
                    <a href="tableReservation.php" class="navLink">Table Reservations
                    </a>
                </li>


                <div class="navBarText">
                    <p>Eat Anything, At anywhere, By Anytime.</p>
                </div>

                <!-- Toggle-Off navBar Icon -->
                <div class="closeNavbar" id="closeBtn">
                    <i class='bx bxs-x-circle icon'></i>
                </div>
            </ul>
        </div>



        <!-- HeaderIcons -->
        <div class="headerIcons flex">
        <?php 
            // Get the values from the database=========>
            $currentSession = session_id();
            $sql = "SELECT * FROM cart WHERE session_id = '$currentSession'";
            $res = mysqli_query($conn, $sql);
            if($res==TRUE){
                $currentOrders = mysqli_num_rows($res);
            }
        ?>
        <div class="notDiv">
            <a href="cart.php"><i class="uil uil-shopping-bag icon"></i></a>
        <span class="count"><?php echo $currentOrders?></span>
        </div>
            
            
             <div class="contactNumber">
                <i class="uil uil-phone icon phoneIcon"></i>
                <div class="phoneCard flex">
                    <i class='bx bxs-phone'></i>
                    <h3> +1 760 997 2157</h3>
                </div>
             </div>

        </div>

        <!-- Toggle-On navBar Icon -->
        <div class="toggleNavbar" id="toggler">
            <i class="uil uil-align-justify icon"></i>
        </div>
    </header>
    <!-- Header/NavBar Ends -->