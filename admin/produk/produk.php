<?php
    session_start();
    include "../connection/connect.php";
    if($_SESSION['status_login']!=true){
        echo "<script>window.location='../login.php'</script>";
    }
?>
<html>
    <head>
        <title>Data Produk</title>
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
</ul>
</div>
</header>

<div class="section">
    <div class="container">
        <h3>Data Produk</h3>
        <div class="box">
               <table border="1" cellpacing="0" class="table">
                   <thead>
                   
                       <tr>
                           <th width="60px">No</th>

                           <th>Nama Produk</th>
                           <th>Harga</th>
                           <th>Deskripsi</th>
                           <th>Gambar</th>
                           <th width="150px">Aksi</th>
                        </tr>
                    </there>
                    <tbody>
                    <?php
                        $no= 1;
                       $produk = mysqli_query($connect,"SELECT * FROM tb_product ORDER BY product_id DESC");
                       if(mysqli_num_rows($produk) > 0){
                       while ($p= mysqli_fetch_array($produk)) {
            
                       
                       ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $p['product_name']?></td>
                            <td>Rp.<?php echo number_format($p['product_price'])?></td>
                            <td><?php echo $p['product_description']?></td>
                            <td><a href="gambar/<?php echo $p['product_image']?>" target="_blank"><img src="gambar/<?php echo $p['product_image']?>" width="50px"></a></td>

                            <td><button class="button-login2"><a href="crud/edit.php?id=<?php echo $p['product_id'] ?>"onclick="return confirm('Yakin Ingin Mengubah ?')">Edit</button></a> <button class="button-login3"> <a href="crud/hapus.php?idp=<?php echo $p['product_id'] ?>" onclick="return confirm('Yakin Ingin Menghapus ?')">Hapus</button></a></td>
                        </tr>
                        <?php }}else{?>
                            <tr>
                                <td colspan="8">Tidak Ada Data</td>

                        </tr>
                         <?php }?>
                        
                    </tbody>
                    
                </table>
                <br>
                <a href="tambah-produk.php" class="button-login">Tambah Produk</a>
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