<?php
    session_start();
    include "../connection/connect.php";
    if($_SESSION['status_login']!=true){
        echo "<script>window.location='../login.php'</script>";
    }
    
?>
<html>
    <head>
        <title>Tambah Orderan</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../css/images/logo.png">
</head>
<body>
    <header>
        <div class="container">
    <h1><a href="../home.php">ECOMERCE SHOPPING</a></h1>
    <ul> 
        <li><a href="../home.php">Home</a></li>
            <li><a href="../profil.php">Profil</a></li>
            <li><a href="../produk/produk.php">Data Produk</a></li>
            <li><a href="order.php">Data Orderan</a></li>
            <li><a href="../testimoni/testimoni.php">Testimoni</a></li>
            <li><a href="../logout.php">Logout</a></li>
</div>
</header>

<div class="section">
    <div class="container">
        <h3>Tambah Orderan</h3>
        <div class="box">
               <form action="" method="POST" enctype="multipart/form-data">
               <input type="text" name="nama" placeholder="Nama pembeli" class="input-name" required>
                   <select class="input-name" name="produk" required>
                       <option value="">pilih</option>
                       <?php 
                                $produk2 = mysqli_query($connect, "SELECT* FROM tb_product ORDER BY product_id DESC");
                                while($p = mysqli_fetch_array($produk2)){   
                        ?>
                        <option value="<?php echo $p['product_name']?>"><?php echo $p['product_name']?></option>
                        <?php } ?>
                                </select>
                        <input type="text" name="alamat" placeholder="Alamat" class="input-name" required>
                        <input type="text" name="no" placeholder="No WhatsApp" class="input-name" required>
                        <input type="number" name="jumlah" placeholder="Jumlah" class="input-name" required>
                    <input type="submit" name="submit3" value="Tambahkan" class="button-login">
</form>
<?php

      if (isset($_POST['submit3'])) {
          //print_r($_FILES['gambar']);

          //inputan dri form
          $nama=$_POST['nama'];
          $produkk=$_POST['produk'];
          $jumlah=$_POST['jumlah'];
          $alamat=$_POST['alamat'];
          $no=$_POST['no'];
       
          
        

           $insert = mysqli_query($connect, "INSERT INTO tb_orderan VALUES (
                        null,
                        '".$nama."',
                        '".$produkk."',
                        '".$jumlah."',
                        '".$alamat."',
                        '".$no."',
                       
                       
                        null 
                        )");

                        if($insert){
                            echo '<script>alert("sukses")</script>'; 
                            
                             echo "<script>window.location='order.php'</script>";
                            

                        }else{
                            echo'gagal' .mysqli_error($connect);
                        }   
                 }
      
      ?>
     
</div>
</div>
<footer>
    <div class="container">
    <small>Copyright &copy; 2022 - Stmik Adhi Guna</small>
</div>
</footer>
    
</body>
</html>