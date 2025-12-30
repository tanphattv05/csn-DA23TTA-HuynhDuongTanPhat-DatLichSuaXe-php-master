<?php
include "config.php";

class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    private $result = null;

    public function __construct()
    {
        $this->connectDB();
    }

    public function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->link->connect_error) {
            $this->error = "Connect fail: " . $this->link->connect_error;
            return false;
        }

        $this->link->set_charset("utf8mb4");
        return true;
    }

    // Select
    public function select($query)
    {
        $result = $this->link->query($query);
        if (!$result) {
            die($this->link->error . " @LINE " . __LINE__);
        }
        return ($result->num_rows > 0) ? $result : false;
    }

    // Insert
    public function insert($query)
    {
        $insert_row = $this->link->query($query);
        if (!$insert_row) {
            die($this->link->error . " @LINE " . __LINE__);
        }
        return $insert_row;
    }

    // Update
    public function update($query)
    {
        $update_row = $this->link->query($query);
        if (!$update_row) {
            die($this->link->error . " @LINE " . __LINE__);
        }
        return $update_row;
    }

    // Delete
    public function delete($query)
    {
        $delete_row = $this->link->query($query);
        if (!$delete_row) {
            die($this->link->error . " @LINE " . __LINE__);
        }
        return $delete_row;
    }

    // Execute + store result
    public function execute($sql)
    {
        $this->result = $this->link->query($sql);
        return $this->result;
    }

    public function num_rows()
    {
        return $this->result ? $this->result->num_rows : 0;
    }

    public function getData()
    {
        return $this->result ? $this->result->fetch_assoc() : false;
    }

    // Lấy danh sách category (trả về result để while)
    public function showCategory($tbl_category)
    {
        $sql = "SELECT * FROM $tbl_category";
        $res = $this->link->query($sql);
        if (!$res) return false;
        return ($res->num_rows > 0) ? $res : false;
    }
}
