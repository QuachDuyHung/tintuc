<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["idUser"]) || $_SESSION["idGroup"] != 1){
        header("location:../index.php");
    }

require "../lib/dbCon.php";
require "../lib/quantri.php";
?>

<!-- lay idTL -->
<?php
    $idTL = $_GET['idTL'];
    settype($idTL, "int");
    $row_theloai = ChiTietTheLoai($idTL);
?>

<!-- code btSua -->
<?php
    if(isset($_POST['btnSua'])){
        $TenTL = $_POST['TenTL'];
        $TenTL_KhongDau = changeTitle($TenTL);
        $ThuTu = $_POST['ThuTu'];
            settype($ThuTu, "int");
        $AnHien = $_POST['AnHien'];
            settype($AnHien, "int");
        
        $qr = "
            UPDATE theloai SET
            TenTL = '$TenTL',
            TenTL_KhongDau = '$TenTL_KhongDau',
            ThuTu = '$ThuTu',
            AnHien = '$AnHien'
            WHERE idTL='$idTL'
        ";
        mysqli_query($conn, $qr);

        header("location:listTheLoai.php");
    }
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


    <form action="" method="post">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th colspan="2">SỬA THỂ LOẠI</th>
            </tr>
            <tr>
                <td>TenTL</td>
                <td><input type="text" name="TenTL" value="<?php echo $row_theloai['TenTL'] ?>"></td>
            </tr>
            <tr>
                <td>ThuTu</td>
                <td><input type="text" name="ThuTu" value="<?php echo $row_theloai['ThuTu'] ?>"></td>
            </tr>
            <tr>
                <td>AnHien</td>
                <td>
                    <input <?php if($row_theloai['AnHien']==0) echo "checked='checked'" ?> type="radio" name="AnHien" value="0"> Ẩn
                    <br>
                    <input <?php if($row_theloai['AnHien']==1) echo "checked='checked'" ?> type="radio" name="AnHien" value="1"> Hiện
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Sửa" name="btnSua"></td>
            </tr>
            
        </table>
    </form>
    
</body>
</html>