<?php 
include 'configfortwoconnection.php'; /*PHP dosyalarında tekrar tekrar aynı bağlantı bilgilerini yazmak yerine bu kısa yöntem kullanılıyor*/
session_start();
////kullanıcının giriş yapmış olup olmadığını kontrol ediliyor
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}
//Ürün miktarlarını toplama
$countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
$countresult = mysqli_query($link, $countsql);
$countrow = mysqli_fetch_assoc($countresult);      
$count = $countrow['SUM(`itemQuantity`)'];
if(!$count) {
  $count = 0;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hakkımızda | Yücel Cafe&Restaurant</title>
	<link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="phone.css">
	<link rel="stylesheet" href="Aboutus.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lato&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
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
	<div class="team-section">
		<div class="container">
			<div class="row">
				<div class="title">
					<h1>Geliştiricilerimiz</h1>
					<p>Birşeyler deniyoruz geliştiriyoruz :)</p>
				</div>
				<hr color="#eb6234;">
			</div>
			<div class="team-card">
				<div class="card">
					<div class="image-section">
						<img src="./images/portrait-young-man.jpg" alt="">
					</div>
					<div class="content">
						<h1>Mehmet Yücel</h1>
						<p><a href="https://www.linkedin.com/in/mehmet-y%C3%BCcel-95b2a3264/" target="_blank"> <img src="./images/linkedin.png" alt=""> </a><a href="https://www.instagram.com/mehmet_ycl18/" target="_blank"><img src="./images/insta.png" alt=""></a><a href="https://github.com/MehmetY18" target="_blank"><img src="./images/git.png" alt=""></a></p>
					</div>
				

			</div>
		</div>
	</div>
	<script src="nav.js"></script>
</body>
</html>