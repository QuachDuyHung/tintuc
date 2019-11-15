<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["idUser"]) || $_SESSION["idGroup"] != 1){
        header("location:../index.php");
    }

require "../lib/dbCon.php";
require "../lib/quantri.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="layout.css">
</head>
<body>

    <table>
        <tr>
            <td id="hangtieude">TRANG QUẢN TRỊ
                <div style="float: right;">
                    <div>Chào bạn <?php echo $_SESSION['HoTen'] ?></div>
                </div>
            </td>
            
        </tr>
        <tr>
            <td id="hang2"><?php require "menu.php" ?></td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th colspan="6">DANH SÁCH THỂ LOẠI</th>
        </tr>
        <tr>
            <td>idTL</td>
            <td>TenTL</td>
            <td>TenTL-KhongDau</td>
            <td>ThuTu</td>
            <td>AnHien</td>
            <td><a href="themTheLoai.php">Thêm</a></td>
        </tr>

        <?php
            $theloai = DanhSachTheLoai();
            while($row_theloai = mysqli_fetch_array($theloai))
            {
                ob_start();
        ?>
        <tr>
            <td>{idTL}</td>
            <td>{TenTL}</td>
            <td>{TenTL_KhongDau}</td>
            <td>{ThuTu}</td>
            <td>{AnHien}</td>
            <td><a href="suaTheLoai.php?idTL={idTL}">Sửa</a> - <a onclick="return confirm('Bạn có chắc là muốn xóa hay không?'); " href="xoaTheLoai.php?idTL={idTL}">Xóa</a></td>
        </tr>

        <?php
            /*
                ob_start() và ob_get_clean() dùng để chuyển toàn bộ attribute nó bao quanh thành 1 biến
                để dễ bảo mật và chỉnh sửa trước khi đưa ra màn hình 
            */
            $s = ob_get_clean();
            $s = str_replace("{idTL}", $row_theloai['idTL'], $s);
            $s = str_replace("{TenTL}", $row_theloai['TenTL'], $s);
            $s = str_replace("{TenTL_KhongDau}", $row_theloai['TenTL_KhongDau'], $s);
            $s = str_replace("{ThuTu}", $row_theloai['ThuTu'], $s);
            $s = str_replace("{AnHien}", $row_theloai['AnHien'], $s);

            echo $s;
            }
        ?>
    </table>
    
</body>
</html>