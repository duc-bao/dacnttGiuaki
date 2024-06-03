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
        <h2 class = "text-center mb-5">Sửa Đơn Hàng</h2>
        <?php
    $id = $_REQUEST["id"];//lấy id sản phẩm cần sửa từ link
    require("../model/order.php");
    $sanpham = getDataByID($id);
    if($sanpham===FALSE)
        die("<h3>LỖI SQL</h3>");
    if($sanpham===NULL)
        die("<h3>KHÔNG TÌM THẤY SẢN PHẨM</h3>");
    ?>
   <form name="f1" id="f1" method="post" action="XuLySuaDH.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$sanpham["id_order"]?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name_customer   " class="form-label">Tên Khách hàng</label>
                    <input type="text" class="form-control" id="name_customer" name="name_customer" value="<?=$sanpham["name_customer"]?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="address_customer" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address_customer" name="address_customer" value="<?=$sanpham["address_customer"]?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email_customer" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email_customer" name="email_customer" value="<?=$sanpham["email_customer"]?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="des" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="des" name="des" value="<?=$sanpham["phone_customer"]?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" id="b1" name="b1" value="Cập nhật">
                </div>
            </div>
        </div>
    </div>
</form>

    </div>
</body>
</html>