<?php
include "connnect.php";
include 'header_index.php';
require_once('../scr/admin/database.php');
// Lấy từ khóa từ ô tìm kiếm
$search_query = isset($_GET['search_query']) ? trim($_GET['search_query']) : '';

// Kiểm tra nếu có từ khóa
if ($search_query !== '') {

    // truy vấn SQL để tìm kiếm theo product_name hoặc category_name
    $sql = "SELECT * FROM tbl_product 
    INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
    INNER JOIN tbl_category ON tbl_product.category_id = tbl_category.category_id
    WHERE tbl_product.product_name LIKE '%$search_query%' 
    OR tbl_brand.brand_name LIKE '%$search_query%'
    OR tbl_category.category_name LIKE '%$search_query%'
    ORDER BY tbl_product.product_id DESC";
} else {
    // Nếu không có từ khóa, hiển thị mặc định
    $sql = "SELECT * FROM tbl_product 
            INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
            ORDER BY tbl_product.product_id DESC";
}
$result = $conn->query($sql);
?>

<div class="grid">
    <h1>Kết quả tìm kiếm liên quan đến '<?php echo $search_query ?>'</h1>
    <div class="grid__row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="grid__column-2-4">
                    <div class="service-card">
                        <img src="<?php echo $row['product_img']; ?>" alt="Dịch vụ <?php echo $row['product_name']; ?>" class="service-image">
                        <div class="service-content">
                            <h3 class="service-title"><?php echo $row['product_name']; ?></h3>
                            <p class="service-price">Giá: <?php echo $row['product_price']; ?> VNĐ</p>
                            <p style="color: #000;" class="service-price">Thời gian bảo dưỡng: <?php echo $row['product_time']; ?> phút</p>
                            <p style="color: #e67e22;" class="service-price">Mẫu xe: <?php echo $row['brand_name']; ?></p>
                            <p style="color: #333;" class="service-price">Phụ tùng <?php echo $row['product_phuTung']; ?></p>
                            <div class="service-buttons">
                                <button class="service-button book-now" onclick="bookService()">Đặt Lịch</button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "Không tìm thấy dịch vụ nào.";
        }
        $conn->close();
        ?>
    </div>
</div>
<?php
include "footer.php";
?>