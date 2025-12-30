<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include "header_index.php";
include "connnect.php";
include "copy_productClass.php";
$product = new product;
$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
$show_datlich = $product->show_datLich($userId);
?>
<div class="grid">
    <table>
        <tr>
            <th>Stt</th>
            <th>Mã dịch vụ</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Biển số xe</th>
            <th>Hãng xe</th>
            <th>Mẫu xe</th>
            <th>Dịch vụ</th>
            <th>Ngày sửa chữa</th>
            <th>Chi phí</th>
            <th>Hoạt động</th>
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
                    <td><a class="thaotac" href="editLich.php?datlich_id=<?php echo $result['datlich_id'] ?>">Sửa</a>/<a class="thaotachuy" href="deleteLich.php?datlich_id=<?php echo $result['datlich_id'] ?>">Hủy</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</div>
<?php
include "footer.php";
?>