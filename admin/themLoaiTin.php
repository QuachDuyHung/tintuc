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
        $Ten = $_POST["txtTen"];
        $Ten_KhongDau = changeTitle($Ten);
        $ThuTu = $_POST["txtThuTu"];
        settype($ThuTu, "int");
        $AnHien = $_POST["AnHien"];
        settype($AnHien, "int");
        $idTL = $_POST["idTL"];
        settype($idTL, "int");

        $qr = "INSERT INTO loaitin VALUES ('NULL', '$Ten', '$Ten_KhongDau', '$ThuTu', '$AnHien', '$idTL')";

        mysqli_query($conn, $qr);

        header("location:listLoaiTin.php");
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

    <br>

    <form action="" method="post">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td colspan="2">THÊM LOẠI TIN</td>
            </tr>
            <tr>
                <td>Ten</td>
                <td>
                    <input type="text" name="txtTen" id="">
                </td>
            </tr>
            <tr>
                <td>ThuTu</td>
                <td>
                    <input type="text" name="txtThuTu" id="">
                </td>
            </tr>
            <tr>
                <td>AnHien</td>
                <td>
                    <input type="radio" name="AnHien" value="0">Ẩn
                    <input type="radio" name="AnHien" value="1">Hiện
                </td>
            </tr>
            <tr>
                <td>idTL</td>
                <td>
                    <select name="idTL" id="">

                        <?php
                            $them = TheLoai();
                            while($row_them = mysqli_fetch_array($them))
                            {                                
                        ?>

                        <option value="<?php echo $row_them['idTL'] ?>"><?php echo $row_them['TenTL'] ?></option>

                        <?php
                        }
                        ?>

                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Thêm" name="btnThem">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>