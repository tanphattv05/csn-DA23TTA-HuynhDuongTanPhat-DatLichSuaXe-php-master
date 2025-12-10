<?php
    include "header.php";
    include "slider.php";
    include "class/product_class.php"
?>
<?php
     $product = new product;
     $show_product = $product -> show_product();

?>
<div class="admin-contentRight">
    <div class="admin-contentRight-category_list">
        <h1>Danh sách dịch vụ sửa chữa</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Dịch vụ</th>
                <th>Hãng xe</th>
                <th>Mẫu xe</th>
                <th>Giá</th>
                <th>Thời gian bảo dưỡng</th>
                <th>Vật tư bảo dưỡng</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
            <?php
                if ($show_product){$i=0;
                    while ($result = $show_product->fetch_assoc()){$i++;
            ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['product_id'] ?></td>
                            <td><?php echo $result['product_name'] ?></td>
                            <td><?php echo $result['category_name'] ?></td>
                            <td><?php echo $result['brand_name'] ?></td>                        
                            <td><?php echo $result['product_price'] ?></td>
                            <td><?php echo $result['product_time'] ?></td>
                            <td><?php echo $result['product_vatTu'] ?></td>
                            <td><img src="<?php echo $result['product_imgad'] ?>" alt=""></td>
                            <td><a href="productEdit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a>/<a href="productDelete.php?product_id=<?php echo $result['product_id'] ?>">Xóa</a></td>
                        </tr>
            <?php    
                    }
                }    
            ?>               
        </table>
    </div>
</div>
</section>
<?php
include "footer_admin.php";
?>