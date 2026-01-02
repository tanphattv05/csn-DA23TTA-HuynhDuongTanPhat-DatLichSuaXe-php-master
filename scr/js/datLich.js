function ktDL(){
  const phoneNumberInput   = document.querySelector('#phoneNumber');
  const licensePlateInput  = document.querySelector('#licensePlate');
  const appointmentDateVal = document.querySelector('#appointmentDate').value;

  // ✅ SĐT: 10-11 số
  const phoneRegex = /^[0-9]{10,11}$/;
  if (!phoneRegex.test(phoneNumberInput.value.trim())) {
    alert("Số điện thoại không hợp lệ. Vui lòng nhập từ 10 đến 11 chữ số.");
    return false;
  }

  // ✅ Biển số: hỗ trợ cả 2 kiểu
  // - 84K5-1234 / 84K5-12345
  // - 84KK-1234 / 84KK-12345
  const licensePlateRegex = /^[0-9]{2}(?:[A-Za-z][0-9]|[A-Za-z]{2})-[0-9]{4,5}$/i;
  const plate = licensePlateInput.value.trim();

  if (!licensePlateRegex.test(plate)) {
    alert("Biển số xe không hợp lệ. Ví dụ đúng: 84K5-1234, 84K5-12345, 84KK-1234 hoặc 84KK-12345");
    return false;
  }

  // ✅ Ngày: không rỗng + không quá khứ
  if (!appointmentDateVal) {
    alert("Vui lòng chọn ngày.");
    return false;
  }

  const today = new Date();
  today.setHours(0,0,0,0);
  const todayString = today.toISOString().split('T')[0];

  if (appointmentDateVal < todayString) {
    alert("Ngày không được là ngày trong quá khứ.");
    return false;
  }

  return true;
}
