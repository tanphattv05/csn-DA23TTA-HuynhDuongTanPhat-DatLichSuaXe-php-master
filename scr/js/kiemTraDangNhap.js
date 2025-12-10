// // Hàm kiểm tra trạng thái đăng nhập
// function checkLoginStatus() {
//     return localStorage.getItem('loggedIn') === 'true'; // Trả về true nếu đã đăng nhập
// }

// // Hàm cập nhật giao diện
// function updateMenu() {
//     const login = document.getElementById('login');
//     const register = document.getElementById('register');
//     const logout = document.getElementById('logout');

//     if (checkLoginStatus()) {
//         // Đã đăng nhập
//         login.style.display = 'none';
//         register.style.display = 'none';
//         logout.style.display = 'block';
//     } else {
//         // Chưa đăng nhập
//         login.style.display = 'block';
//         register.style.display = 'block';
//         logout.style.display = 'none';
//     }
// }

// // Cập nhật giao diện khi tải trang
// updateMenu();

// // Xử lý khi người dùng nhấn vào Đăng nhập
// document.getElementById('btnlogin').addEventListener('click', function () {
//     localStorage.setItem('loggedIn', 'true'); // Lưu trạng thái đăng nhập
//     updateMenu(); // Cập nhật giao diện
// });

// // Xử lý khi người dùng nhấn vào Đăng xuất
// document.getElementById('logout').addEventListener('click', function () {
//     localStorage.setItem('loggedIn', 'false'); // Xóa trạng thái đăng nhập
//     updateMenu(); // Cập nhật giao diện
// });