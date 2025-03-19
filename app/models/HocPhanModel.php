<?php
class HocPhanModel {
    private $conn;
    private $table_name = "hocphan"; 

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllHocPhan() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getHocPhanById($maHP) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaHP = :maHP";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maHP', $maHP);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


}
?>
