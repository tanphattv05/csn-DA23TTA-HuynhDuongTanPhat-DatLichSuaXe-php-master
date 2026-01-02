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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $insert_lichSuaChua = $product->insert_lichSuaChua($_POST);
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
                margin-top:50px;">Đặt lịch</div>
            </div>
            <!-- Họ và Tên -->
            <div class="mb-3">
                <label for="fullName" class="form-label">Họ và tên:</label>
                <input name="hoten" type="text" class="form-select" id="fullName" placeholder="Nhập họ và tên" required>
            </div>

            <!-- Số điện thoại -->
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Số điện thoại:</label>
                <input name="sdt" type="tel" class="form-select" id="phoneNumber" placeholder="Nhập số điện thoại" required>
            </div>

            <!-- Biển số xe -->
            <div class="mb-3">
                <label for="licensePlate" class="form-label">Biển số xe:</label>
                <input name="biensoxe" type="text" class="form-select" id="licensePlate" placeholder="VD: 84K5-12345 " required>
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
                            <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
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
                    <option selected disabled value="">Chọn...</option>
                </select>
            </div>

            <!-- Chọn dịch vụ -->
            <div class="mb-3">
                <label for="serviceType" class="form-label">Chọn dịch vụ:</label>
                <select name="product_id" class="form-select" id="product_id" required>
                    <option selected disabled value="">Chọn...</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="appointmentDate" class="form-label">Ngày sửa chữa:</label>
                <input name="ngaybd" type="date" class="form-control" id="appointmentDate" required>
            </div>
            <div class="mb-3">
                <label for="priceDisplay" class="form-label">Chi phí:</label><br>
                <select name="product_price" class="form-select" id="product_price" required>
                </select>
            </div>


            <!-- Nút đặt lịch -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Đặt lịch</button>
            </div>
        </form>
    </div>
</div>
<script>
(function(){
  function getParam(name){
    try{
      return new URL(window.location.href).searchParams.get(name);
    }catch(e){
      return null;
    }
  }

  function loadBrands(categoryId, selectedBrandId){
    return $.get("ajax.php", { category_id: categoryId }, function(html){
      $("#brand_id")
        .html('<option value="" disabled selected>Chọn mẫu xe</option>')
        .append(html);
      if (selectedBrandId) $("#brand_id").val(selectedBrandId);
    });
  }

  function loadProducts(brandId, selectedProductId){
    return $.get("ajax.php", { brand_id: brandId }, function(html){
      $("#product_id")
        .html('<option value="" disabled selected>Chọn dịch vụ</option>')
        .append(html);
      if (selectedProductId) $("#product_id").val(selectedProductId);
    });
  }

  function loadPrice(productId){
    return $.get("ajax.php", { product_id: productId }, function(html){
      $("#product_price").html(html);
    });
  }

  $(function(){

    // 1) Cascading selects (bình thường)
    $("#category_id").on("change", function(){
      const categoryId = $(this).val();
      $("#brand_id").html('<option value="" disabled selected>Chọn mẫu xe</option>');
      $("#product_id").html('<option value="" disabled selected>Chọn dịch vụ</option>');
      $("#product_price").html('');
      if (!categoryId) return;
      loadBrands(categoryId, null);
    });

    $("#brand_id").on("change", function(){
      const brandId = $(this).val();
      $("#product_id").html('<option value="" disabled selected>Chọn dịch vụ</option>');
      $("#product_price").html('');
      if (!brandId) return;
      loadProducts(brandId, null);
    });

    $("#product_id").on("change", function(){
      const productId = $(this).val();
      if (!productId){ $("#product_price").html(''); return; }
      loadPrice(productId);
    });

    // 2) Prefill: tự chọn sẵn theo link datLich.php?category_id=...&brand_id=...&product_id=...
    const preCategory = getParam("category_id");
    const preBrand    = getParam("brand_id");
    const preProduct  = getParam("product_id");

    if (preCategory){
      $("#category_id").val(preCategory);

      loadBrands(preCategory, preBrand)
        .then(function(){
          if (!preBrand) return;
          return loadProducts(preBrand, preProduct);
        })
        .then(function(){
          if (!preProduct) return;
          return loadPrice(preProduct);
        });
    }
  });
})();
</script>
<?php
include "footer.php";
?>