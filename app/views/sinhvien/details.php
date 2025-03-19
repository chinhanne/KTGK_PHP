<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
            margin-top: 20px;
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #3498db;
            color: white;
            font-size: 16px;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        img {
            border-radius: 8px;
            width: 80px;
            height: auto;
        }
        .no-image {
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>

<h2>Thông Tin Chi Tiết Sinh Viên</h2>

<table border="1">
    <tr>
        <th>Mã SV</th>
        <th>Họ Tên</th>
        <th>Giới Tính</th>
        <th>Ngày Sinh</th>
        <th>Mã Ngành</th>
        <th>Hình Ảnh</th>
    </tr>
    <?php if (!empty($sinhVien)): ?>
        <tr>
            <td><?php echo htmlspecialchars($sinhVien->MaSV); ?></td>
            <td><?php echo htmlspecialchars($sinhVien->HoTen); ?></td>
            <td><?php echo htmlspecialchars($sinhVien->GioiTinh); ?></td>
            <td><?php echo htmlspecialchars($sinhVien->NgaySinh); ?></td>
            <td><?php echo htmlspecialchars($sinhVien->MaNganh); ?></td>
            <td>
                <?php if (!empty($sinhVien->Hinh)): ?>
                    <img src="uploads/<?php echo htmlspecialchars($sinhVien->Hinh); ?>" alt="Hình Sinh Viên">
                <?php else: ?>
                    <span class="no-image">Không có ảnh</span>
                <?php endif; ?>
            </td>
        </tr>
    <?php else: ?>
        <tr>
            <td colspan="6">Không tìm thấy sinh viên</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
