<?php
    session_start();
    include "../../connection/connect.php";
    if($_SESSION['status_login']!=true){
        echo "<script>window.location='../../login.php'</script>";
    }
    $testimoni = mysqli_query($connect, "SELECT * FROM tb_orderan  WHERE id_orderan ='".$_GET['ido']. "' ");
    if(mysqli_num_rows($testimoni)== 0){
        echo "<script>window.location='../order.php'</script>";
    }
    $p = mysqli_fetch_object($testimoni);

?>
<html>
    <head>
        <title>Edit Orderan</title>
        <link rel="stylesheet" type="text/css" href="../..//css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../css/images/logo.png">
      
</head>
<body>
    <header>
        <div class="container">
    <h1><a href="../../home.php">ECOMERCE SHOPPING</a></h1>
    <ul> 
        <li><a href="../../home.php">Home</a></li>
            <li><a href="../../profil.php">Profil</a></li>
            <li><a href="../../produk/produk.php">Data Produk</a></li>
            <li><a href="../../orderan/order.php">Data Orderan</a></li>
            <li><a href="../../testimoni/testimoni.php">Testimoni</a></li>
            <li><a href="../../logout.php">Logout</a></li>
</div>
</header>

<div class="section">
    <div class="container">
        <h3>Edit Orderan</h3>
        <div class="box">
        <form action="" method="POST" >
               <input type="text" name="nama" placeholder="Nama pembeli" class="input-name" value="<?php echo $p->nama_pembeli ?>"required>
               <input type="number" name="jumlah" placeholder="Jumlah" class="input-name" value="<?php echo $p->jumlah_orderan ?>"required>
               <input type="text" name="alamat" placeholder="Alamat" class="input-name" value="<?php echo $p->alamat_pembeli ?>" required>
               <input type="text" name="no" placeholder="No WhatsApp" class="input-name" required>
                    <input type="submit" name="submit3" value="Tambahkan" class="button-login">
</form>
<?php


      if (isset($_POST['submit3'])) {

        $nama=$_POST['nama'];
        $jumlah=$_POST['jumlah'];
        $alamat=$_POST['alamat'];
        $no=$_POST['no'];
        
     
       
       

        
            //query update data 

            $update = mysqli_query($connect, "UPDATE tb_orderan SET 
                                                        nama_pembeli = '".$nama."',
                                                        jumlah_orderan = '".$jumlah."',
                                                        alamat_pembeli = '".$alamat."',
                                                        nomor_whatsapp = '".$no."'
                                                        WHERE id_orderan = '".$p->id_orderan."' ");
            if($update){

                 echo '<script>alert("sukses")</script>'; 
                            
                echo "<script>window.location='../order.php'</script>";
                            

             }else{

                echo'gagal' .mysqli_error($connect);

             }   
        
      }
      ?>
     
</div>
</div>
<footer>
    <div class="container">
        <small>Copyright &copy; 2022 - Muhammad Rizki</small>
</div>
</footer>

</html>