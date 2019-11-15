<div class="thongtin-title">
   <div class="right">

      <a href="#"><span class="SetHomePage ico_respone_01">&nbsp;</span>Đặt VnExpress làm trang chủ</a>

      <a href="#"><span class="top">&nbsp;</span>Về đầu trang</a>

   </div>
</div>
<div class="thongtin-content">

   <!-- lấy danh sách thể loại -->
   <?php
      $theloai = DanhSachTheLoai();
      while($row = mysqli_fetch_array($theloai))
      {
         $idTL = $row['idTL'];
   ?>

   <ul class="ulBlockMenu">
      <li class="liFirst">
         <h2>
            <a class="mnu_giaoduc" href="index.php?p=tintrongloai&idTL=<?php echo $row['idTL'] ?>"><?php echo $row['TenTL'] ?></a>
         </h2>
      </li>

      <!-- lấy danh sách loại tin theo thể loại -->
      <?php
         $theotheloai = DanhSachLoaiTin_Theo_TheLoai($idTL);
         while($row1 = mysqli_fetch_array($theotheloai))
         {
      ?>

      <li class="liFollow">
         <h2>
            <a href="index.php?p=tintrongloai&idTL=<?php echo $idTL ?>&idLT=<?php echo $row1['idLT'] ?>"><?php echo $row1['Ten'] ?></a>
         </h2>
      </li>
      
      <?php
         }
      ?>
      
   </ul>

   <?php
      }
   ?>

</div>