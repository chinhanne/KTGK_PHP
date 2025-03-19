<?php
class NghanhHocModel {
    private $conn;
    private $table_name = "nganhhoc";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllNganh() {
        $query = "SELECT MaNganh, TenNganh FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNganhById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaNganh = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addNganh($tenNganh) {
        if (empty($tenNganh)) {
            return ['error' => 'Tên ngành không được để trống'];
        }

        $query = "INSERT INTO " . $this->table_name . " (TenNganh) VALUES (:tenNganh)";
        $stmt = $this->conn->prepare($query);
        $tenNganh = htmlspecialchars(strip_tags($tenNganh));
        $stmt->bindParam(':tenNganh', $tenNganh);

        return $stmt->execute();
    }

    public function updateNganh($maNganh, $tenNganh) {
        $query = "UPDATE " . $this->table_name . " SET TenNganh = :tenNganh WHERE MaNganh = :maNganh";
        $stmt = $this->conn->prepare($query);
        $tenNganh = htmlspecialchars(strip_tags($tenNganh));
        $stmt->bindParam(':maNganh', $maNganh);
        $stmt->bindParam(':tenNganh', $tenNganh);

        return $stmt->execute();
    }

    public function deleteNganh($maNganh) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaNganh = :maNganh";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maNganh', $maNganh);

        return $stmt->execute();
    }
}
?>
