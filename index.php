<?php
require_once 'app/config/database.php';
require_once 'app/controllers/SinhVienController.php';
require_once 'app/controllers/HocPhanController.php';

$db = new Database();
$conn = $db->getConnection();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'sinhvien';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'sinhvien':
        $sinhVienController = new SinhVienController($conn);
        switch ($action) {
            case 'index':
                $sinhVienController->index();
                break;
            case 'add':
                $sinhVienController->add();
                break;
            case 'edit':
                $id = $_GET['id'];
                $sinhVienController->edit($id);
                break;
            case 'delete':
                $id = $_GET['id'];
                $sinhVienController->delete($id);
                break;
            case 'details':
                $id = $_GET['id'];
                $sinhVienController->details($id);
                break;
            default:
                $sinhVienController->index();
                break;
        }
        break;
    case 'hocphan':
        $hocPhanController = new HocPhanController($conn);
        switch ($action) {
            case 'index':
                $hocPhanController->index();
                break;
            
            default:
                $hocPhanController->index();
                break;
        }
        break;
    default:
        $sinhVienController = new SinhVienController($conn);
        $sinhVienController->index();
        break;
}
?>
