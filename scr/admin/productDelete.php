<?php
    include "class/product_class.php";
    $product = new product;
    $urlimages = "uploads/".$_FILES['product_img']['name'];
    echo $urlimages;
    if (!isset($_GET['product_id']) || $_GET['product_id'] == null) {
        echo "<script>window.location = 'productList.php';</script>";
        exit;  // Thêm exit để dừng script sau khi chuyển hướng
    } else {
        $product_id = $_GET['product_id'];
    }

    // Xóa sản phẩm khỏi database
    $delete_product = $product->delete_product($product_id);

?>
