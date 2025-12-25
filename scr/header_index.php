<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="SHORTCUT ICON" href="img/logo_datlich1.png">
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/datLich.css">
    <link rel="stylesheet" href="css/sanPham.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/kiemTraDangNhap.js"></script>
    <title>Đặt lịch sửa xe</title>

    <style>
        /* Bạn có thể chuyển sang file css riêng nếu muốn */
        .header-search {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }
        .header-auth {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }
        .header-auth__name {
            font-weight: 500;
        }
        .header-auth__btn {
            padding: 6px 12px;
            border-radius: 4px;
            border: 1px solid #14426c;
            color: #14426c;
            background-color: #fff;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }
        .header-auth__btn--primary {
            background-color: #14426c;
            color: #fff;
        }
        .header-auth__btn:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="grid">
                <div class="header-logo">
                    <a href="index.php"><img src="img/logo_datlich1.png" alt="" class="img"></a>
                </div>

                <!-- MENU CHÍNH Ở GIỮA -->
                <nav class="header__nav">
                    <ul class="header__nav--list">
                        <li class="header--item"><a class="link" href="index.php">Trang chủ</a></li>
                        <li class="header--item hang">
                            <a class="link" href="dichVu.php">Dịch vụ</a>
                            <ul class="hang">
                                <a class="hang-link" href="dichVu.php#honda"><li class="hang-con">Honda</li></a>
                                <a class="hang-link" href="dichVu.php#yamaha"><li class="hang-con">Yamaha</li></a>
                                <a class="hang-link" href="dichVu.php#suzuki"><li class="hang-con">Suzuki</li></a>
                            </ul>
                        </li>
                        <li class="header--item"><a class="link" href="datLich.php">Đặt lịch</a></li>
                        <li class="header--item"><a class="link" href="lsBaoDuong.php">Lịch sử đặt lịch</a></li>
                        <li class="header--item"><a class="link" href="lienHe.php">Liên hệ</a></li>
                    </ul>
                </nav>

                <!-- BÊN PHẢI: Ô TÌM KIẾM + ĐĂNG NHẬP/ĐĂNG KÝ/ĐĂNG XUẤT -->
                <div class="header-search">
                    <div class="header_search">
                        <form action="search.php" method="GET" class="search-form">
                            <input type="text" name="search_query" class="search-input" placeholder="Tìm kiếm dịch vụ">
                            <button type="submit" class="search-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.398 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- KHỐI ĐĂNG NHẬP / ĐĂNG KÝ / ĐĂNG XUẤT BÊN PHẢI -->
                    <div class="header-auth">
                        <?php if (isset($_SESSION['user'])): ?>
                            <span class="header-auth__name">
                                Xin chào, 
                                <?php echo htmlspecialchars($_SESSION['user']['name'] ?? $_SESSION['user']['username'] ?? ''); ?>
                            </span>
                            <a class="header-auth__btn" href="logout.php">Đăng xuất</a>
                        <?php else: ?>
                            <a class="header-auth__btn" href="login.php">Đăng nhập</a>
                            <a class="header-auth__btn header-auth__btn--primary" href="register.php">Đăng ký</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>
