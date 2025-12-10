<?php
include "../copy_productClass.php";
$product = new product;
if (!isset($_GET['user_id'])|| $_GET['user_id'] == null){
    echo "<script>window.location = 'userlist.php'</script>";
}else{
    $user_id = $_GET['user_id'];
}
$delete_user = $product->delete_user($user_id);
?>