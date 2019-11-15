<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["idUser"]) || $_SESSION["idGroup"] != 1){
        header("location:../index.php");
    }

require "../lib/dbCon.php";
require "../lib/quantri.php";
?>

<?php
    if(isset($_POST["btnThem"])){
        $TenTL = $_POST['TenTL'];
        $TenTL_KhongDau = changeTitle($TenTL); //chuyển có dấu thành không dấu
        $ThuTu = $_POST['ThuTu'];
            settype($ThuTu, "int"); //ép kiểu
        $AnHien = $_POST['AnHien'];
            settype($AnHien, "int"); //ép kiểu

        $qr = "INSERT INTO theloai VALUES ('NULL', '$TenTL', '$TenTL_KhongDau', '$ThuTu', '$AnHien')";

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
                <th colspan="2">THÊM THỂ LOẠI</th>
            </tr>
            <tr>
                <td>TenTL</td>
                <td><input type="text" name="TenTL" id=""></td>
            </tr>
            <tr>
                <td>ThuTu</td>
                <td><input type="text" name="ThuTu" id=""></td>
            </tr>
            <tr>
                <td>AnHien</td>
                <td>
                    <input type="radio" name="AnHien" value="0"> Ẩn
                    <br>
                    <input type="radio" name="AnHien" value="1"> Hiện
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Thêm" name="btnThem"></td>
            </tr>
            
        </table>
    </form>
    
</body>
</html>