<?php
include "../../connection/connect.php";

if(isset($_GET['idt'])){
    $testimoni = mysqli_query($connect, "SELECT testimoni_image FROM tb_testimoni WHERE testimoni_id = '" .$_GET['idt']."' ");
    $p = mysqli_fetch_object($testimoni);

    unlink('./../gambar/'.$p->testimoni_image);

    $delete = mysqli_query($connect, "DELETE FROM tb_testimoni WHERE testimoni_id = '".$_GET['idt']."' ");
    echo "<script>window.location='../testimoni.php'</script>";
}

?>

