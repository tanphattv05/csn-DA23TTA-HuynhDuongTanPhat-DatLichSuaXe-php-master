<?php
// Kết nối cơ sở dữ liệu
// include "connnect.php";
$conn = new mysqli('127.0.0.1', 'root', '', 'scr');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Hàm lấy danh sách các hãng xe
function getCarBrands($conn)
{
    $query = "SELECT * FROM tbl_category"; // Bảng tbl_category là bảng chứa thông tin hãng xe
    return $conn->query($query);
}

// Hàm lấy danh sách dịch vụ
function getServices($conn)
{
    $query = "SELECT * FROM tbl_service"; // Bảng tbl_service chứa thông tin dịch vụ
    return $conn->query($query);
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <footer class="footer">
  <div class="footer__container">
    <!-- Cột 1 -->
    <div class="footer__col">
      <h4 class="footer__heading">Cửa hàng sửa chữa xe máy</h4>
      <ul class="footer__list">
        <li><i class="fa-solid fa-location-dot"></i>Địa chỉ: Dừa đỏ 1, Nhị Long, Càng Long, Trà Vinh</li>
        <li><i class="fa-solid fa-phone"></i>Điện thoại: +84 394 340 411</li>
        <li><i class="fa-solid fa-envelope"></i>Email: datlichsuaxe@gmail.com</li>
      </ul>
    </div>

    <!-- Cột 2 -->
    <div class="footer__col">
      <h4 class="footer__heading">Giới thiệu</h4>
      <ul class="footer__list">
        <li><a href="index.php" class="footer__link">Trang chủ</a></li>
      </ul>
    </div>

    <!-- Cột 3 -->
    <div class="footer__col">
      <h4 class="footer__heading">Dịch vụ</h4>
      <ul class="footer__list">
        <li><a href="dichVu.php#honda" class="footer__link">Honda</a></li>
        <li><a href="dichVu.php#yamaha" class="footer__link">Yamaha</a></li>
        <li><a href="dichVu.php#suzuki" class="footer__link">Suzuki</a></li>
      </ul>
    </div>

    <!-- Cột 4 -->
    <div class="footer__col">
      <h4 class="footer__heading">Theo dõi</h4>
      <ul class="footer__list">
        <li class="footer__social">
          <img src="https://down-vn.img.susercontent.com/file/2277b37437aa470fd1c71127c6ff8eb5" alt="Facebook" class="footer__icon">
          <a href="https://facebook.com/61569511033047" class="footer__link">Facebook</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="footer__bottom">
    <p>© 2025 - Đồ án cơ sở ngành đặt lịch sửa chữa xe gắn máy</p>
  </div>
</footer>


</div>

<script src="js/login.js"></script>
<script src="js/sanPham.js"></script>
<script src="js/datLich.js"></script>
<script>
    document.getElementById('serviceType').addEventListener('change', function() {
        const serviceId = this.value;
        fetch(`get_service_price.php?service_id=${serviceId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('priceDisplay').value = `${data.price} VND`;
            })
            .catch(error => console.error('Lỗi:', error));
    });
</script>
</body>

</html>