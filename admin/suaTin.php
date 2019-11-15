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
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
    <script type="text/javascript">
function BrowseServer( startupPath, functionData ){
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
    finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
    finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
    finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
    //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn    
    finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){   
    var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
    document.getElementById( 'thumbnails' ).innerHTML +=
    '<div class="thumb">' +
    '<img src="' + fileUrl + '" />' +
    '<div class="caption">' +
    '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
    '</div>' +
    '</div>';
    document.getElementById( 'preview' ).style.display = "";
    return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
}
</script>

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
    
    <table border="1" cellpadding="10" cellspacing="0" style="width: 800px;">
        <tr>
            <th colspan="2">THÊM TIN</th>
        </tr>
        <tr>
            <td>TieuDe</td>            
            <td>
                <input type="text" name="TieuDe">
            </td>
        </tr>
        <tr>
            <td>TomTat</td>            
            <td>
                <textarea name="TomTat" id="" cols="80" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td>urlHinh</td>            
            <td>
                <input type="text" name="urlHinh">
                <input onclick="BrowseServer('Images:/','urlHinh')"  type="button" name="btnChonFile" id="btnChonFile" value="Chọn File">
            </td>
        </tr>
        <tr>
            <td>Content</td>            
            <td>
                <textarea name="Content" id="Content" cols="80" rows="8"></textarea>
                <script type="text/javascript">
                    var editor = CKEDITOR.replace( 'Content',{
                        uiColor : '#9AB8F3',
                        language:'vi',
                        skin:'v2',
                        filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                        filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                        toolbar:[
                        ['Source','-','Save','NewPage','Preview','-','Templates'],
                        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
                        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                        ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
                        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                        ['Link','Unlink','Anchor'],
                        ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
                        ['Styles','Format','Font','FontSize'],
                        ['TextColor','BGColor'],
                        ['Maximize', 'ShowBlocks','-','About']
                        ]
                    });     
</script>
            </td>
        </tr>
        <tr>
            <td>idTL</td>            
            <td>
                <select name="idTL" id="">
                    <?php
                        $theloai = DanhSachTheLoai();
                        while ($row_theloai = mysqli_fetch_array($theloai))
                        {
                    ?>
                    <option value="<?php echo $row_theloai['idTL'] ?><"><?php echo $row_theloai['TenTL'] ?></option>

                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>idLT</td>            
            <td>
                <select name="idTL" id="">
                <?php
                        $loaitin = DanhSachLoaiTin();
                        while ($row_loaitin = mysqli_fetch_array($loaitin))
                        {
                    ?>
                    <option value="<?php echo $row_loaitin['idLT'] ?><"><?php echo $row_loaitin['Ten'] ?></option>

                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>TinNoiBat</td>            
            <td>
                <input type="radio" name="TinNoiBat" id="" value="1"> Nổi bật
                <br>
                <input type="radio" name="TinNoiBat" id="" value="0"> Bình thường
            </td>
        </tr>
        <tr>
            <td>AnHien</td>            
            <td>
                <input type="radio" name="TinNoiBat" id="" value="1"> Hiện
                <br>
                <input type="radio" name="TinNoiBat" id="" value="0"> Ẩn
            </td>
        </tr>
        <tr>
            <td></td>            
            <td>
                <input type="button" value="Thêm" name="btnThem">
            </td>
        </tr>
    </table>

</body>
</html>