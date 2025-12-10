<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>
<?php
$brand = new brand;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $category_id = $_POST['category_id'];
    $brand_name = $_POST['brand_name'];
    $insert_brand = $brand->insert_brand($category_id, $brand_name);
}
?>
<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>
<div class="admin-contentRight">
    <div class="admin-contentRight-category_add">
        <h1>Thêm mẫu xe</h1><br>
        <form action="" method="POST">
            <select name="category_id" id="" require>
                <option value="#">--Chọn mẫu xe--</option>
                <?php
                $show_category = $brand->show_category();
                if ($show_category) {
                    while ($rusult = $show_category->fetch_assoc()) {

                ?>
                        <option value="<?php echo $rusult['category_id'] ?>"><?php echo $rusult['category_name'] ?></option>
                <?php
                    }
                }
                ?>
            </select><br>
            <input require name="brand_name" type="text" placeholder="Tên mẫu xe">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
<?php
include "footer_admin.php";
?>
