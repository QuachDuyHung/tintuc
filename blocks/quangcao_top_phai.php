<?php
    $vitri = 1;

    $quangcao = QuangCao($vitri);
    while($row_quangcao = mysqli_fetch_array($quangcao))
    {
?>

<a href="<?php echo $row_quangcao['Url'] ?>"><img width="280" src="upload/quangcao/<?php echo $row_quangcao['urlHinh'] ?>" /></a>
<div style="height:10px"></div>

<?php
    }
?>