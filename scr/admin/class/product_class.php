<?php
    include "database.php";
?>
<?php
    class product{
        public $db;

        public function __construct()
        {
            $this-> db = new Database();
        }        
        public function show_category(){
            $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_brand_by_category($category_id) {
            $query = "SELECT * FROM tbl_brand WHERE category_id = '$category_id'";
            return $this->db->select($query); // Truy vấn danh sách brand theo category
        }
        public function show_product(){
            $query = "SELECT tbl_product.*, tbl_category.category_name, tbl_brand.brand_name
            FROM tbl_product
            INNER JOIN tbl_category ON tbl_product.category_id = tbl_category.category_id
            INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
            ORDER BY tbl_product.product_id DESC;";
            $result = $this->db->select($query);
            return $result;
        }
        public function insert_product(){
            $product_name = $_POST['product_name'];
            $category_id = $_POST['category_id'];
            $brand_id = $_POST['brand_id'];
            $product_price = $_POST['product_price'];
            $product_time = $_POST['product_time'];
            $product_vatTu = $_POST['product_vatTu'];
            $product_img = $_FILES['product_img']['name'];
            $urlImages = "uploads/".$_FILES['product_img']['name'];
            $urlImagesad = "imgad/".$_FILES['product_img']['name'];
            $fileTarget = basename($_FILES['product_img']['name']);
            $fileType = strtolower(pathinfo($product_img,PATHINFO_EXTENSION));
            $fileSize = $_FILES['product_img']['size'];
            
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"&& $fileType != "jfif"){
                $alert = "Chỉ chọn file jgp, png, jpeg,jfif!";
            return $alert;
            }else{
                
                $query = "INSERT INTO tbl_product (product_name,category_id,brand_id,product_price,product_time,product_vatTu,product_img,product_imgad)
                VALUES ('$product_name', '$category_id', '$brand_id', '$product_price', '$product_time', '$product_vatTu', '$urlImages','$urlImagesad')";
                // header('Location:productlist.php');
                return $this->db->insert($query);                    
            }       
        }        
        public function show_brand_ajax($category_id){
            $query = "SELECT * FROM tbl_brand WHERE category_id = '$category_id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_brand(){
            $query = "SELECT tbl_brand.*,tbl_category.category_name 
            FROM tbl_brand INNER JOIN tbl_category ON tbl_brand.category_id = tbl_category.category_id 
            ORDER BY tbl_brand.brand_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_product($product_id){
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($product_id, $product_name, $category_id, $brand_id, $product_price, $product_time, $product_vatTu, $product_img) {
            $query = "
                UPDATE tbl_product 
                SET 
                    product_name = '$product_name',
                    category_id = $category_id,
                    brand_id = $brand_id,
                    product_price = '$product_price',
                    product_time = '$product_time',
                    product_vatTu = '$product_vatTu',
                    product_img = '$product_img',
                    product_imgad = '$product_img'
                WHERE 
                    product_id = '$product_id'
            ";
            $result = $this->db->update($query);        
            header('Location: productList.php');
            return $result;
        }        
        public function delete_product($product_id){
            $query = "DELETE FROM tbl_product WHERE product_id = '$product_id' ";
            $result = $this->db->delete($query);
            header('Location:productlist.php');
            return $result;
        }  
    }
?>