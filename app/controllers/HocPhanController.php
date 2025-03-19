<?php
require_once 'app/models/HocPhanModel.php';

class HocPhanController {
    private $hocPhanModel;

    public function __construct($db) {
        $this->hocPhanModel = new HocPhanModel($db);
    }

    public function index() {
        $hocPhanList = $this->hocPhanModel->getAllHocPhan();
        require_once 'app/views/hocphan/index.php';
    }

    public function details($maHP) {
        $hocPhan = $this->hocPhanModel->getHocPhanById($maHP);
        require_once 'app/views/hocphan/details.php';
    }

    public function createForm() {
        require_once 'app/views/hocphan/create.php';
    }

    
}
?>
