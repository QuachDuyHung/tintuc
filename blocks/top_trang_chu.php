<div id="slide-left">

  <?php
    $tinmoinhat_mottin = TinMoiNhat_motTin();
    $row_tinmoinhat_mottin = mysqli_fetch_array($tinmoinhat_mottin);
  ?>
  <div id="slideleft-main">
    <img src="upload/tintuc/<?php echo $row_tinmoinhat_mottin['urlHinh'] ?>" /><br />
    <h2 class="title"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_mottin['idTin'] ?>"><?php echo $row_tinmoinhat_mottin['TieuDe'] ?></a> </h2>
    <div class="des">
      <?php echo $row_tinmoinhat_mottin['TomTat'] ?>
    </div>
    <!-- <p class="tlq"><a href="#">Hàng trăm chuyến bay bị hủy vì Trung Quốc tập trận</a></p> -->

  </div>
  <div id="slideleft-scroll">

    <div class="content_scoller width_common">
      <ul>

        <?php
        $tinmoinhat_bontin = TinMoiNhat_bonTin();
        while ($row_tinmoinhat_bontin = mysqli_fetch_array($tinmoinhat_bontin))
        {
        ?>

        <li>
          <div class="title_news">
            <a href="<?php echo $row_tinmoinhat_bontin['idTin'] ?>-<?php echo $row_tinmoinhat_bontin['TieuDe_KhongDau'] ?>.html" class="txt_link"><?php echo $row_tinmoinhat_bontin['TieuDe'] ?></a>
          </div>
        </li> 
        
        <?php
        }
        ?>

      </ul>
    </div>

    <div id="gocnhin">
      <a href="https://www.facebook.com/hung.quach.9231" target="_blank"><img alt="" src="hinhnen4.jpg" width="100%"></a>
      <div class="title_news"></div>
    </div>

  </div>
</div>