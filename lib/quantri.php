<?php

$conn = myConnect();
mysqli_set_charset($conn, "utf8");

//quản lý thể loại
    function DanhSachTheLoai(){
        $qr = "SELECT * FROM theloai ORDER BY idTL DESC";

        global $conn;
        return mysqli_query($conn, $qr);
    }

    function ChiTietTheLoai($idTL){
        $qr = "SELECT * FROM theloai WHERE idTL=$idTL";
        global $conn;
        $row = mysqli_query($conn, $qr);
        return mysqli_fetch_array($row);
    }

//quản lý thể loại
    function DanhSachLoaiTin(){
        $qr = "SELECT loaitin.idLT, loaitin.Ten, loaitin.Ten_KhongDau, loaitin.ThuTu, loaitin.AnHien, loaitin.idTL, theloai.TenTL
            FROM loaitin, theloai
            WHERE loaitin.idTL = theloai.idTL
            GROUP BY idLT DESC
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }

    function TheLoai(){
        $qr = "SELECT * FROM theloai";
        global $conn;
        return mysqli_query($conn,$qr);
    }

    function ChiTietLoaiTin($idLT){
        $qr = "SELECT * FROM loaitin WHERE idLT = '$idLT'";
        global $conn;
        $row = mysqli_query($conn, $qr);
        return mysqli_fetch_array($row);
    }

//quản trị tin
    function DanhSachTin(){
        $qr = "
            SELECT tin.*, TenTL, Ten 
            FROM tin, theloai, loaitin
            WHERE tin.idTL = theloai.idTL
            AND tin.idLT = loaitin.idLT
            ORDER BY idTin DESC
            LIMIT 0,20
        ";
        global $conn;
        return mysqli_query($conn, $qr);
    }

//chuyển từ dấu sang không dấu
    function utf8convert($str) {

        if(!$str) return false;

        $utf8 = array(

        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

        'd'=>'đ',
        'D'=>'Đ',

        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        
        'i'=>'í|ì|ỉ|ĩ|ị',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'

        );

        foreach($utf8 as $khongdau=>$codau){
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str); //preg
        }
    return $str;

    }

    //hàm chuyển đổi chữ cái khi người dùng nhập vào
    function changeTitle($str){
        $str = trim($str);
        if($str=="") {
            return "";
        }
        $str = str_replace('"','',$str);
        $str = str_replace("'",'',$str);
        $str = utf8convert($str);
        $str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');

        $str = str_replace(' ','-', $str);
        return $str;
    }


?>