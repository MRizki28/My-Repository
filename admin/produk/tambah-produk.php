<?php
    session_start();
    include "../connection/connect.php";
    if($_SESSION['status_login']!=true){
        echo "<script>window.location='../login.php'</script>";
    }
    
?>
<html>
    <head>
        <title>Tambah Produk</title>
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
            <li><a href="produk.php">Data Produk</a></li>
            <li><a href="../orderan/order.php">Data Orderan</a></li>
            <li><a href="../testimoni/testimoni.php">Testimoni</a></li>
            <li><a href="../logout.php">Logout</a></li>
</div>
</header>

<div class="section">
    <div class="container">
        <h3>Tambah Produk</h3>
        <div class="box">
               <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" placeholder="Nama Produk" class="input-name" required>
                    <input type="text" name="harga" placeholder="harga" class="input-name" required>
                    <input type="file" name="gambar" class="input-name" required>
                    <textarea class="input-name" name="deskripsi" placeholder="deskripsi"></textarea><br>
                    <input type="submit" name="submit3" value="Tambahkan" class="button-login">
</form>
<?php


      if (isset($_POST['submit3'])) {
          //print_r($_FILES['gambar']);

          //inputan dri form
          $nama=$_POST['nama'];
          $harga=$_POST['harga'];
          $deskripsi=$_POST['deskripsi'];
          
          //data file yg di upload
          $filename =$_FILES['gambar']['name'];
          $tmp_name= $_FILES['gambar']['tmp_name'];
          $type1= explode('.', $filename);
          $type2= $type1[1];

          $rename = 'produk'.time().'.'.$type2;
          

          //format file y diizinkan
          $type_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'jfif');

          //validasi
          if(!in_array($type2, $type_diizinkan)){

                echo "<script>alert('Format File Tidak Diizinkan')</script>";
                
          }else{

            //   echo"<script>alert('Berhasil Upload')</script>" ;
              move_uploaded_file($tmp_name, './gambar/'.$rename);

           $insert = mysqli_query($connect, "INSERT INTO tb_product VALUES (
                        null,
                        '".$nama."',
                        '".$harga."',
                        '".$deskripsi."',
                        '".$rename."',
                        null 
                        )");

                        if($insert){
                            echo '<script>alert("sukses")</script>'; 
                            
                             echo "<script>window.location='produk.php'</script>";
                            

                        }else{
                            echo'gagal' .mysqli_error($connect);
                        }   
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