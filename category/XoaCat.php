<?php
require("../model/category.php");
$id = $_REQUEST["id"];
$ketqua = deleteData($id);
if($ketqua==TRUE)
    echo "<H3>thành công</h3>";
else
echo "<H3>Lỗi xóa dũ liệu</h3>";
?>
<a href="theloai.php">Quay về danh sách</a>