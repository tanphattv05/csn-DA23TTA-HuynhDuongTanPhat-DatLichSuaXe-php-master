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
?>
<?php
$product = new product;
$datlich_id = $_GET['datlich_id'];
$get_datlich = $product->get_datlich($datlich_id);
if ($get_datlich) {
    $resultdl = $get_datlich->fetch_assoc();

    // Chỉ cho phép sửa lịch của chính tài khoản đang đăng nhập
    if (!isset($_SESSION['user']['id']) || $resultdl['user_id'] != $_SESSION['user']['id']) {
        header("Location: lsBaoDuong.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $biensoxe = $_POST['biensoxe'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $product_id = $_POST['product_id'];
    $ngaybd = $_POST['ngaybd'];
    $product_price = $_POST['product_price'];
    $update_lichBaoDuong = $product->update_lichBaoDuong($datlich_id, $hoten, $sdt, $biensoxe, $category_id, $brand_id, $product_id, $ngaybd, $product_price);
}
?>

<div class="grid_datLich">
    <div class="grid__row khung">
        <form class="form_dat_lich" method="post" enctype="multipart/form-data" onsubmit="return ktDL()">
            <div class="o__dki">
                <div class="o__dki--dki" style="
                background-color: #e2e2e2;
                color: black;
                font-size: 30px;
                font-weight: 900; 
                text-align:center; 
                margin-top:50px;">Sửa lịch đặt</div>
            </div>
            <!-- Họ và Tên -->
            <div class="mb-3">
                <label for="fullName" class="form-label">Họ và tên:</label>
                <input name="hoten" type="text" class="form-select" id="fullName" placeholder="Nhập họ và tên" required value="<?php echo $resultdl['hoten'] ?>">
            </div>

            <!-- Số điện thoại -->
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Số điện thoại:</label>
                <input name="sdt" type="tel" class="form-select" id="phoneNumber" placeholder="Nhập số điện thoại" required value="<?php echo $resultdl['sdt'] ?>">
            </div>

            <!-- Biển số xe -->
            <div class="mb-3">
                <label for="licensePlate" class="form-label">Biển số xe:</label>
                <input name="biensoxe" type="text" class="form-select" id="licensePlate" placeholder="Nhập biển số xe" required value="<?php echo $resultdl['biensoxe'] ?>">
            </div>

            <!-- Chọn hãng xe -->
            <div class="mb-3">
                <label for="carBrand" class="form-label">Chọn hãng xe:</label>
                <select name="category_id" class="form-select" id="category_id" required>
                    <option selected disabled value="">Chọn...</option>
                    <?php
                    $show_category = $product->show_category();
                    if ($show_category) {
                        while ($result = $show_category->fetch_assoc()) {
                    ?>
                            <option <?php if ($resultdl['category_id'] == $result['category_id']) {
                                        echo "selected";
                                    } ?> value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- Chọn mẫu xe -->
            <div class="mb-3">
                <label for="carModel" class="form-label">Chọn mẫu xe:</label>
                <select name="brand_id" class="form-select" id="brand_id" required>
                    <?php
                    $category_id = $resultdl['category_id']; // Lấy category_id từ dữ liệu sửa
                    $show_brand = $product->show_brand_by_category($category_id); // Lọc brand theo category
                    if ($show_brand) {
                        while ($result = $show_brand->fetch_assoc()) {
                    ?>
                            <option value="<?php echo $result['brand_id']; ?>"
                                <?php if ($result['brand_id'] == $resultdl['brand_id']) {
                                    echo "selected";
                                } ?>>
                                <?php echo $result['brand_name']; ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- Chọn dịch vụ -->
            <div class="mb-3">
                <label for="serviceType" class="form-label">Chọn dịch vụ:</label>
                <select name="product_id" class="form-select" id="product_id" required>
                    <?php
                    $brand_id = $resultdl['brand_id']; // Lấy brand_id từ dữ liệu sửa
                    $show_brand = $product->show_brand_by_brand($brand_id); // Lọc product theo brand
                    if ($show_brand) {
                        while ($result = $show_brand->fetch_assoc()) {
                    ?>
                            <option value="<?php echo $result['product_id']; ?>"
                                <?php if ($result['product_id'] == $resultdl['product_id']) {
                                    echo "selected";
                                } ?>>
                                <?php echo $result['product_name']; ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="appointmentDate" class="form-label">Ngày sửa chữa:</label>
                <input name="ngaybd" type="date" class="form-control" id="appointmentDate" required value="<?php echo $resultdl['ngaybd'] ?>">
            </div>
            <div class="mb-3">
                <label for="priceDisplay" class="form-label">Chi phí:</label><br>
                <select name="product_price" class="form-select" id="product_price" required>
                    <?php
                    $product_id = $resultdl['product_id'];
                    $show_product = $product->show_price_by_product($product_id);
                    if ($show_product) {
                        while ($result = $show_product->fetch_assoc()) {
                    ?>
                            <option value="<?php echo $result['product_price']; ?>"
                                <?php if ($result['product_id'] == $resultdl['product_id']) {
                                    echo "selected";
                                } ?>>
                                <?php echo $result['product_price']; ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>


            <!-- Nút đặt lịch -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Sửa</button>
            </div>
        </form>
    </div>
</div>
<script>
    /*Bắt sự kiện */
    $(document).ready(function() {
        $("#category_id").change(function() {
            // alert($(this).val())
            var x = $(this).val();
            $.get("ajax.php", {
                category_id: x
            }, function(data) {
                $("#brand_id").html('<option value="" disabled selected>Chọn mẫu xe</option>');
                $("#brand_id").append(data);
            })
        })
    })
    $(document).ready(function() {
        $("#brand_id").change(function() {
            var x = $(this).val();
            $.get("ajax.php", {
                brand_id: x
            }, function(data) {
                $("#product_id").html('<option value="" disabled selected>Chọn dịch vụ</option>');
                $("#product_id").append(data);
            })
        })
    })
    $(document).ready(function() {
        $("#product_id").change(function() {
            var x = $(this).val();
            $.get("ajax.php", {
                product_id: x
            }, function(data) {
                $("#product_price").html(data)
            })
        })
    })
</script>
<?php
include "footer.php";
?>