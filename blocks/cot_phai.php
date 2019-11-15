<!-- box cat -->
<?php
$idLT = 1;
?>

<div class="box-cat">
  <div class="cat">
    <div class="main-cat">
      <a href="index.php?p=theloaitin&idTin=<?php echo $idLT ?>"><?php echo theloaitin($idLT) ?></a>
    </div>

    <div class="clear"></div>
    <div class="cat-content">

      <?php
      $mottin = TinMoiNhat_theoloaitin_motTin($idLT);
      $row_motin = mysqli_fetch_array($mottin)
      ?>

      <div class="col1">
        <div class="news">
          <h3 class="title"><a href="index.php?p=chitiettin&idTin=<?php echo $row_motin['idTin'] ?>"><?php echo $row_motin['TieuDe'] ?></a></h3>
          <img class="images_news" src="upload/tintuc/<?php echo $row_motin['urlHinh'] ?>" align="left" />
          <div class="des"><?php echo $row_motin['TomTat'] ?></div>

          <div class="clear"></div>

        </div>
      </div>

      <?php
      $bontin = TinMoiNhat_theoloaitin_bonTin($idLT);
      while ($row_bontin = mysqli_fetch_array($bontin)) 
      {
      ?>

        <div class="col2">
          <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_bontin['idTin'] ?>"><?php echo $row_bontin['TieuDe'] ?></a></h3>
        </div>

      <?php
      }
      ?>

    </div>

  </div>

</div>
<div class="clear"></div>
<!-- //box cat -->


<!-- box cat -->
<?php
$idLT = 2;
?>

<div class="box-cat">
  <div class="cat">
    <div class="main-cat">
      <a href="index.php?p=theloaitin&idTin=<?php echo $idLT ?>"><?php echo theloaitin($idLT) ?></a>
    </div>

    <div class="clear"></div>
    <div class="cat-content">

      <?php
      $mottin = TinMoiNhat_theoloaitin_motTin($idLT);
      $row_motin = mysqli_fetch_array($mottin)
      ?>

      <div class="col1">
        <div class="news">
          <h3 class="title"><a href="index.php?p=chitiettin&idTin=<?php echo $row_motin['idTin'] ?>"><?php echo $row_motin['TieuDe'] ?></a></h3>
          <img class="images_news" src="upload/tintuc/<?php echo $row_motin['urlHinh'] ?>" align="left" />
          <div class="des"><?php echo $row_motin['TomTat'] ?></div>

          <div class="clear"></div>

        </div>
      </div>

      <?php
      $bontin = TinMoiNhat_theoloaitin_bonTin($idLT);
      while ($row_bontin = mysqli_fetch_array($bontin)) 
      {
      ?>

        <div class="col2">
          <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_bontin['idTin'] ?>"><?php echo $row_bontin['TieuDe'] ?></a></h3>
        </div>

      <?php
      }
      ?>

    </div>

  </div>

</div>
<div class="clear"></div>
<!-- //box cat -->


<!-- box cat -->
<?php
$idLT = 3;
?>

<div class="box-cat">
  <div class="cat">
    <div class="main-cat">
      <a href="index.php?p=theloaitin&idTin=<?php echo $idLT ?>"><?php echo theloaitin($idLT) ?></a>
    </div>

    <div class="clear"></div>
    <div class="cat-content">

      <?php
      $mottin = TinMoiNhat_theoloaitin_motTin($idLT);
      $row_motin = mysqli_fetch_array($mottin)
      ?>

      <div class="col1">
        <div class="news">
          <h3 class="title"><a href="index.php?p=chitiettin&idTin=<?php echo $row_motin['idTin'] ?>"><?php echo $row_motin['TieuDe'] ?></a></h3>
          <img class="images_news" src="upload/tintuc/<?php echo $row_motin['urlHinh'] ?>" align="left" />
          <div class="des"><?php echo $row_motin['TomTat'] ?></div>

          <div class="clear"></div>

        </div>
      </div>

      <?php
      $bontin = TinMoiNhat_theoloaitin_bonTin($idLT);
      while ($row_bontin = mysqli_fetch_array($bontin)) 
      {
      ?>

        <div class="col2">
          <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_bontin['idTin'] ?>"><?php echo $row_bontin['TieuDe'] ?></a></h3>
        </div>

      <?php
      }
      ?>

    </div>

  </div>

</div>
<div class="clear"></div>
<!-- //box cat -->


<!-- box cat -->
<?php
$idLT = 4;
?>

<div class="box-cat">
  <div class="cat">
    <div class="main-cat">
      <a href="index.php?p=theloaitin&idTin=<?php echo $idLT ?>"><?php echo theloaitin($idLT) ?></a>
    </div>

    <div class="clear"></div>
    <div class="cat-content">

      <?php
      $mottin = TinMoiNhat_theoloaitin_motTin($idLT);
      $row_motin = mysqli_fetch_array($mottin)
      ?>

      <div class="col1">
        <div class="news">
          <h3 class="title"><a href="index.php?p=chitiettin&idTin=<?php echo $row_motin['idTin'] ?>"><?php echo $row_motin['TieuDe'] ?></a></h3>
          <img class="images_news" src="upload/tintuc/<?php echo $row_motin['urlHinh'] ?>" align="left" />
          <div class="des"><?php echo $row_motin['TomTat'] ?></div>

          <div class="clear"></div>

        </div>
      </div>

      <?php
      $bontin = TinMoiNhat_theoloaitin_bonTin($idLT);
      while ($row_bontin = mysqli_fetch_array($bontin)) 
      {
      ?>

        <div class="col2">
          <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_bontin['idTin'] ?>"><?php echo $row_bontin['TieuDe'] ?></a></h3>
        </div>

      <?php
      }
      ?>

    </div>

  </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

