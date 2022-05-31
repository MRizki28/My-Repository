<?php
    session_start();
    include "../connection/connect.php";
    if($_SESSION['status_login']!=true){
        echo "<script>window.location='../login.php'</script>";
    }


?>
<html>
    <head>
        <title>Data Orderan</title>
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
</ul>
</div>
</header>

<div class="section">
    <div class="container">
        <h3>Data Orderan</h3>
        <div class="box">
               <table border="1" cellpacing="0" class="table">
                   <thead>
                   
                       <tr>
                           <th width="60px">No</th>
                           <th>Nama Pembeli</th>
                           <th>Nama Produk</th>
                           <th>Harga</th>
                           <th>Alamat</th>
                           <th>No WhatsApp</th>
                           <th>Jumlah</th>
                          
                           <th width="150px">Aksi</th>
                        </tr>
                    </there>
                    <tbody>
                    <?php
                        $no= 1;
                        // $produk = mysqli_query($connect,"SELECT * FROM tb_orderan ORDER BY id_orderan DESC");
                       $produk =    "SELECT * FROM tb_orderan 
                                    left JOIN tb_product ON tb_orderan.product_name= tb_product.product_name";
                       $sql= mysqli_query($connect, $produk) or die (mysqli_error($connect));
                       if(mysqli_num_rows($sql) > 0){
                       while ($p= mysqli_fetch_array($sql)) {

                       
                                               
                       ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $p['nama_pembeli']?></td>
                            <td><?php echo $p['product_name']?></td>
                            <td>Rp.<?php echo number_format($p['product_price'])?></td>
                            <td><?php echo $p['alamat_pembeli']?></td>
                            <td><?php echo $p['nomor_whatsapp']?></td>
                            <td><?php echo $p['jumlah_orderan']?></td>
            
                           
                          

                            <td><button class="button-login2"><a href="crud/edit.php?ido=<?php echo $p['id_orderan'] ?>"onclick="return confirm('Yakin Ingin Mengubah ?')">Edit</button></a> <button class="button-login3"> <a href="crud/hapus.php?ido=<?php echo $p['id_orderan'] ?>" onclick="return confirm('Yakin Ingin Menghapus ?')">Hapus</button></a></td>
                        </tr>
                        <?php }}else{?>
                            <tr>
                                <td colspan="8">Tidak Ada Data</td>

                        </tr>
                         <?php }?>
                        
                    </tbody>
                    
                </table>
                <br>
                <a href="tambah-orderan.php" class="button-login">Tambah Orderan</a>
            </div>
            
        </div>
    </div>
    
<footer>
    <div class="container">
    <small>Copyright &copy; 2022 - Stmik Adhi Guna</small>
</div>
</footer>

</body>
</html>