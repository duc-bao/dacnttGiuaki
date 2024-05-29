<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <title>Mảng 2 chiều</title>
    <style type="text/css">
        .product {width: 200px; height: 100px; border: 1px red solid;
                border-radius: 5px; float:left; margin: 10px; padding: 20px;}
    </style>
</head>
<body>
    <div class="container">
        <button class= "btn btn-success btn-large"><a style="text-decoration:  none; color:white" href="../">Quay về trang chủ</a></button>
        <h2 class = "text-center mb-5">Danh sách sản phẩm</h2>
        <button class="btn btn-large btn-primary"><a href="ThemSP.php" style="text-decoration:  none; color:black">Thêm sản phẩm</a></button>
        <?php 
        
        ?>
          <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col-3">Tên Sản Phẩm</th>
                    <th scope="col-3">Hình ảnh</th>
                    <th scope="col-1">Giá</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once("../model/sanpham.php");
                 $products = hienthisp();
        foreach($products as $p)
        {
            $hinhanh = ($p["image_product"]=="")?"no-image.png":$p["image_product"];
        ?>
        <tr height="100" >
            <td><?=$p["id_product"]?></td>
            <td><?=$p["name_product"]?></td>
            <td ><img src="<?=$hinhanh?>" width="80"></td>
            <td><?=$p["price"]?></td>
            <td><?=$p["description"]?></td>
            <td> 
                <a href="FormSuaSP.php?id=<?=$p["id_product"]?>">Sửa</a>
                - 
                <a href="Xoa.php?id=<?=$p["id_product"]?>" 
                        onclick="return confirm('Chắc chắn xóa?');">Xóa</a> 
            </td>
        </tr>
        <?php
        }
        ?>
            </tbody>
        </table>
    </div>
</body>
</html>