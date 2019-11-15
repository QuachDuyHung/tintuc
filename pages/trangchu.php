
<!-- lấy danh sách thể loại -->
<?php
    $theloai = DanhSachTheLoai();
    while($row = mysqli_fetch_array($theloai))
    {
        $idTL = $row['idTL'];
?>

<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="index.php?p=tintrongloai&idTL=<?php echo $idTL ?>"><?php echo $row['TenTL'] ?></a>
        </div>
        
        <div class="child-cat">
        <!-- lấy danh sách loại tin theo thể loại -->
        <?php
            $theloai1 = DanhSachLoaiTin_Theo_TheLoai($idTL);
            while($row1 = mysqli_fetch_array($theloai1))
            {
        ?>
            <a href="index.php?p=tintrongloai&idTL=<?php echo $idTL ?>&idLT=<?php echo $row1['idLT'] ?>"><?php echo $row1['Ten'] ?></a>
            
        <?php
            }
        ?>
        </div>
        
        
        <div class="clear"></div>
        
        <div class="cat-content">
        	<div class="col1">

            <!-- Lấy tin mới nhất theo thể loại  -->
            <?php
                $theloai2 = TinMoiNhat_Theo_TheLoai($idTL);
                $row2 = mysqli_fetch_array($theloai2)                
            ?>
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTL=<?php echo $idTL ?>&idTin=<?php echo $row2['idTin'] ?>"><?php echo $row2['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row2['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row2['TomTat'] ?></div>
                    <div class="clear"></div>
                   
                </div>
            </div>


            <div class="col2">
            <!-- Lấy 2 tin mới tiếp theo thể loại -->
            <?php
                $theloai3 = TinMoiNhat_2Tin_Theo_TheLoai($idTL);
                while($row3 = mysqli_fetch_array($theloai3))
                {
            ?>
               <p class="tlq"><a href="index.php?p=chitiettin&idTL=<?php echo $idTL ?>&idTin=<?php echo $row3['idTin'] ?>"><?php echo $row3['TieuDe'] ?></a></p> 
            <?php
                }
            ?>
            </div>   
             
        </div>
    </div>
</div>
<div class="clear"></div>

<?php
    }
?>

<!-- box cat-->
