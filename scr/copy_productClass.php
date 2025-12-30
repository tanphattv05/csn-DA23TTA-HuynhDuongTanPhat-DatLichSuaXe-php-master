<?php
include "admin/database.php";
?>
<?php
class product
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function show_category()
    {
        $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_user()
    {
        $query = "SELECT * FROM tbl_user ORDER BY user_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_lienhe()
    {
        $query = "SELECT * FROM tbl_lienhe";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_brand_by_brand($brand_id)
    {
        $query = "SELECT * FROM tbl_product WHERE brand_id = '$brand_id'";
        return $this->db->select($query); // Truy vấn danh sách product theo brand
    }
    public function show_brand_by_category($category_id)
    {
        $query = "SELECT * FROM tbl_brand WHERE category_id = '$category_id'";
        return $this->db->select($query); // Truy vấn danh sách brand theo category
    }
    public function show_price_by_product($product_id){
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        return $this->db->select($query);
    }
    public function show_product()
    {
        $query = "SELECT tbl_product.*, tbl_category.category_name, tbl_brand.brand_name
            FROM tbl_product
            INNER JOIN tbl_category ON tbl_product.category_id = tbl_category.category_id
            INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
            ORDER BY tbl_product.product_id DESC;";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_lichSuaChua()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $user_id = isset($_SESSION['user']['id']) ? (int)$_SESSION['user']['id'] : 0;

        $hoten = $_POST['hoten'];
        $sdt = $_POST['sdt'];
        $biensoxe = $_POST['biensoxe'];
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];
        $product_id = $_POST['product_id'];
        $ngaybd = $_POST['ngaybd'];
        $price = "SELECT product_price FROM tbl_product where product_id = '$product_id'";
        $result_price = $this->db->select($price);
        if ($result_price && $row = $result_price->fetch_assoc()) {
            $product_price = $row['product_price'];
        } else {
            $product_price = 0;
        }
        $query = "INSERT INTO tbl_datlich (user_id, hoten, sdt, biensoxe, category_id, brand_id, product_id, ngaybd, product_price) 
            VALUES ('$user_id', '$hoten', '$sdt', '$biensoxe', '$category_id', '$brand_id', '$product_id', '$ngaybd', '$product_price')";
        echo '<script>window.location.href = "lsSuaChua.php";</script>';
        return $this->db->insert($query);
    }
    public function insert_lienhe()
    {
        $tenlh = $_POST['tenlh'];
        $emaillh = $_POST['emaillh'];
        $noidung = $_POST['noidung'];
        $query = "INSERT INTO tbl_lienhe (tenlh, emaillh, noidung) 
            VALUES ('$tenlh', '$emaillh', '$noidung')";
        echo "<script>alert('Đã gửi biểu mẫu liên hệ thành công.');window.location.href = 'index.php';</script>";
        return $this->db->insert($query);
    }
    public function ktDN()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $conn = new mysqli('localhost', 'root', '', 'scr');
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $user_name = isset($_POST['user_name']) ? $conn->real_escape_string(trim($_POST['user_name'])) : '';
        $matkhau = isset($_POST['matkhau']) ? $conn->real_escape_string(trim($_POST['matkhau'])) : '';

        if (empty($user_name) || empty($matkhau)) {
            echo "Tên đăng nhập hoặc mật khẩu không được để trống.";
            return false;
        }

        $sql = "SELECT * FROM tbl_user WHERE user_name = '$user_name' AND matkhau = '$matkhau'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user'] = [
                'id'       => $user['user_id'] ?? null,
                'name'     => $user['ten'] ?? $user_name,
                'username' => $user['user_name'] ?? $user_name,
                'email'    => $user['email'] ?? null,
            ];
            return true;
        } else {
            return false;
        }

        $conn->close();
    }
    public function ktDK()
    {
        $conn = new mysqli('localhost', 'root', '', 'scr');
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $ten = isset($_POST['ten']) ? $conn->real_escape_string(trim($_POST['ten'])) : '';
        $user_name = isset($_POST['user_name']) ? $conn->real_escape_string(trim($_POST['user_name'])) : '';
        $email = isset($_POST['email']) ? $conn->real_escape_string(trim($_POST['email'])) : '';
        $matkhau = isset($_POST['matkhau']) ? $conn->real_escape_string(trim($_POST['matkhau'])) : '';

        $sql = "SELECT user_name, email, ten FROM tbl_user 
            WHERE user_name = '$user_name'
            OR email = '$email'
            OR ten = '$ten'";

        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

        $conn->close();
    }

    public function insert_user()
    {
        $ten = $_POST['ten'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $matkhau = $_POST['matkhau'];
        $query = "INSERT INTO tbl_user (ten, user_name, email, matkhau)
            VALUES ('$ten','$user_name','$email','$matkhau')";
        $result = $this->db->insert($query);
        echo '<script>window.location.href = "login.php";</script>';
        return $result;
    }
    public function show_brand_ajax($category_id)
    {
        $query = "SELECT * FROM tbl_brand WHERE category_id = '$category_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_ajax($brand_id)
    {
        $query = "SELECT * FROM tbl_product WHERE brand_id = '$brand_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_price_ajax($product_id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_datLich($user_id = null)
    {
        $query = "SELECT tbl_datlich.*, tbl_category.category_name, tbl_brand.brand_name, tbl_product.product_name
            FROM tbl_datlich
            INNER JOIN tbl_category ON tbl_datlich.category_id = tbl_category.category_id
            INNER JOIN tbl_brand ON tbl_datlich.brand_id = tbl_brand.brand_id
            INNER JOIN tbl_product ON tbl_datlich.product_id = tbl_product.product_id";

        if ($user_id !== null) {
            $user_id = (int)$user_id;
            $query .= " WHERE tbl_datlich.user_id = '$user_id'";
        }

        $query .= " ORDER BY tbl_datlich.datlich_id DESC;";

        $result = $this->db->select($query);
        return $result;
    }

public function get_datlich($datlich_id)
    {
        $query = "SELECT * FROM tbl_datlich WHERE datlich_id = '$datlich_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product($product_id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_lichSuaChua($datlich_id, $hoten, $sdt, $biensoxe, $category_id, $brand_id, $product_id, $ngaybd, $product_price)
    {
        $query = "
                UPDATE tbl_datlich 
                SET 
                    hoten = '$hoten',
                    sdt = '$sdt',
                    biensoxe = '$biensoxe',
                    category_id = '$category_id',
                    brand_id = '$brand_id',
                    product_id = '$product_id',
                    ngaybd = '$ngaybd',
                    product_price = '$product_price'
                WHERE 
                    datlich_id = '$datlich_id'
            ";
        $result = $this->db->update($query);
        echo '<script>window.location.href = "lsSuaChua.php";</script>';
        return $result;
    }
    public function delete_datlich($datlich_id)
    {
        $query = "DELETE FROM tbl_datlich WHERE datlich_id = '$datlich_id' ";
        $result = $this->db->delete($query);
        return $result;
    }
    public function delete_lienhe($lienhe_id)
    {
        $query = "DELETE FROM tbl_lienhe WHERE lienhe_id = '$lienhe_id' ";
        $result = $this->db->delete($query);
        header('Location:lienhead.php');
        return $result;
    }
    public function delete_user($user_id)
    {
        $query = "DELETE FROM tbl_user WHERE user_id = '$user_id' ";
        $result = $this->db->delete($query);
        header('Location:userlist.php');
        return $result;
    }
    
}
?>