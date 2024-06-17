<?php 

include('../config/config.php');

// get individual ID ====================>
$deleteDbBtn = $_GET['id'];

$sql = "DELETE FROM food WHERE id= $deleteDbBtn";
$result = mysqli_query($conn, $sql);
if($result==TRUE){
    $_SESSION['deletedFood'] = '<span class="success">Food Item deleted successfully!</span>';
    header('location:' .SITEURL. 'admin/adminMenu.php');
}
else{
    $_SESSION['deleteFood'] = '<span class="fail">Failed to delete Food Item</span>';
    header('location:' .SITEURL. 'admin/adminMenu.php');
}

?>