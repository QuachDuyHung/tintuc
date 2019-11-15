
<?php

$tukhoa = $_GET["search"];

$loaitin =  TimKiem($tukhoa);
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

<!-- phân trang
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
</div> -->