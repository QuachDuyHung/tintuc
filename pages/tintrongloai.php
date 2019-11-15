<?php
    $idLT = $_GET["idLT"];
    settype($idLT, "int"); //gán kiểu int cho $idLT
?>

<?php
    $bc = breadCrumb($idLT);
    $row_bc = mysqli_fetch_array($bc);
?>
<div>
    Trang chủ > <?php echo $row_bc['TenTL'] ?> > <?php echo $row_bc['Ten'] ?>
</div>

<!-- phân trang -->
<?php
    $sotin1trang = 10;
    if(isset($_GET["trang"])){ //nếu có biến trang trong url
        $trang = $_GET["trang"]; //thì get về
        settype($trang, "int"); //rồi ép kiểu int
    }
    else{
        $trang = 1;
    }
    $from = ($trang - 1) * $sotin1trang; //tính số bắt đầu của tin trong trang mới
    
    $loaitin =  DanhSachLoaiTin_phanTrang($idLT, $from, $sotin1trang);
    while($row = mysqli_fetch_array($loaitin))
    {
?>

<div class="box-cat">
	<div class="cat1">
    	
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin'] ?>"><?php echo $row['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat'] ?></div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
    </div>
</div>
<div class="clear"></div>

<?php
    }
?>

<!-- box cat-->

<!-- phân trang -->
<style>
#phantrang{
    text-align: center;
}
#phantrang a{
    background-color: #000;
    color: #fff;
    padding: 5px;
    margin-right: 5px;
}
#phantrang a:hover{
    background-color: blueviolet;
}
</style>

<div id="phantrang">
<?php
    $t = DanhSachLoaiTin($idLT);
    $tongsotin = mysqli_num_rows($t); //trả về 1 hàng trong tập hợp truyền vào
    $tonsotrang = ceil($tongsotin / $sotin1trang); //làm tròn số trang (vd: 4.2 -> 5)

    for($i = 1; $i <= $tonsotrang; $i++)
    {
?>
    <a <?php if($i == $trang) echo "style='background-color: red;'" ?> href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>&trang=<?php echo $i ?>"><?php echo $i ?> </a>

<?php
    }
?>
</div>