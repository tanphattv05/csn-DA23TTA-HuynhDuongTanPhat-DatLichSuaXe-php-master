<?php
include "header.php";
include "slider.php";
include "../copy_productClass.php";
$product = new product;
$show_lienhe = $product->show_lienhe();
?>

<div class="admin-contentRight">
    <div class="admin-contentRight-category_list">
    <table>
        <h1>Danh sách người dùng liên hệ</h1>
        <tr>
            <th>Stt</th>
            <th>Mã liên hệ</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Nội dung</th>
            <th>Thao tác</th>
        </tr>
        <?php
        if ($show_lienhe) {
            $i = 0;
            while ($result = $show_lienhe->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['lienhe_id'] ?></td>
                    <td><?php echo $result['tenlh'] ?></td>
                    <td><?php echo $result['emaillh'] ?></td>
                    <td><?php echo $result['noidung'] ?></td>
                    <td><a href="lienheDelete.php?lienhe_id=<?php echo $result['lienhe_id'] ?>">Xóa</a></td>
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