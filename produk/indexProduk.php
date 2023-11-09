<?php 
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

  $query= " SELECT * FROM kategoriproduk ORDER BY id_kategori ASC ";
  $sql= mysqli_query($con,$query);
  $no = 0;
?>


<?php 
    $content = ob_get_clean();
    include "../admin/body.php";
?>