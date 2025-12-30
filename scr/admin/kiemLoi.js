document.addEventListener("DOMContentLoaded", function () {
    // Hàm kiểm tra form
    function validateForm(form) {
        let isValid = true;
        const inputs = form.querySelectorAll("input[require], select[require]");
        
        inputs.forEach(input => {
            const value = input.value.trim();

            // Kiểm tra nếu trường bị bỏ trống
            if (!value || value === "#") {
                isValid = false;
                alert(`Vui lòng nhập đầy đủ thông tin`);
                input.focus();
                return false;
            }

            // Kiểm tra các trường hợp đặc biệt
            if (input.name === "product_price" && isNaN(value)) {
                isValid = false;
                alert("Giá dịch vụ phải là một số hợp lệ");
                input.focus();
                return false;
            }

            if (input.name === "product_time" && isNaN(value)) {
                isValid = false;
                alert("Thời gian sửa chữa phải là một số hợp lệ");
                input.focus();
                return false;
            }
            
        });
        // alert("Thêm sản phẩm thành công.");
        return isValid;
    }

    // Gắn sự kiện vào tất cả các form
    const forms = document.querySelectorAll("form");
    forms.forEach(form => {
        form.addEventListener("submit", function (e) {
            if (!validateForm(form)) {
                e.preventDefault(); // Ngăn chặn gửi form nếu không hợp lệ
            }
        });
    });
});