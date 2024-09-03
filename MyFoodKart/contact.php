<?php 
include 'configfortwoconnection.php';/*PHP dosyalarında tekrar tekrar aynı bağlantı bilgilerini yazmak yerine bu kısa yöntem kullanılıyor*/
session_start();
//kullanıcının giriş yapmış olup olmadığını kontrol ediliyor
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}
//ürün miktarları toplama
$countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
$countresult = mysqli_query($link, $countsql);
$countrow = mysqli_fetch_assoc($countresult);      
$count = $countrow['SUM(`itemQuantity`)'];
if(!$count) {
  $count = 0;
}
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bizimle İletişime Geçin | Yücel</title>
    <link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="phone.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
    

</head>

<style>
    span{
        font-family: 'Quicksand';
        color: #02ff02;
        margin-left: 10px;
    }
    #logout{
    padding: 3px 10px;
    font-family: 'Baloo Bhai 2' , sans-serif;
    margin-left: 10px;
    }
</style>

<body>
    <!-- NAVIGATION BAR -->
    <nav class="navbar h-nav">
        <div class="title v-class" class="v-class">
            <h2>Yücel Cafe&Restaurant</h2>
        </div>
        <ul class="nav-list v-class" class="v-class">
            <li><a href="home_loggedin.php">Anasayfa</a></li>
            <li><a href="menu.php">Kategoriler</a></li>
            <li><a href="viewOrder.php">Siparişlerim</a></li>
            <li><a href="aboutus.php">Hakkımızda</a></li>
            <li><a href="contact.php">Bizimle İletişime Geçin</a></li>
        </ul>
        <div class="buttons v-class" class="v-class">
            <a href="viewCart.php"><button id="cart">
                <img src="./images/cart.png" alt="">
                <p>Sepet(<?php echo $count ?>)</p>
            </button></a>
            <?php 
            $user_display = $_SESSION['username'];
            echo "<span>Hoş Geldin, $user_display</span>";
            ?> 
            <a href="_logout.php"><button id="logout" >Çıkış Yap</button></a>
        </div>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Bizimle İletişime Geçin</h2>
                <form action="contactdb.php" method="POST">
				<input type="text" class="field" name="fname" placeholder="Adınız">
				<input type="text" class="field" name="email" placeholder="E-mail Adresiniz">
				<input type="text" class="field" name="mobile" placeholder="Telefon Numaranız">
				<textarea placeholder="Mesajınız" name="message" class="field"></textarea>
				<button class="btn">Gönder</button></form>
			</div>
		</div>
	</div>
    <script src="nav.js"></script>
</body>
</html>

<?php }
else {
  echo "<script>alert('İletişim için, önce kaydol');
  window.history.back(1);
  </script>";
}
?>