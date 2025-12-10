<?php
include "header.php";
include "slider.php";
include "class/brand_class.php"
?>
<?php
$brand = new brand;
$show_brand = $brand->show_brand();
?>
<div class="admin-contentRight">
    <div class="admin-contentRight-category_list">
        <h1>Danh sách mẫu xe</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Hãng xe</th>
                <th>Mẫu xe</th>
                <th>Thao tác</th>
            </tr>
            <?php
            if ($show_brand) {
                $i = 0;
                while ($result = $show_brand->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['brand_id'] ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td><?php echo $result['brand_name'] ?></td>
                        <td><a href="brandEdit.php?brand_id=<?php echo $result['brand_id'] ?>">Sửa</a>/<a href="brandDelete.php?brand_id=<?php echo $result['brand_id'] ?>">Xóa</a></td>
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