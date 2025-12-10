<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
$product_id = $_GET['product_id'];
$get_product = $product->get_product($product_id);
if ($get_product) {
    $resulta = $get_product->fetch_assoc();
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $product_id = $_GET['product_id'];
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $product_price = $_POST['product_price'];
    $product_time = $_POST['product_time'];
    $product_vatTu = $_POST['product_vatTu'];

    // Lấy ảnh cũ từ cơ sở dữ liệu
    $get_product = $product->get_product($product_id);
    if ($get_product) {
        $resulta = $get_product->fetch_assoc();
        $old_product_img = $resulta['product_img'];
    }

    // Xử lý file ảnh mới (nếu có)
    if (isset($_FILES['product_img']) && $_FILES['product_img']['error'] === UPLOAD_ERR_OK) {
        // Thư mục lưu ảnh
        $uploadDir1 = "uploads/";
        $uploadDir2 = "imgad/";
        $fileName = basename($_FILES['product_img']['name']);

        // Đường dẫn file
        $filePath1 = $uploadDir1 . $fileName;
        $filePath2 = $uploadDir2 . $fileName;


        // Lưu file ảnh vào thư mục 1
        $fileSaved1 = move_uploaded_file($_FILES['product_img']['tmp_name'], $filePath1);

        // Sao chép ảnh sang thư mục 2 nếu lưu thành công ở thư mục 1
        $fileSaved2 = false;
        if ($fileSaved1) {
            $fileSaved2 = copy($filePath1, $filePath2);
        }

        // Kiểm tra việc lưu file
        if ($fileSaved1 && $fileSaved2) {
            $product_img = $filePath1; // Đường dẫn ảnh được lưu
        } else {
            echo "Lỗi khi lưu file ảnh!";
            $product_img = $old_product_img; // Dùng ảnh cũ nếu lưu thất bại
        }
    } else {
        $product_img = $old_product_img; // Nếu không upload ảnh mới, giữ nguyên ảnh cũ
    }

    // Gọi hàm update_product
    $update_product = $product->update_product(
        $product_id,
        $product_name,
        $category_id,
        $brand_id,
        $product_price,
        $product_time,
        $product_vatTu,
        $product_img
    );
}
?>

<div class="admin-contentRight">
    <div class="admin-contentRight-product_add">
        <h1>Sửa dịch vụ</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input name="product_name" require type="text" value="<?php echo $resulta['product_name'] ?>">
            <select name="category_id" id="category_id">
                <option value="#">Chọn hãng xe</option>
                <?php
                $show_category = $product->show_category();
                if ($show_category) {
                    while ($result = $show_category->fetch_assoc()) {
                ?>
                        <option <?php if ($resulta['category_id'] == $result['category_id']) {
                                    echo "selected";
                                } ?> value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <select name="brand_id" id="brand_id">
                <option value="#">Chọn mẫu xe</option>
                <?php
                $category_id = $resulta['category_id']; // Lấy category_id từ dữ liệu sửa
                $show_brand = $product->show_brand_by_category($category_id); // Lọc brand theo category
                if ($show_brand) {
                    while ($result = $show_brand->fetch_assoc()) {
                ?>
                        <option value="<?php echo $result['brand_id']; ?>"
                            <?php if ($result['brand_id'] == $resulta['brand_id']) {
                                echo "selected";
                            } ?>>
                            <?php echo $result['brand_name']; ?>
                        </option>
                <?php
                    }
                }
                ?>
            </select>
            <input name="product_price" require type="text" value="<?php echo $resulta['product_price'] ?>">
            <input name="product_time" require type="text" value="<?php echo $resulta['product_time'] ?>">
            <input name="product_vatTu" require type="text" value="<?php echo $resulta['product_vatTu'] ?>">
            <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
            <input type="hidden" value="<?php echo $resulta['product_imgad'] ?>" name="product_img">
            <input name="product_img" require type="file">
            <img src="<?php echo $resulta['product_imgad'] ?>" alt="">
            <?php if (isset($update_product)) {
                echo $update_product;
            } ?>
            <button type="submit">Sửa</button>
        </form>
    </div>
</div>
<script>
    /*Bắt sự kiện */
    $(document).ready(function() {
        $("#category_id").change(function() {
            // alert($(this).val())
            var x = $(this).val();
            $.get("productAdd_ajax.php", {
                category_id: x
            }, function(data) {
                $("#brand_id").html(data)
            })
        })
    })
</script>

</section>
<?php
include "footer_admin.php";
?>