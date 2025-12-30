<?php
include "header_index.php";
include "connnect.php";
require_once('../scr/admin/database.php');
$db = new Database;
$db->connectDB();
?>
<h1 style="background:#FFF; text-align:center;font-size:5rem;">Dịch vụ sửa chữa</h1>
<div class="container">
    <div class="honda" id="honda">
        <div class="grid">
            <h1>Dịch vụ sửa chữa các mẫu xe của Honda</h1>
            <div class="grid__row">
                <?php
                $sql = "SELECT * FROM tbl_product 
                INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
                WHERE tbl_product.category_id = 19
                ORDER BY tbl_product.product_id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="grid__column-2-4">
                            <div class="service-card">
                                <img src="<?php echo $row['product_img']; ?>" alt="Dịch vụ <?php echo $row['product_name']; ?>" class="service-image">
                                <div class="service-content">
                                    <h3 class="service-title"><?php echo $row['product_name']; ?></h3>
                                    <p class="service-price">Giá: <?php echo $row['product_price']; ?> VNĐ</p>
                                    <p style="color: #000;" class="service-price">Thời gian sửa chữa: <?php echo $row['product_time']; ?> phút</p>
                                    <p style="color: #e67e22;" class="service-price">Mẫu xe: <?php echo $row['brand_name']; ?></p>
                                    <p style="color: #333;" class="service-price">Phụ tùng: <?php echo $row['product_phuTung']; ?></p>
                                    <div class="service-buttons">
                                        <!-- <button class="service-button book-now"><a href="datLich.php" style="text-decoration: none; color: white;">Đặt Lịch</a></button> -->
                                        <a href="datLich.php" class="service-button book-now" style="text-decoration: none; color: white; height: 100%; width:100%;">Đặt Lịch</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "Không có dịch vụ nào.";
                }
                // $conn->close();
                ?>
            </div>
        </div>
    </div>
    <div class="yamaha" id="yamaha">
        <div class="grid">
            <h1>Dịch vụ sửa chữa các mẫu xe của Yamaha</h1>
            <div class="grid__row">
                <?php
                $sql = "SELECT * FROM tbl_product 
                INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
                WHERE tbl_product.category_id = 12
                ORDER BY tbl_product.product_id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="grid__column-2-4">
                            <div class="service-card">
                                <img src="<?php echo $row['product_img']; ?>" alt="Dịch vụ <?php echo $row['product_name']; ?>" class="service-image">
                                <div class="service-content">
                                    <h3 class="service-title"><?php echo $row['product_name']; ?></h3>
                                    <p class="service-price">Giá: <?php echo $row['product_price']; ?> VNĐ</p>
                                    <p style="color: #000;" class="service-price">Thời gian sửa chữa: <?php echo $row['product_time']; ?> phút</p>
                                    <p style="color: #e67e22;" class="service-price">Mẫu xe: <?php echo $row['brand_name']; ?></p>
                                    <p style="color: #333;" class="service-price">Phụ tùng: <?php echo $row['product_phuTung']; ?></p>
                                    <div class="service-buttons">
                                        <a href="datLich.php" class="service-button book-now" style="text-decoration: none; color: white; height: 100%; width:100%;">Đặt Lịch</a>
                                        <!-- <button class="service-button view-details" onclick="viewDetails()">Xem Chi Tiết</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "Không có dịch vụ nào.";
                }
                // $conn->close();
                ?>
            </div>
        </div>
    </div>
    </div>
    <div class="suzuki" id="suzuki">
        <div class="grid">
            <h1>Dịch vụ sửa chữa các mẫu xe của Suzuki</h1>
            <div class="grid__row">
                <?php
                $sql = "SELECT * FROM tbl_product 
                INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
                WHERE tbl_product.category_id = 11
                ORDER BY tbl_product.product_id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="grid__column-2-4">
                            <div class="service-card">
                                <img src="<?php echo $row['product_img']; ?>" alt="Dịch vụ <?php echo $row['product_name']; ?>" class="service-image">
                                <div class="service-content">
                                    <h3 class="service-title"><?php echo $row['product_name']; ?></h3>
                                    <p class="service-price">Giá: <?php echo $row['product_price']; ?> VNĐ</p>
                                    <p style="color: #000;" class="service-price">Thời gian sửa chữa: <?php echo $row['product_time']; ?> phút</p>
                                    <p style="color: #e67e22;" class="service-price">Mẫu xe: <?php echo $row['brand_name']; ?></p>
                                    <p style="color: #333;" class="service-price">Phụ tùng: <?php echo $row['product_phuTung']; ?></p>
                                    <div class="service-buttons">
                                        <a href="datLich.php" class="service-button book-now" style="text-decoration: none; color: white; height: 100%; width:100%;">Đặt Lịch</a>
                                        <!-- <button class="service-button view-details" onclick="viewDetails()">Xem Chi Tiết</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "Không có dịch vụ nào.";
                }
                // $conn->close();
                // 
                ?>
            </div>
        </div>
    </div>   
</div>
<?php
include "footer.php";
?>