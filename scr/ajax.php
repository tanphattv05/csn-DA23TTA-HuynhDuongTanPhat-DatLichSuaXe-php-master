<?php
include "copy_productClass.php";
$product = new product;
$category_id = $_GET['category_id'];

?>

<?php
    $show_brand_ajax = $product->show_brand_ajax($category_id);            
    if($show_brand_ajax){while($result = $show_brand_ajax->fetch_assoc()){            
    ?>
    <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
    <?php
    }}
?>
<?php
    $brand_id = $_GET['brand_id'];
    $show_product_ajax = $product->show_product_ajax($brand_id);            
    if($show_product_ajax){while($resulta = $show_product_ajax->fetch_assoc()){            
    ?>
    <option value="<?php echo $resulta['product_id'] ?>"><?php echo $resulta['product_name'] ?></option>
    <?php
    }}
?>
<?php
    $product_id = $_GET['product_id'];
    $show_product_price_ajax = $product->show_product_price_ajax($product_id);            
    if($show_product_price_ajax){while($resulta = $show_product_price_ajax->fetch_assoc()){            
    ?>
    <option><?php echo $resulta['product_price'] ?></option>
    <?php
    }}
?>

