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
    
    <table border="1" cellpadding="10" cellspacing="0" style="width: 1000px;">
        <tr>
            <th colspan="5">DANH SÁCH TIN</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="themTin.php">Thêm</a></td>
        </tr>

        <?php
            $tin = DanhSachTin();
            while ($row_tin = mysqli_fetch_array($tin))
            {
                ob_start();
        ?>

        <tr>
            <td>
                idTin:{idTin}
                <br>
                {Ngay}
            </td>
            <td>
                <a href="suaTin.php?idTin={idTin}">{TieuDe}</a>
                <br>
                <img src="../upload/tintuc/{urlHinh}" alt="" style="float: left; width: 100px; margin-right: 10px;">
                {TomTat}
            </td>
            <td>
                {TenTL}
                <br>
                -
                <br>
                {Ten}
            </td>
            <td>
                Số lần xem: {SoLanXem}
                <br>
                {TinNoiBat} - {AnHien}
            </td>
            <td>
                <a href="suaTin.php?idTin={idTin}">Sửa</a><br> - <br><a href="xoaTin.php?idTin={idTin}">Xóa</a>               
            </td>
        </tr>

        <?php
            $s = ob_get_clean();
            $s = str_replace("{idTin}", $row_tin['idTin'], $s);
            $s = str_replace("{Ngay}", $row_tin['Ngay'], $s);
            $s = str_replace("{TieuDe}", $row_tin['TieuDe'], $s);
            $s = str_replace("{urlHinh}", $row_tin['urlHinh'], $s);
            $s = str_replace("{TomTat}", $row_tin['TomTat'], $s);
            $s = str_replace("{TenTL}", $row_tin['TenTL'], $s);
            $s = str_replace("{Ten}", $row_tin['Ten'], $s);
            $s = str_replace("{SoLanXem}", $row_tin['SoLanXem'], $s);
            $s = str_replace("{TinNoiBat}", $row_tin['TinNoiBat'], $s);
            $s = str_replace("{AnHien}", $row_tin['AnHien'], $s);
            echo $s;
        }
        ?>
    </table>

</body>
</html>