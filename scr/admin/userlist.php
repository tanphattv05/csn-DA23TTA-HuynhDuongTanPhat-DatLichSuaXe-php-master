<?php
include "header.php";
include "slider.php";
include "../copy_productClass.php";
$product = new product;
$show_user = $product->show_user();
?>

<div class="admin-contentRight">
    <div class="admin-contentRight-category_list">
    <table>
        <h1>Danh sách tài khoản đăng ký</h1>
        <tr>
            <th>Stt</th>
            <th>ID người dùng</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Tên tài khoản</th>
            <th>Mật khẩu</th>
            <th>Thao tác</th>
        </tr>
        <?php
        if ($show_user) {
            $i = 0;
            while ($result = $show_user->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['user_id'] ?></td>
                    <td><?php echo $result['ten'] ?></td>
                    <td><?php echo $result['email'] ?></td>
                    <td><?php echo $result['user_name'] ?></td>
                    <td><?php echo $result['matkhau'] ?></td>
                    <td><a href="userDelete.php?user_id=<?php echo $result['user_id'] ?>">Xóa</a></td>
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