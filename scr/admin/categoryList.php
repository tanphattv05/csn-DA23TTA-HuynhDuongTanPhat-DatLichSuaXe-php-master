<?php
include "header.php";
include "slider.php";
include "class/category_class.php"
?>
<?php
$category = new category;
$show_category = $category->show_category();
?>

<div class="admin-contentRight">
    <div class="admin-contentRight-category_list">
        <h1>Danh sách hãng xe</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Danh mục</th>
                <th>Thao tác</th>
            </tr>
            <?php
            if ($show_category) {
                $i = 0;
                while ($result = $show_category->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['category_id'] ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td><a href="categoryEdit.php?category_id=<?php echo $result['category_id'] ?>">Sửa</a>/<a href="categoryDelete.php?category_id=<?php echo $result['category_id'] ?>">Xóa</a></td>
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