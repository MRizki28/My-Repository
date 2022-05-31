<?php
    session_start();
    if($_SESSION['status_login']!=true){
        echo "<script>window.location='login.php'</script>";
    }
?>
<html>
    <head>
        <title>Home</title>
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
        <h3>Dashboard</h3>
        <div class="box1">
                <h4>Welcome <?php echo $_SESSION['admin_global']->admin_name?> </h4>
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