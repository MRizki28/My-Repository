<?php
    session_start();
    include "connection/connect.php";
?>
<html>
    <head>
        <title>Daftar Akun</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="icon" href="css/images/logo.png">
</head>
<body>


<div class="section">
    <div class="container">
        <h3>Daftar</h3>
        <div class="box">
               <form action="" method="POST">
                   <input type="text" name="nama" placeholder="Nama Lengkap" class="input-name"  required>
                   <input type="text" name="user" placeholder="Username" class="input-name" required>
                   <input type="password" name="pass1" placeholder="New Password" class="input-name"  required>
                   <input type="password" name="pass2" placeholder="Konfirmasi Password" class="input-name"  required>
                   <input type="text" name="hp" placeholder="No Handphone" class="input-name"required>
                   <input type="text" name="email" placeholder="Email" class="input-name" required>
                   <input type="submit" name="submit" value="Daftar" class="button-login">
                   <a href="login.php" id="sigin" class="daftar1">Sudah Punya Akun (Login)</a>
   
</form>
        <?php

        if(isset($_POST['submit'])){

            $nama   =ucwords($_POST['nama']);
            $user   =$_POST['user'];
            $pass1   =$_POST['pass1'];
            $pass2  =$_POST['pass2'];
            $hp     =$_POST['hp'];
            $email  =$_POST['email'];

            if($pass2 !=$pass1){
                echo "<script>alert('Konfirmasi Passwod Baru Tidak Sesuai')</script>";
            }else{
                $insert = mysqli_query($connect, "INSERT INTO tb_admin VALUES (
                    null,
                    '".$nama."',
                    '".$user."',
                    '".MD5($pass1)."',
                    '".$hp."',
                    '".$email."'
                    )");
    
                    if($insert){
                        echo '<script>alert("sukses")</script>'; 
                        
                         echo "<script>window.location='login.php'</script>";
                        
    
                    }else{
                        echo'gagal' .mysqli_error($connect);
                    }   
            }
            
            }

          
        ?>
</div>
</form>
       
</div>
</div>
<footer>
    <div class="container">
        <small>Copyright &copy; 2022 - Muhammad Rizki</small>
</div>
</footer>

</body>
</html>