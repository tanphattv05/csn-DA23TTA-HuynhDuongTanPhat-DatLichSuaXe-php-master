<?php
include "header.php";
include "slider.php";
include "class/category_class.php"
?>
<?php
$category = new category;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $category_name = $_POST['category_name'];
    $insert_category = $category->insert_category($category_name);
}
?>

<div class="admin-contentRight">
    <div class="admin-contentRight-category_add">
        <h1>Thêm hãng xe</h1>
        <form action="" method="POST">
            <input require name="category_name" type="text" placeholder="Tên danh mục">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
<script src="kiemLoi.js"></script>
<?php
include "footer_admin.php";
?>
