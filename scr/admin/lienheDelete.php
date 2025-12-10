<?php
include "../copy_productClass.php";
$product = new product;
if (!isset($_GET['lienhe_id'])|| $_GET['lienhe_id'] == null){
    echo "<script>window.location = 'lienhead.php'</script>";
}else{
    $lienhe_id = $_GET['lienhe_id'];
}
$delete_lienhe = $product->delete_lienhe($lienhe_id);
?>