<?php
require("../model/order.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_customer = $_POST["name_customer"];
    $address_customer = $_POST["address_customer"];
    $phone_customer = $_POST["phone_customer"];
    $email_customer = $_POST["email_customer"];
    $order_date = $_POST["order_date"];
    $receive_date = $_POST["receive_date"];
    
    // Gọi hàm insertOrder để thêm đơn hàng vào CSDL
    $ketqua = insertData($name_customer, $address_customer, $phone_customer, $email_customer, $order_date, $receive_date);

    if($ketqua == TRUE) {
        echo "<h3>Thành công</h3>";
    } else {
        echo "<h3>Lỗi khi thêm dữ liệu</h3>";
    }
}
?>
<a href="order.php">Quay về danh sách</a>
