<?php

$conn = myConnect();
mysqli_set_charset($conn, "utf8");

    function TinMoiNhat_motTin(){
        $qr = "
            SELECT * FROM tin
            ORDER BY idTin DESC
            LIMIT 0,1
        ";
        global $conn;   
        return mysqli_query($conn, $qr);
    }

    function TinMoiNhat_bonTin(){
        $qr = "
            SELECT * FROM tin
            ORDER BY idTin DESC
            LIMIT 1,8
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }

    function TinXemNhieuNhat(){    	
    	$qr = "
			SELECT * FROM tin
			ORDER BY SoLanXem DESC
			LIMIT 0,8
        ";
        global $conn;
    	return mysqli_query($conn, $qr);
    }

    function TinMoiNhat_theoloaitin_motTin($idLT){    
        $qr = "
            SELECT * FROM tin
            WHERE idLT=$idLT
            ORDER BY idTin DESC
            LIMIT 0,1
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }
    
    function TinMoiNhat_theoloaitin_bonTin($idLT){
        $qr = "
            SELECT * FROM tin
            WHERE idLT=$idLT
            ORDER BY idTin DESC
            LIMIT 1,5
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }

    function theloaitin($idLT){        
        $qr = "
            SELECT Ten
            FROM loaitin
            WHERE idLT=$idLT
        ";
        global $conn;
        $loaitin = mysqli_query($conn, $qr);
        $row = mysqli_fetch_array($loaitin);
        return $row['Ten'];
    }

    function QuangCao($vitri){
        $qr = "
            SELECT * FROM quangcao
            WHERE vitri=$vitri
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }

    function QuangCao_Banner($vitri){
        $qr = "
            SELECT * FROM quangcao
            WHERE vitri=$vitri
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }

    function DanhSachTheLoai(){
        $qr = "
            SELECT * FROM theloai
        ";
        global $conn;
        return mysqli_query($conn,$qr);
    }

    function DanhSachLoaiTin_Theo_TheLoai($idTL){
        $qr = "
            SELECT * FROM loaitin
            WHERE idTL=$idTL
        ";
        global $conn;
        return mysqli_query($conn,$qr);
    }

    // trangchu.php
    function TinMoiNhat_Theo_TheLoai($idTL){
        $qr = "
            SELECT * FROM tin
            WHERE idTL=$idTL
            ORDER BY idTin DESC
            LIMIT 0,1
        ";
        global $conn;
        return mysqli_query($conn,$qr);
    }

    function TinMoiNhat_2Tin_Theo_TheLoai($idTL){
        $qr = "
            SELECT * FROM tin
            WHERE idTL=$idTL
            ORDER BY idTin DESC
            LIMIT 1,2
        ";
        global $conn;
        return mysqli_query($conn,$qr);
    }
    //---------------

    // tintrongloai.php
    function breadCrumb($idLT){
        $qr = "
            SELECT TenTL, Ten
            FROM theloai, loaitin
            WHERE theloai.idTL = loaitin.idTL AND idLT=$idLT
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }

    function DanhSachLoaiTin($idLT){
        $qr = "
            SELECT * FROM tin
            WHERE idLT=$idLT
            ORDER BY idTin DESC
        ";
        global $conn;
        return mysqli_query($conn,$qr);
    }

    function DanhSachLoaiTin_phanTrang($idLT, $from, $sotin1trang){
        $qr = "
            SELECT * FROM tin
            WHERE idLT=$idLT
            ORDER BY idTin DESC
            LIMIT $from, $sotin1trang
        ";
        global $conn;
        return mysqli_query($conn,$qr);
    }
    //----------------------------

    //chitiettin.php
    function ChiTietTin($idTin){
        $qr = "
                SELECT * FROM tin
                WHERE idTin=$idTin
            ";
        global $conn;
        return mysqli_query($conn, $qr);
    }

    //lấy tin cùng loại (chitiettin.php)
    function TinCungLoai($idTin, $idLT){
        $qr = "
            SELECT * FROM tin
            WHERE idTin <> $idTin
            AND idLT = $idLT
            ORDER BY RAND()
            LIMIT 0,3
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }

    //cập nhật số lần xem tin
    function SoLanXemTin($idTin){
        $qr = "
            UPDATE tin
            SET SoLanXem = SoLanXem + 1
            WHERE idTin = idTin
        ";
        global $conn;
        mysqli_query($conn, $qr);
    }

    function TimKiem($tukhoa){
        $qr = "
            SELECT * FROM tin
            WHERE TieuDe REGEXP '$tukhoa'
            ORDER BY idTin DESC
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }
?>