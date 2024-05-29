<?php
require("../model/category.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_cat = $_POST["name_cat"];
    
    
    $ketqua = insertData($name_cat);

    if($ketqua == TRUE) {
        echo "<h3>Thành công</h3>";
    } else {
        echo "<h3>Lỗi khi thêm dữ liệu</h3>";
    }
}

?>
<a href="theloai.php">Quay về danh sách</a