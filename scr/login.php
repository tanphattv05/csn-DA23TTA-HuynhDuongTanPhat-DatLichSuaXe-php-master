<?php
include "header_index.php";
include "connnect.php";
include "copy_productClass.php";
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new product();
    $ktDN = $product->ktDN();
    if ($ktDN) {
        echo "<script>
                alert('Đăng nhập thành công!');
                window.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Tên đăng nhập hoặc mật khẩu không chính xác.');
                window.location.href = 'login.php';
            </script>";
    }
}

?>
<style>
    .form-container {
        background-color: rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.7);
        width: 100%;
        max-width: 400px;
        margin: auto;
        margin-top: 20px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        font-size: 1.6rem;
    }

    .input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #000000ff;
        border-radius: 4px;
        font-size: 16px;
    }

    .button {
        width: 100%;
        padding: 10px;
        background-color: #186d2b;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        font-size: 1.6rem;
    }

    .button:hover {
        background-color: #218838;
    }

    .error {
        color: red;
        font-size: 0.9em;
        margin-top: -10px;
        margin-bottom: 10px;
    }
</style>
<div class="grid">
    <div class="form-container">
        <form id="registrationForm" method="post">
            <h2>Đăng nhập</h2>
            <label class="label" for="username">Tên đăng nhập:</label>
            <input class="input" type="text" id="username" name="user_name" placeholder="Nhập tên đăng nhập" required>
            <span class="error" id="usernameError"></span>

            <label class="label" for="password">Mật khẩu:</label>
            <input class="input" type="password" id="password" name="matkhau" placeholder="Nhập mật khẩu" required>
            <span class="error" id="passwordError"></span>

            <button class="button" id="btnlogin" type="submit">Đăng nhập</button>

            <!-- ĐĂNG KÝ NGAY BÊN DƯỚI -->
            <div class="register-now">
                <span>Chưa có tài khoản?</span>
                <a href="register.php">Đăng ký ngay</a>
            </div>
            </form>

    </div>
</div>
<script src="login.js"></script>
<?php
include "footer.php";
?>