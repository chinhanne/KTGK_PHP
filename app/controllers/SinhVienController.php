<?php
require_once 'app/models/SinhVienModel.php';
require_once 'app/models/NganhHocModel.php';

class SinhVienController {
    private $sinhVienModel;
    private $nganhHocModel;

    public function __construct($db) {
        $this->sinhVienModel = new SinhVienModel($db);
        $this->nganhHocModel = new NghanhHocModel($db);
    }

    public function index() {
        $sinhViens = $this->sinhVienModel->getSinhViens();
        $view = 'app/views/sinhvien/index.php';
        include 'app/views/layout.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maSV = isset($_POST['MaSV']) ? trim($_POST['MaSV']) : null;
            $hoTen = isset($_POST['HoTen']) ? trim($_POST['HoTen']) : null;
            $gioiTinh = isset($_POST['GioiTinh']) ? trim($_POST['GioiTinh']) : null;
            $ngaySinh = isset($_POST['NgaySinh']) ? trim($_POST['NgaySinh']) : null;
            $hinh = isset($_POST['Hinh']) ? trim($_POST['Hinh']) : null;
            $maNganh = isset($_POST['MaNganh']) ? trim($_POST['MaNganh']) : null;

            // Kiểm tra dữ liệu đầu vào
            if ($maSV && $hoTen && $gioiTinh && $ngaySinh && $hinh && $maNganh) {
                $result = $this->sinhVienModel->addSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh);

                if ($result === true) {
                    header('Location: index.php?controller=sinhvien&action=index');
                    exit;
                } else {
                    $error = "Thêm sinh viên thất bại. Vui lòng thử lại.";
                }
            } else {
                $error = "Vui lòng điền đầy đủ thông tin.";
            }
        }

        $nganhHocs = $this->nganhHocModel->getAllNganh();
        $view = 'app/views/sinhvien/add.php';
        include 'app/views/layout.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoTen = isset($_POST['hoten']) ? trim($_POST['hoten']) : null;
            $gioiTinh = isset($_POST['gioitinh']) ? trim($_POST['gioitinh']) : null;
            $ngaySinh = isset($_POST['ngaysinh']) ? trim($_POST['ngaysinh']) : null;
            $hinh = isset($_POST['hinh']) ? trim($_POST['hinh']) : null;
            $maNganh = isset($_POST['manganh']) ? trim($_POST['manganh']) : null;


            if ($hoTen && $gioiTinh && $ngaySinh && $hinh && $maNganh) {
                $result = $this->sinhVienModel->updateSinhVien($id, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh);

                if ($result === true) {
                    header('Location: index.php?controller=sinhvien&action=index');
                    exit;
                } else {
                    $error = "Cập nhật sinh viên thất bại. Vui lòng thử lại.";
                }
            } else {
                $error = "Vui lòng điền đầy đủ thông tin.";
            }
        }

        $sinhVien = $this->sinhVienModel->getSinhVienById($id);
        $nganhHocs = $this->nganhHocModel->getAllNganh();
        $view = 'app/views/sinhvien/edit.php';
        include 'app/views/layout.php';
    }

    public function delete($id) {
        $result = $this->sinhVienModel->deleteSinhVien($id);

        if ($result === true) {
            header('Location: index.php?controller=sinhvien&action=index');
            exit;
        } else {
            $error = "Xóa sinh viên thất bại. Vui lòng thử lại.";
            $sinhViens = $this->sinhVienModel->getSinhViens();
            $view = 'app/views/sinhvien/index.php';
            include 'app/views/layout.php';
        }
    }

    public function details($id) {
        $sinhVien = $this->sinhVienModel->getSinhVienById($id);
    
        if ($sinhVien) {
            $view = 'app/views/sinhvien/details.php';
            include 'app/views/layout.php';
        } else {
            echo "<script>alert('Không tìm thấy sinh viên!'); window.location='index.php?controller=sinhvien';</script>";
        }
    }
    
    
    
    
}
?>
