<?php
    session_start();
    include "../connection/connect.php";
    if($_SESSION['status_login']!=true){
        echo "<script>window.location='../login.php'</script>";
    }
?>
<html>

<head>
    <title>Data Testimoni</title>
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
                <li><a href="../orderan/order.php">Data Orderan</a></li>
                <li><a href="testimoni.php">Testimoni</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <h3>Testimoni</h3>
            <div class="box">
                <table border="1" cellpacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Gambar</th>
                            <th width="150px">Aksi</th>
                        </tr>
                        </there>
                    <tbody>
                        <?php
                        $no= 1;
                       $testimoni = mysqli_query($connect,"SELECT * FROM tb_testimoni ORDER BY testimoni_id DESC");
                       if(mysqli_num_rows($testimoni) > 0){
                       while ($p= mysqli_fetch_array($testimoni)) {           
                       ?>
                        <tr>
                            
                            <td><?php echo $no++ ?></td>
                            <td><a href="gambar/<?php echo $p['testimoni_image']?>" target="_blank"><img
                                        src="gambar/<?php echo $p['testimoni_image']?>" width="200px"></a></td>
                            <td><button class="button-login2"><a
                                        href="crud/edit.php?idm=<?php echo $p['testimoni_id'] ?>"
                                        onclick="return confirm('Yakin Ingin Mengubah ?')">Edit</button></a> <button
                                    class="button-login3"> <a href="crud/hapus.php?idt=<?php echo $p['testimoni_id'] ?>"
                                    onclick="return confirm('Yakin Ingin Menghapus ?')">Hapus</button></a></td>
                       
                                </tr>

                        <?php }}else{?>
                        <tr>
                            <td colspan="8">Tidak Ada Data</td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <br>
                <a href="tambah-testimoni.php" class="button-login">Tambah Testimoni</a>
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