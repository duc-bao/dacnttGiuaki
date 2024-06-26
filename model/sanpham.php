<?php 
function connectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlibanhang";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function hienthisp(){

    $conn = connectDB();

    // Check if the connection is successful
    if ($conn) {
        $stmt = $conn->query("SELECT * FROM tbproduct");
        $stmt->execute();
        // gia tri tra ve la mang
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    } else {
        // Handle the case where the connection is not successful
        return null;
    }
}

function getDataByID($id)
{
    $conn = ConnectDB();
    //dùng $conn để SELECT
    //tạo câu lệnh SQL cần thực thi
    $strSQL = "SELECT * FROM tbproduct WHERE id_product=$id";
    //chạy câu lênh SQL tới máy chủ MySQL
    $pdo_stm = $conn->prepare($strSQL);//tạo đối tượng PDOStatement với lệnh SQL
    $ketqua = $pdo_stm->execute();//thực thi lệnh SQL đã prepare
    //lấy dữ liệu từ bảng sản phẩm lưa vào mảng (2 chiều)
    if($ketqua==TRUE)
    {
        $row = $pdo_stm->fetch(PDO::FETCH_ASSOC);//lấy về 1 dòng từ kêt quả SELECT
        return $row; //NẾU KHÔNG CÓ THÌ $row = NULL
    }
    else
        return FALSE;
}
function deleteData($id)
{
    $conn = ConnectDB();
    //dùng $conn để DELETE
    //tạo câu lệnh SQL cần thực thi
    $strSQL = "DELETE FROM tbproduct WHERE id_product=?";
    //chạy câu lênh SQL tới máy chủ MySQL
    $pdo_stm = $conn->prepare($strSQL);//tạo đối tượng PDOStatement với lệnh SQL
    $param = [$id];
    $ketqua = $pdo_stm->execute($param);//thực thi lệnh SQL đã prepare
    return $ketqua;
}   
function insertData($name_product, $image_product, $price, $description,$status, $idCat)
{
    $conn = ConnectDB();
    if (empty($idCat)) {
        $idCat = 1; // Replace 1 with your desired default category ID
      }
    //tạo câu lệnh SQL cần thực thi
    $strSQL = "INSERT INTO `tbproduct`( `name_product`, `image_product`, `price`, `description`,`status`, `id_cat`)  
                    VALUES (?,?,?,?,?,?)";
    //chạy câu lênh SQL tới máy chủ MySQL
    $pdo_stm = $conn->prepare($strSQL);//tạo đối tượng PDOStatement với lệnh SQL
    //gán giá trị cho các tham số ?
    $param = [$name_product, $image_product, $price, $description,$status, $idCat];
    $ketqua = $pdo_stm->execute($param);//thực thi lệnh SQL đã prepare
    return $ketqua;
}
function updateData($id,$name, $hinhanh,$price, $description)
{
    $conn = ConnectDB();
    //tạo câu lệnh SQL cần thực thi
    $strSQL = "UPDATE tbproduct SET name_product=?,image_product=?,price=?, description = ? WHERE id_product=?";
    //chạy câu lênh SQL tới máy chủ MySQL
    $pdo_stm = $conn->prepare($strSQL);//tạo đối tượng PDOStatement với lệnh SQL
    $param = [$name, $hinhanh,$price, $description, $id];
    $ketqua = $pdo_stm->execute($param);//thực thi lệnh SQL đã prepare
    return $ketqua;
}
?>