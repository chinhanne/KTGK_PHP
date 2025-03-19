<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Thêm Sinh Viên</h1>
        <div class="card shadow p-4 w-50 mx-auto">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger text-center">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="index.php?controller=sinhvien&action=add">
    <div class="mb-3">
        <label for="MaSV" class="form-label">Mã Sinh Viên</label>
        <input type="text" class="form-control" id="MaSV" name="MaSV" placeholder="Nhập mã sinh viên" required>
    </div>
    <div class="mb-3">
        <label for="HoTen" class="form-label">Họ Tên</label>
        <input type="text" class="form-control" id="HoTen" name="HoTen" placeholder="Nhập họ tên sinh viên" required>
    </div>
    <div class="mb-3">
        <label for="GioiTinh" class="form-label">Giới Tính</label>
        <select class="form-control" id="GioiTinh" name="GioiTinh" required>
            <option value="">-- Chọn Giới Tính --</option>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="NgaySinh" class="form-label">Ngày Sinh</label>
        <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
    </div>
    <div class="mb-3">
        <label for="Hinh" class="form-label"> Hình Ảnh</label>
        <input type="text" class="form-control" id="Hinh" name="Hinh" placeholder="Nhập URL hình ảnh" required>
    </div>
    <div class="mb-3">
        <label for="MaNganh" class="form-label">Ngành Học</label>
        <select class="form-control" id="MaNganh" name="MaNganh" required>
            <option value="">-- Chọn Ngành Học --</option>
            <?php foreach ($nganhHocs as $nganhHoc): ?>
                <option value="<?php echo $nganhHoc->MaNganh; ?>"><?php echo $nganhHoc->TenNganh; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm Sinh Viên</button>
</form>
        </div>
    </div>
</body>
</html>
