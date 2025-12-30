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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản trị</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin-login-page">
    <main class="admin-login" aria-label="Đăng nhập quản trị">
        <div class="admin-login__shell">
            <!-- PANEL TRÁI: FORM -->
            <section class="admin-login__panel admin-login__panel--form">
                <div class="admin-login__brand">
                    <div class="admin-login__logo" aria-hidden="true">🛠️</div>
                    <div class="admin-login__brandText">
                        <h1 class="admin-login__title">Đăng nhập Admin</h1>
                        <p class="admin-login__subtitle">Quản trị hệ thống đặt lịch sửa xe</p>
                    </div>
                </div>

                <?php if (!empty($err)): ?>
                    <div class="admin-login__alert" role="alert">
                        <?php echo htmlspecialchars($err, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>

                <form class="admin-login__form" action="" method="POST" autocomplete="off">
                    <label class="admin-login__field">
                        <span class="admin-login__label">Tài khoản</span>
                        <span class="admin-login__control">
                            <span class="admin-login__icon" aria-hidden="true">👤</span>
                            <input class="admin-login__input" type="text" name="username" id="username" required placeholder="Nhập tài khoản" autofocus>
                        </span>
                    </label>

                    <label class="admin-login__field">
                        <span class="admin-login__label">Mật khẩu</span>
                        <span class="admin-login__control">
                            <span class="admin-login__icon" aria-hidden="true">🔒</span>
                            <input class="admin-login__input" type="password" name="password" id="password" required placeholder="Nhập mật khẩu">
                            <button class="admin-login__toggle" type="button" aria-label="Hiện/ẩn mật khẩu" data-toggle-password>
                                👁️
                            </button>
                        </span>
                    </label>

                    <button class="admin-login__btn" type="submit">Đăng nhập</button>

                    <div class="admin-login__meta">
                        <a class="admin-login__link" href="../index.php">← Về trang khách</a>
                    </div>
                </form>
            </section>

            <!-- PANEL PHẢI: BRANDING (DESKTOP) -->
            <aside class="admin-login__panel admin-login__panel--side" aria-hidden="true">
                <div class="admin-login__sideInner">
                    <div class="admin-login__badge">SỬA CHỮA • ĐẶT LỊCH</div>
                    <h2 class="admin-login__sideTitle">Quản lý nhanh, thao tác gọn</h2>
                    <p class="admin-login__sideDesc">Đăng nhập để quản trị danh mục, sản phẩm, lịch đặt và người dùng trong hệ thống.</p>
                    <ul class="admin-login__sideList">
                        <li>✔ Theo dõi lịch đặt theo ngày</li>
                        <li>✔ Quản lý dịch vụ / hãng xe</li>
                        <li>✔ Cập nhật thông tin nhanh chóng</li>
                    </ul>
                    <div class="admin-login__orb" aria-hidden="true"></div>
                    <div class="admin-login__orb admin-login__orb--2" aria-hidden="true"></div>
                </div>
            </aside>
        </div>
    </main>

    <script>
      (function(){
        var btn = document.querySelector('[data-toggle-password]');
        var input = document.getElementById('password');
        if(!btn || !input) return;
        btn.addEventListener('click', function(){
          var isPw = input.type === 'password';
          input.type = isPw ? 'text' : 'password';
          btn.textContent = isPw ? '🙈' : '👁️';
        });
      })();
    </script>
</body>
</html>
