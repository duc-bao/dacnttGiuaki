<?php
require("../model/sanpham.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_product = $_POST["name_product"];
    
    // Kiểm tra xem có file hình ảnh được tải lên không và không gặp lỗi
    if(isset($_FILES["image_product"]) && $_FILES["image_product"]["error"] == 0) {
        $image_product = $_FILES["image_product"]["name"];
    } else {
        // Nếu không có file hình ảnh hoặc gặp lỗi, sử dụng giá trị mặc định
        $image_product = ""; // Đặt giá trị mặc định cho hình ảnh
    }
    
    $price = $_POST["price"];
    $description = $_POST["des"];
    $idCat = $_POST["id_cat"];
    $status = $_POST["status"];
    // Gọi hàm insert_sanpham để thêm sản phẩm vào CSDL
    $ketqua = insertData($name_product, $image_product, $price, $description,$status, $idCat);

    if($ketqua == TRUE) {
        echo "<h3>Thành công</h3>";
    } else {
        echo "<h3>Lỗi khi thêm dữ liệu</h3>";
    }
}

?>
<a href="product.php">Quay về danh sách</a>
