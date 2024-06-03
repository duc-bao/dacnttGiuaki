<?php
require("../model/order.php");

// Kiểm tra xem biến id_order đã được gửi từ trang trước chưa
if(isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // Lấy thông tin đơn hàng từ cơ sở dữ liệu
    $order = getDataByID($orderId);

    // Kiểm tra xem đơn hàng có tồn tại không
    if($order) {
        // Kiểm tra xem đã gửi biểu mẫu chưa
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy trạng thái mới từ biểu mẫu
            $newStatus = $_POST['new_status'];

            // Cập nhật trạng thái của đơn hàng
            $success = updateOrderStatus($orderId, $newStatus);
            
            if($success) {
                echo "<h3>Cập nhật trạng thái thành công!</h3>";
            } else {
                echo "<h3>Có lỗi xảy ra. Vui lòng thử lại sau!</h3>";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay Đổi Trạng Thái Đơn Hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Thay Đổi Trạng Thái Đơn Hàng</h2>
        <form method="post">
            <div class="form-group">
                <label for="current_status">Trạng Thái Hiện Tại:</label>
                <input type="text" class="form-control" id="current_status" value="<?= $order['status'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="new_status">Chọn Trạng Thái Mới:</label>
                <select class="form-control" id="new_status" name="new_status">
                    <option value="Mới">Hóa Đơn Mới</option>
                    <option value="Đã thanh toán">Hóa Đơn Đã Thanh Toán</option>
                    <option value="Hủy">Hóa Đơn Đã Hủy</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật Trạng Thái</button>
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "<h3>Không tìm thấy đơn hàng!</h3>";
    }
} else {
    echo "<h3>Không có ID đơn hàng được cung cấp!</h3>";
}
?>
