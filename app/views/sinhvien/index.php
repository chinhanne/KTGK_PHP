<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table img {
            border-radius: 8px;
        }

        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh Sách Sinh Viên</h1>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="index.php?controller=sinhvien&action=add" class="btn btn-primary">
                Thêm Sinh Viên
            </a>
        </div>
        <?php if (empty($sinhViens)): ?>
            <div class="alert alert-warning text-center">
                Không có sinh viên nào trong danh sách.
            </div>
        <?php else: ?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Mã SV</th>
                        <th>Họ tên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Hình ảnh</th>
                        <th>Ngành học</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sinhViens as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row->MaSV); ?></td>
                            <td><?php echo htmlspecialchars($row->HoTen); ?></td>
                            <td><?php echo htmlspecialchars($row->GioiTinh); ?></td>
                            <td><?php echo htmlspecialchars($row->NgaySinh); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($row->Hinh); ?>" width="100" alt="Hình ảnh">
                            </td>
                            
                            <td><?php echo htmlspecialchars($row->nganh_name); ?></td>
                            <td>
                                <a href="index.php?controller=sinhvien&action=details&id=<?php echo htmlspecialchars($row->MaSV); ?>"
                                    class="btn btn-info btn-sm btn-action">
                                    Xem Chi Tiết
                                </a>
                                <a href="index.php?controller=sinhvien&action=edit&id=<?php echo htmlspecialchars($row->MaSV); ?>" class="btn btn-warning btn-sm btn-action">
                                    Sửa
                                </a>
                                <a href="index.php?controller=sinhvien&action=delete&id=<?php echo htmlspecialchars($row->MaSV); ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>