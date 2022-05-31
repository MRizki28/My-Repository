<?php
include "../../connection/connect.php";

if(isset($_GET['idp'])){
    $produk = mysqli_query($connect, "SELECT product_image FROM tb_product WHERE product_id = '" .$_GET['idp']."' ");
    $p = mysqli_fetch_object($produk);

    unlink('./../gambar/'.$p->product_image);

    $delete = mysqli_query($connect, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
    echo "<script>window.location='../produk.php'</script>";
}

?>

