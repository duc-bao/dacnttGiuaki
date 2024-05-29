<?php
require("../model/sanpham.php");

$id = $_POST["id"];
$name_product = $_POST["name_product"];
if(isset($_FILES["image_product"]) && $_FILES["image_product"]["error"] == 0) {
    $image_product = $_FILES["image_product"]["name"];
} else {
    // Nếu không có file hình ảnh hoặc gặp lỗi, sử dụng giá trị cũ
    $sanpham = getDataByID($id);
    $image_product = $sanpham["image_product"];
}
$price = $_POST["price"];
$description = $_POST["des"];

$ketqua = updateData($id, $name_product, $image_product, $price, $description);

if($ketqua == TRUE) {
    echo "<h3>Thành công</h3>";
} else {
    echo "<h3>Lỗi sửa dữ liệu</h3>";
}
?>

<a href="product.php">Quay về danh sách</a>