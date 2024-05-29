<?php
require("../model/category.php");

$id = $_POST["id_cat"];
$name_cat = $_POST["name_cat"];


$ketqua = updateDataCat($id, $name_cat);

if($ketqua == TRUE) {
    echo "<h3>Thành công</h3>";
} else {
    echo "<h3>Lỗi sửa dữ liệu</h3>";
}
?>

<a href="theloai.php">Quay về danh sách</a>