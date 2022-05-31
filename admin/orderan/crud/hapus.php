<?php
include "../../connection/connect.php";

if(isset($_GET['ido'])){
    $produk = mysqli_query($connect, "SELECT * FROM tb_orderan WHERE id_orderan = '" .$_GET['ido']."' ");
    $p = mysqli_fetch_object($produk);

    $delete = mysqli_query($connect, "DELETE FROM tb_orderan WHERE id_orderan = '".$_GET['ido']."' ");
    echo "<script>window.location='../order.php'</script>";
}

?>

