<html>
    <head>
        <title>Login </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="css/images/logo.png">
        
</head>
<body id="bg-login">
   <div class = "box-login">
        <center>
            <img src="css/images/logo.png" alt="" >
        </center><br>
            <form action="" method="POST">
                 <input type="text" name="user" placeholder="Username" class="input-name1">    
                <input type="password" name="pass" placeholder="Password" class="input-name1">
                <input type="submit" name="submit" placeholder="Login" class="button-login1">
                <a href="buat-akun.php" id="signup" class="daftar">Belum Punya Akun ?</a>
               
</form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include "connection/connect.php";


                $user =mysqli_real_escape_string($connect,$_POST['user']);
                $password =mysqli_real_escape_string($connect,$_POST['pass']);

                $query = mysqli_query($connect,"SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($password)."'");
                if(mysqli_num_rows($query) > 0){
                    $login = mysqli_fetch_object ($query);
                    $_SESSION['status_login']= true;
                    $_SESSION['admin_global']= $login;
                    $_SESSION['id']= $login->admin_id;

                    echo "<script>window.location='home.php'</script>";
                }

                else{

                    echo"<script>alert('Password Atau Username anda salah');window.location='login.php'</script>";
                
                }
            }

        ?>




</div>

</body>
</html>