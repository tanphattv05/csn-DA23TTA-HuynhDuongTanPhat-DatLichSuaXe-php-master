<?php
include "header.php";
include "slider.php";
include "class/category_class.php"
?>
<?php
$category = new category;
if (!isset($_GET['category_id']) || $_GET['category_id'] == null) {
    echo "<script>window.location = 'categoryList.php'<?script>";
} else {
    $category_id = $_GET['category_id'];
}
$get_category = $category->get_category($category_id);
if ($get_category) {
    $result = $get_category->fetch_assoc();
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $category_name = $_POST['category_name'];
    $update_category = $category->update_category($category_name, $category_id);
}
?>
<div class="admin-contentRight">
    <div class="admin-contentRight-category_add">
        <h1>Thêm hãng xe</h1>
        <form action="" method="POST">
            <input require name="category_name" type="text" placeholder="Tên danh mục" value="<?php echo $result['category_name'] ?>">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
<?php
include "footer_admin.php";
?>
