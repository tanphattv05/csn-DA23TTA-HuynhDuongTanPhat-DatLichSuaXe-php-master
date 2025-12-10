<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="SHORTCUT ICON" href="uploads/logo_datlich1.png">
    <title>Trang quản trị - Đặt lịch sửa xe</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="admin-header">
        <div class="admin-header__left">
            <div class="admin-logo"><span>Đặt Lịch Sửa Xe</span></div>
            <span class="admin-header__title">Hệ thống quản trị</span>
        </div>
        <div class="admin-header__right">
<?php if (isset($_SESSION['admin_username'])): ?>
            <span class="admin-header__user">Xin chào, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
            <a href="logout.php" class="admin-header__link">Đăng xuất</a>
<?php endif; ?>
        </div>
    </header>
