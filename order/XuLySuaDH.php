<?php
require("../model/order.php");

$id = $_POST["id"];
$name_customer = $_POST["name_customer"];
$address_customer = $_POST["address_customer"];
$email_customer = $_POST["email_customer"];
$description = $_POST["des"];

$sanpham = getDataByID($id);

if (!$sanpham) {
    die("<h3>KHÔNG TÌM THẤY SẢN PHẨM</h3>");
}

$ketqua = updateData($id, $name_customer, $address_customer, $email_customer, $description);

if ($ketqua) {
    echo "<h3>Thành công</h3>";
} else {
    echo "<h3>Lỗi sửa dữ liệu</h3>";
}
?>

<a href="order.php">Quay về danh sách</a>