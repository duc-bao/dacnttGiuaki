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
        a{
            text-decoration:  none;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class= "btn btn-success btn-large"><a style="text-decoration:  none; color:white" href="../">Quay về trang chủ</a></button>
        <h2 class = "text-center mb-5">Danh sách đơn hàng</h2>
        <button class="btn btn-large btn-primary"><a href="themdh.php" style="text-decoration:  none; color:black">Thêm đơn hàng</a></button>
        <?php 
        
        ?>
          <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col-2">Tên khách hàng</th>
                    <th scope="col-2">Địa chỉ</th>
                    <th scope="col-2">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ngày Tạo</th>
                    <th scope="col">Ngày Nhận</th>
                    <th scope="col-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once("../model/order.php");
                 $products = hienthisp();
        foreach($products as $p)
        {
            
        ?>
        <tr height="100" >
            <td><?=$p["id_order"]?></td>
            <td><?=$p["name_customer"]?></td>
            <td><?=$p["address_customer"]?></td>
            <td><?=$p["phone_customer"]?></td>
            <td><?=$p["email_customer"]?></td>
            <td><?=$p["order_date"]?></td>
            <td><?=$p["receive_date"]?></td>
            <td> 
                <a href="formsuadonhang.php?id=<?=$p["id_order"]?>" class = "me-2" >Sửa</a>
                <a href="xemchitietdonhang.php?id=<?=$p["id_order"]?>"  class = "me-2">Xem chi tiết đơn hàng</a>
                <a href="xoadh.php?id=<?=$p["id_order"]?>" 
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