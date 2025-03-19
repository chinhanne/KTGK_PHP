<?php
class SinhVienModel {
    private $conn;
    private $table_name = "sinhvien";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getSinhViens() {
        $query = "SELECT sv.MaSV, sv.HoTen, sv.GioiTinh, sv.NgaySinh, sv.Hinh, nh.TenNganh AS nganh_name
                  FROM " . $this->table_name . " sv
                  LEFT JOIN nganhhoc nh ON sv.MaNganh = nh.MaNganh";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSinhVienById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $query = "INSERT INTO sinhvien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                  VALUES (:maSV, :hoTen, :gioiTinh, :ngaySinh, :hinh, :maNganh)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maSV', $maSV);
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':maNganh', $maNganh);
    
        return $stmt->execute();
    }

    public function updateSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $query = "UPDATE " . $this->table_name . " SET HoTen = :hoTen, GioiTinh = :gioiTinh, NgaySinh = :ngaySinh, Hinh = :hinh, MaNganh = :maNganh WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maSV', $maSV);
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':maNganh', $maNganh);
        
        return $stmt->execute();
    }

    public function deleteSinhVien($maSV) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maSV', $maSV);
        return $stmt->execute();
    }
}
?>
