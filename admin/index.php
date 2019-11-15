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
    
</body>
</html>