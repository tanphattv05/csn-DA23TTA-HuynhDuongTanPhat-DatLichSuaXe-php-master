function kt(){
    const ten = document.getElementById('name').value.trim();
    const userName = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const matkhau = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmPassword').value.trim();
    function ktEmail(email) {
        const regex = /^[a-zA-Z0-9._-]+@gmail+\.[a-zA-Z]{2,6}$/;
        return regex.test(email);
    }
    function ktMatKhau(matkhau){
        if (matkhau.length > 8){
            return true;
        }else return false;
    }
    if (!ktEmail(email)) {
        alert("Địa chỉ email không hợp lệ");
        return false;
    }
    if (!ktMatKhau(matkhau)) {
        alert("Mật khẩu phải có ít nhất 8 ký tự");
        return false;
    }
    if (matkhau !== confirmPassword) {
        alert("Mật khẩu và xác nhận mật khẩu không khớp");
        return false;
    }
    return true;
}