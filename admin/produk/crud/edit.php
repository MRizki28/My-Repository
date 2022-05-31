<?php
    session_start();
    include "../../connection/connect.php";
    if($_SESSION['status_login']!=true){
        echo "<script>window.location='../../login.php'</script>";
    }
    $produk = mysqli_query($connect, "SELECT * FROM tb_product  WHERE product_id ='".$_GET['id']. "' ");
    if(mysqli_num_rows($produk)== 0){
        echo "<script>window.location='../produk.php'</script>";
    }
    $p = mysqli_fetch_object($produk);

?>
<html>
    <head>
        <title>Edit Produk</title>
        <link rel="stylesheet" type="text/css" href="../..//css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../css/images/logo.png">
      
</head>
<body>
    <header>
        <div class="container">
    <h1><a href="../home.php">ECOMERCE SHOPPING</a></h1>
    <ul> 
        <li><a href="../../home.php">Home</a></li>
            <li><a href="../../profil.php">Profil</a></li>
            <li><a href="../produk.php">Data Produk</a></li>
            <li><a href="../../orderan/order.php">Data Orderan</a></li>
            <li><a href="../../testimoni/testimoni.php">Testimoni</a></li>
            <li><a href="../../logout.php">Logout</a></li>
</div>
</header>

<div class="section">
    <div class="container">
        <h3>Edit Produk</h3>
        <div class="box">
               <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" placeholder="Nama Produk" class="input-name" value="<?php echo $p->product_name ?>" required>
                    <input type="text" name="harga" placeholder="harga" class="input-name"  value="<?php echo $p->product_price ?>"  required>

                    <img src="../gambar/<?php echo $p->product_image ?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                    <input type="file" name="gambar" class="input-name" >
                    <textarea class="input-name" name="deskripsi" placeholder="deskripsi"  ><?php echo $p->product_description ?>" </textarea><br>
                    <input type="submit" name="submit3" value="Tambahkan" class="button-login">
</form>
<?php


      if (isset($_POST['submit3'])) {

        $nama=$_POST['nama'];
        $harga=$_POST['harga'];
        $deskripsi=$_POST['deskripsi'];
        $foto=$_POST['foto'];

        $filename =$_FILES['gambar']['name'];
        $tmp_name= $_FILES['gambar']['tmp_name'];
     

        if($filename != ''){

               
        $type1= explode('.', $filename);
        $type2= $type1[1];

        $rename = 'produk'.time().'.'.$type2;

        $type_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'jfif');

        
            if(!in_array($type2, $type_diizinkan)){

                echo "<script>alert('Format File Tidak Diizinkan')</script>";
                
            }else{
                unlink('./../gambar/' .$foto);
                move_uploaded_file($tmp_name, './../gambar/'.$rename);
                $gambarbaru = $rename;

            }
        }else{

            $gambarbaru = $foto;

        }
            //query update data 

            $update = mysqli_query($connect, "UPDATE tb_product SET 
                                                        product_name = '".$nama."', 
                                                        product_price = '".$harga."', 
                                                        product_description = '".$deskripsi."', 
                                                        product_image = '".$gambarbaru."' 
                                                        WHERE product_id = '".$p->product_id."' ");
            if($update){

                 echo '<script>alert("sukses")</script>'; 
                            
                echo "<script>window.location='../produk.php'</script>";
                            

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