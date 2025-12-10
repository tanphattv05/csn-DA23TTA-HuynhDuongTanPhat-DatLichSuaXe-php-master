<?php
include "header_index.php";
include "connnect.php";
include "copy_productClass.php";
?>
<?php
$product = new product;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ktDK = $product->ktDK();
    if ($ktDK) {
        echo "<script>
                alert('Tài khoản đã tồn tại!');
                window.location.href = 'register.php';
            </script>";
    } else {
        echo "<script>
                alert('Đăng ký thành công.');
                window.location.href = 'login.php';
            </script>";
        $insert_user = $product->insert_user($_POST);
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
        font-size: 1.6rem;
    }

    .button {
        width: 100%;
        padding: 10px;
        background-color: #186d2b;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1.6rem;
    }

    .button:hover {
        background-color: #218838;
    }

    .error {
        color: red;
        font-size: 1.2rem;
        margin-top: -10px;
        margin-bottom: 10px;
    }
</style>
<div class="grid">
    <div class="form-container">
        <form id="registrationForm" method="post" enctype="multipart/form-data" onsubmit="return kt()">
            <h2>Đăng ký</h2>
            <label class="label" for="name">Tên người dùng:</label>
            <input name="ten" class="input" type="text" id="name" placeholder="Nhập tên người dùng" required>

            <label class="label" for="username">Tên đăng nhập:</label>
            <input name="user_name" class="input" type="text" id="username" placeholder="Nhập tên đăng nhập" required>
            <span class="error" id="usernameError"></span>

            <label class="label" for="email">Email:</label>
            <input name="email" class="input" type="email" id="email" placeholder="Nhập email" required>
            <span class="error" id="emailError"></span>

            <label class="label" for="password">Mật khẩu:</label>
            <input name="matkhau" class="input" type="password" id="password" placeholder="Nhập mật khẩu" required>
            <span class="error" id="passwordError"></span>

            <label class="label" for="confirmPassword">Xác nhận mật khẩu:</label>
            <input class="input" type="password" id="confirmPassword" placeholder="Xác nhận mật khẩu" required>
            <span class="error" id="confirmPasswordError"></span>

            <button class="button" id="btnlogin" type="submit">Đăng ký</button>
        </form>
    </div>
</div>
<script src="login.js"></script>


<?php
include "footer.php";
?>