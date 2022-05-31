<?php
    session_start();
    include "connection/connect.php";
    if($_SESSION['status_login']!=true){
        echo "<script>window.location='login.php'</script>";
    }
    $query = mysqli_query($connect,"SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."'");
    $login = mysqli_fetch_object($query);
?>
<html>
    <head>
        <title>Profil</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="css/images/logo.png">
       
</head>
<body>
    <header>
        <div class="container">
    <h1><a href="home.php">ECOMERCE SHOPPING</a></h1>
    <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="produk/produk.php">Data Produk</a></li>
            <li><a href="orderan/order.php">Data Orderan</a></li>
            <li><a href="testimoni/testimoni.php">Testimoni</a></li>
            <li><a href="logout.php">Logout</a></li>
</ul>
</div>
</header>

<div class="section">
    <div class="container">
        <h3>Ubah Profil</h3>
        <div class="box">
               <form action="" method="POST">
                   <input type="text" name="nama" placeholder="Nama Lengkap" class="input-name" value="<?php echo $login->admin_name ?>" required>
                   <input type="text" name="user" placeholder="Username" class="input-name" value="<?php echo $login->username ?>"required>
                   <input type="text" name="hp" placeholder="No Handphone" class="input-name" value="<?php echo $login->admin_tlpn ?>"required>
                   <input type="text" name="email" placeholder="Email" class="input-name" value="<?php echo $login->admin_email ?>"required>
                   <input type="submit" name="submit" value="Ubah Profil" class="button-login">
</form>
        <?php
        if(isset($_POST['submit'])){

            $nama   =ucwords($_POST['nama']);
            $user   =$_POST['user'];
            $hp     =$_POST['hp'];
            $email  =$_POST['email'];

            $update = mysqli_query($connect, "UPDATE tb_admin SET 
                                             admin_name =    '".$nama."',
                                             username    =   '".$user."',
                                             admin_tlpn   =  '".$hp."',
                                             admin_email   = '".$email."'
                                             WHERE admin_id ='".$login->admin_id."' ");

            if($update){
                echo"<script>alert('Ubah Data Berhasil')</script>";
                echo "<script>window.location='profil.php'</script>";
            }
            else{
                echo"error".mysqli_error($connect);
            }            
        }
        
        ?>
</div>
<h3>Ubah Password</h3>
        <div class="box">
               <form action="" method="POST">
                   <input type="password" name="pass1" placeholder="New Password" class="input-name"  required>
                   <input type="password" name="pass2" placeholder="Confirm Password" class="input-name" "required>
                  
                   <input type="submit" name="submit1" value="Ubah Password" class="button-login">
</form>
        <?php
        if(isset($_POST['submit1'])){


            $pass1      =$_POST['pass1'];
            $pass2     =$_POST['pass2'];

            if($pass2 !=$pass1){
                echo "<script>alert('Konfirmasi Passwod Baru Tidak Sesuai')</script>";
            }
            else{
                $update_password = mysqli_query($connect, "UPDATE tb_admin SET 

                password   =  '".MD5($pass1)."'
                WHERE admin_id ='".$login->admin_id."' ");
                
                if($update_password){
                    echo"<script>alert('Ubah Password Berhasil')</script>";
                    echo "<script>window.location='profil.php'</script>";
                
                }else{
                    echo"gagal".mysqli_error($connect);
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