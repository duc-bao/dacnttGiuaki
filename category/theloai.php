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
        <h2 class = "text-center mb-5">Danh sách Thể loại</h2>
        <button class="btn btn-large btn-primary"><a href="AddCategory.php" style="text-decoration:  none; color:black">Thêm thể loại</a></button>
        <?php 
        
        ?>
          <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col-1">STT</th>
                    <th scope="col-5">Tên Thể loại</th>
                    <th scope="col-2">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once("../model/category.php");
                 $categories = hienthicategory();
        foreach($categories as $p)
        {
          
        ?>
        <tr height="100" >
            <td><?=$p["id_cat"]?></td>
            <td><?=$p["name_cat"]?></td>
            <td><?=$p["status"]?></td>
            <td> 
                <a href="FormSuaCat.php?id=<?=$p["id_cat"]?>">Sửa</a>
                - 
                <a href="XoaCat.php?id=<?=$p["id_cat"]?>" 
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