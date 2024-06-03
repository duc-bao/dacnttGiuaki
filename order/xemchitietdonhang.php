<?php
require("../model/order.php"); // Đảm bảo đã kết nối đến cơ sở dữ liệu

// Lấy OrderId từ query string
$orderId = $_GET['id'];

// Truy vấn thông tin đơn hàng và sản phẩm tương ứng
$conn = ConnectDB();
$stmt = $conn->prepare("
    SELECT o.name_customer, o.address_customer, o.phone_customer,
           p.name_product, p.price
    FROM tborder o
    INNER JOIN tborderdetail od ON o.id_order = od.id_order
    INNER JOIN tbproduct p ON od.id_product = p.id_product
    WHERE o.id_order = ?
");
$stmt->execute([$orderId]);
$orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$orderDetails) {
    die("<h3>Không tìm thấy đơn hàng</h3>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Đơn hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Chi tiết Đơn hàng</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderDetails as $detail): ?>
                    <tr>
                        <td><?= htmlspecialchars($detail['name_customer']) ?></td>
                        <td><?= htmlspecialchars($detail['address_customer']) ?></td>
                        <td><?= htmlspecialchars($detail['phone_customer']) ?></td>
                        <td><?= htmlspecialchars($detail['name_product']) ?></td>
                        <td><?= htmlspecialchars($detail['price']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="order.php" class="btn btn-primary">Quay lại danh sách đơn hàng</a>
        <a href="thaydoitrangthai.php?id=1" class="btn btn-primary">Thay đổi trạng thái đơn hàng</a>
    </div>
</body>
</html>
