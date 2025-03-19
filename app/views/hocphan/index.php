<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Học Phần</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-add {
            background-color: #007bff;
            margin-bottom: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>

<h2>Danh Sách Học Phần</h2>

<!-- <a href="index.php?controller=hocphan&action=createForm" class="btn btn-add">Thêm Học Phần</a> -->

<table>
    <tr>
        <th>Mã HP</th>
        <th>Tên Học Phần</th>
        <th>Số Tín Chỉ</th>
        <th>Hành Động</th>

    </tr>
    <?php foreach ($hocPhanList as $hocPhan): ?>
        <tr>
            <td><?php echo htmlspecialchars($hocPhan->MaHP); ?></td>
            <td><?php echo htmlspecialchars($hocPhan->TenHP); ?></td>
            <td><?php echo htmlspecialchars($hocPhan->SoTinChi); ?></td>
            <td>Đăng Ký</td>
            
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
