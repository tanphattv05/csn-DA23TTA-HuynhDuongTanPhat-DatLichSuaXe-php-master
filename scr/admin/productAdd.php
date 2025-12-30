<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // var_dump($_POST,$_FILES);
    $insert_product = $product->insert_product($_POST, $_FILES);
    $fileName = $_FILES['product_img']['name'];
    if (move_uploaded_file($_FILES['product_img']['tmp_name'], "../uploads/$fileName")) {
        copy("../uploads/$fileName", "imgad/$fileName");
    }
    $urlimages = $_FILES['product_img']['name'];
}

?>

<div class="admin-contentRight">
    <div class="admin-contentRight-product_add">
        <h1>Thêm dịch vụ</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input name="product_name" require type="text" placeholder="Tên dịch vụ">
            <select name="category_id" id="category_id" require>
                <option value="">Chọn hãng xe</option>
                <?php
                $show_category = $product->show_category();
                if ($show_category) {
                    while ($result = $show_category->fetch_assoc()) {
                ?>
                        <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
            <select name="brand_id" id="brand_id" require>
                <option value="" selected>Chọn mẫu xe</option>

            </select>
            <input name="product_price" require type="text" placeholder="Giá dịch vụ">
            <input name="product_time" require type="text" placeholder="Thời gian sửa chữa">
            <input name="product_phuTung" require type="text" placeholder="Phụ tùng">
            <label for="">Ảnh sản phẩm(Chỉ chọn file jgp, png, webp)</label>
            <input name="product_img" require type="file" style="margin-top: 10px; padding-top:0; ">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
<script src="kiemLoi.js"></script>

<script>
    /*Bắt sự kiện */
    $(document).ready(function() {
        $("#category_id").change(function() {
            // alert($(this).val())
            var x = $(this).val();
            $.get("productAdd_ajax.php", {
                category_id: x
            }, function(data) {
                $("#brand_id").html('<option value="" selected>Chọn mẫu xe</option>');
                $("#brand_id").append(data);
            })
        })
    })
</script>
</section>
<?php
include "footer_admin.php";
?>

