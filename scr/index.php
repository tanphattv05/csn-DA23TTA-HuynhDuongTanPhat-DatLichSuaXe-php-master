<?php
include "header_index.php";
include "connnect.php";
require_once('../scr/admin/database.php');
$db = new Database;
$db->connectDB();
?>

<div class="container">
    <div class="grid">
        <div class="swiper">
            <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" navigation="true" space-between="30"
                centered-slides="true" autoplay-delay="2200" autoplay-disable-on-interaction="false">
                <swiper-slide><img src="img/anh_suaxemay.jpg" alt=""></swiper-slide>
                <swiper-slide><img src="img/anh_suaxemay3.jpg" alt=""></swiper-slide>
                <swiper-slide><img src="img/banner_shell.jpg" alt=""></swiper-slide>
                <swiper-slide><img src="img/banner_rector.png" alt=""></swiper-slide>
                <swiper-slide><img src="img/banner_gs.png" alt=""></swiper-slide>
            </swiper-container>
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        </div>
        <div class="header-product">
            <h1 style="margin-left: 12px;">Dịch vụ nổi bật:</h1>
            <a class="xemTatCa" href="dichVu.php">Xem tất cả →</a>
        </div>
        <div class="grid">
            <div class="grid__row">
                <?php
                $sql = "SELECT * FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
            ORDER BY tbl_product.product_id DESC limit 8";
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
                $conn->close();
                ?>
            </div>
        </div>
    </div>

</div>
<?php
include "footer.php";
?>