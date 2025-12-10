<?php
include "header_index.php";
include "connnect.php";
include "copy_productClass.php";
?>
<?php
$product = new product;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $insert_lienhe = $product->insert_lienhe($_POST);
}
?>
<style>
    .form-container {
        background: rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #333;
        width: 100%;
        max-width: 600px;
        margin: auto;
        font-size: 1.6rem;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-container .form-group {
        margin-bottom: 15px;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-container input,
    .form-container textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #000000ff;
        border-radius: 4px;
    }

    .form-container input:focus,
    .form-container textarea:focus {
        outline: none;
    }

    .form-container .error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    .form-container button {
        width: 100%;
        padding: 10px;
        background-color: #186d2b;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-container button:hover {
        background-color: #218838;
    }
</style>
<div class="grid" style="margin: 20px auto;">
    <div class="form-container">
        <h2>Liên hệ</h2>
        <form id="contactForm" method="post">
            <div class="form-group">
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="tenlh" placeholder="Nhập họ và tên" required>
                <div class="error" id="nameError"></div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="emaillh" placeholder="Nhập email" required>
                <div class="error" id="emailError"></div>
            </div>

            <div class="form-group">
                <label for="message">Tin nhắn:</label>
                <textarea id="message" name="noidung" rows="4" placeholder="Nhập nội dung" required></textarea>
                <div class="error" id="messageError"></div>
            </div>

            <button type="submit">Gửi</button>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>