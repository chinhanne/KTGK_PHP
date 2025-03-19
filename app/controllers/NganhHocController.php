<?php
require_once 'app/models/NganhHocModel.php';

class NganhHocController {
    private $nganhHocModel;

    public function __construct($db) {
        $this->nganhHocModel = new NghanhHocModel($db);
    }

    public function index() {
        $nghanhHoc = $this->nganhHocModel->getAllNganh();
        $view = 'app/views/nghanhhoc/index.php';
        include 'app/views/layout.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maNganh = $_POST['maNganh'];
            $tenNganh = $_POST['tenNganh'];

            if ($this->nganhHocModel->addNganh($maNganh, $tenNganh)) {
                header('Location: index.php?controller=nganhhoc&action=index');
            } else {
                $view = 'app/views/nganhhoc/add.php';
                include 'app/views/layout.php';
            }
        } else {
            $view = 'app/views/nghanhhoc/add.php';
            include 'app/views/layout.php';
        }
    }

    public function edit($maNganh) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenNganh = $_POST['tenNganh'];

            if ($this->nganhHocModel->updateNganh($maNganh, $tenNganh)) {
                header('Location: index.php?controller=chuyennghanh&action=index');
            } else {
                $nghanh = $this->nganhHocModel->getNganhById($maNganh);
                $view = 'app/views/nganhhoc/edit.php';
                include 'app/views/layout.php';
            }
        } else {
            $nghanh = $this->nganhHocModel->getNganhById($maNganh);
            $view = 'app/views/nganhhoc/edit.php';
            include 'app/views/layout.php';
        }
    }

    public function delete($maNganh) {
        $this->nganhHocModel->deleteNganh($maNganh);
        header('Location: index.php?controller=nganhhoc&action=index');
    }
}
?>
