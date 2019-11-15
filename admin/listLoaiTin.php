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
            <th colspan="7">DANH SÁCH LOẠI TIN</th>
        </tr>
        <tr>
            <td>idLT</td>
            <td>Ten</td>
            <td>Ten_KhongDau</td>
            <td>ThuTu</td>
            <td>AnHien</td>
            <td>TenTL</td>
            <td><a href="themLoaiTin.php">Thêm</a></td>
        </tr>

        <?php
            $loaitin = DanhSachLoaiTin();
            while($row_loaitin = mysqli_fetch_array($loaitin))
            {
                ob_start();
        ?>

        <tr>
            <td>{idLT}</td>
            <td>{Ten}</td>
            <td>{Ten_KhongDau}</td>
            <td>{ThuTu}</td>
            <td>{AnHien}</td>
            <td>{TenTL}</td>
            <td><a href="suaLoaiTin.php?idLT={idLT}">Sửa</a> - <a onclick="return confirm('Bạn có chắc muốn xóa hay không?');" href="xoaLoaiTin.php?idLT={idLT}">Xóa</a></td>
        </tr>

        <?php
            /*
                ob_start() và ob_get_clean() dùng để chuyển toàn bộ attribute nó bao quanh thành 1 biến
                để dễ bảo mật và chỉnh sửa trước khi đưa ra màn hình 
            */
            $s = ob_get_clean();
            $s = str_replace("{idLT}", $row_loaitin['idLT'], $s);
            $s = str_replace("{Ten}", $row_loaitin['Ten'], $s);
            $s = str_replace("{Ten_KhongDau}", $row_loaitin['Ten_KhongDau'], $s);
            $s = str_replace("{ThuTu}", $row_loaitin['ThuTu'], $s);
            $s = str_replace("{AnHien}", $row_loaitin['AnHien'], $s);
            $s = str_replace("{TenTL}", $row_loaitin['TenTL'], $s);

            echo $s;
            }
        ?>

    </table>
    
</body>
</html>