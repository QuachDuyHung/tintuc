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
    $idLT = $_GET["idLT"];
    settype($idLT, "int");
    $qr = "DELETE FROM loaitin WHERE idLT=$idLT";
    mysqli_query($conn, $qr);
    header("location:listLoaiTin.php");
?>