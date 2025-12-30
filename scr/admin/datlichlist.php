<?php
include "header.php";
include "slider.php";
include "../copy_productClass.php";
$product = new product;
$show_datlich = $product->show_datLich();
?>

<div class="admin-contentRight">
    <div class="admin-contentRight-category_list">
    <table>
        <h1>Danh sách người dùng đặt lịch</h1>
        <tr>
            <th>Stt</th>
            <th>Mã dịch vụ</th>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Biển số xe</th>
            <th>Hãng xe</th>
            <th>Mẫu xe</th>
            <th>Dịch vụ</th>
            <th>Ngày sửa chữa</th>
            <th>Giá dịch vụ</th>
        </tr>
        <?php
        if ($show_datlich) {
            $i = 0;
            while ($result = $show_datlich->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['datlich_id'] ?></td>
                    <td><?php echo $result['hoten'] ?></td>
                    <td><?php echo $result['sdt'] ?></td>
                    <td><?php echo $result['biensoxe'] ?></td>
                    <td><?php echo $result['category_name'] ?></td>
                    <td><?php echo $result['brand_name'] ?></td>
                    <td><?php echo $result['product_name'] ?></td>
                    <td><?php echo $result['ngaybd'] ?></td>
                    <td><?php echo $result['product_price'] ?></td>
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