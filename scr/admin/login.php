<?php
session_start();

// Nếu đã đăng nhập rồi thì về trang chủ admin
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Tài khoản admin mẫu - bạn có thể sửa lại cho phù hợp
    $adminUser = 'admin';
    $adminPass = '123456';

    if ($username === $adminUser && $password === $adminPass) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $err = 'Tài khoản hoặc mật khẩu không đúng!';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập quản trị</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
        }
        .admin-login-wrapper {
            width: 100%;
            max-width: 400px;
            margin: 80px auto;
            background: #fff;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .admin-login-wrapper h1 {
            text-align: center;
            margin-bottom: 16px;
        }
        .admin-login-wrapper .form-group {
            margin-bottom: 12px;
        }
        .admin-login-wrapper label {
            display: block;
            margin-bottom: 4px;
        }
        .admin-login-wrapper input[type="text"],
        .admin-login-wrapper input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .admin-login-wrapper button {
            width: 100%;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            background: #007bff;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
        }
        .admin-login-wrapper button:hover {
            opacity: 0.9;
        }
        .error {
            color: red;
            margin-bottom: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="admin-login-wrapper">
        <h1>Đăng nhập quản trị</h1>
        <?php if (!empty($err)): ?>
            <div class="error"><?php echo htmlspecialchars($err); ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Tài khoản</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</body>
</html>
