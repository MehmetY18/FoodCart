<?php 
include 'configfortwoconnection.php';/*PHP dosyalarında tekrar tekrar aynı bağlantı bilgilerini yazmak yerine bu kısa yöntem kullanılıyor*/
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
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Menü | Yücel Cafe&Restaurant </title>
            <link rel="stylesheet" href="./menu.css" type="text/css">
            <link rel="stylesheet" href="home.css">
            <link rel="stylesheet" href="phone.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
        </head>
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
<br>



        <h1> Kategoriler - Menü </h1>
        <div class="row">
            <!-- Fetch all the categories and use a loop to iterate through categories -->
            <div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/tavatavuk.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title"><a href="gujarati.html">Et Ve Tavuk Yemekleri</a></h5>
                            <p class="card-text">Etli Yemekler Dünyası!</p>
                            <a href="etvetavukyemekleri.php" class="btn">Tümünü Gör</a>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/karnabaharpilavi.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title"><a href="punjabi.html">Sebze Yemekleri</a></h5>
                            <p class="card-text">Sebze Cenneti</p>
                            <a href="sebzeyemekleri.php" class="btn">Tümünü Gör</a>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/dutsarma.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title"><a href="chinese.html">Zeytinyağlı Yemekler</a></h5>
                            <p class="card-text">Zeytinyağlı Mis gibi Leziz Yemekler</p>
                            <a href="zeytinyagliyemekler.php" class="btn">Tümünü Gör</a>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/kirbibercor.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title"><a href="corbalar.php">Çorbalar</a></h5>
                            <p class="card-text">İçinizi ısıtan sıcacık çorba!</p>
                            <a href="corbalar.php" class="btn">Tümünü Gör</a>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/istavrit.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title"><a href="beverges.html">Balık ve Deniz Ürünleri</a></h5>
                            <p class="card-text">Denizcilerin Mutfağından!</p>
                            <a href="balikvedenizurunleri.php" class="btn">Tümünü Gör</a>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/trilece.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title"><a href="south-indian.html">Tatlı ve Kek</a></h5>
                            <p class="card-text">Tatlı Yiyelim Tatlı Konuşalım :) </p>
                            <a href="tatlivekek.php" class="btn">Tümünü Gör</a>
                          </div>
                        </div>
                      </div>  
                      
                      </div>
        </div>
      
    </body>
    <script src="nav.js"></script>
</html>

<?php }
else {
  echo "<script>alert('Menü için, önce giriş yapın');
  window.history.back(1);
  </script>";
}
?>