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
//ürün miktarlarını toplama
$countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
$countresult = mysqli_query($link, $countsql);
$countrow = mysqli_fetch_assoc($countresult);      
$count = $countrow['SUM(`itemQuantity`)'];
if(!$count) {
  $count = 0;
}?><!DOCTYPE html>
<html>
    <head>
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Menü | Yücel Cafe&Restaurant </title>
            <link rel="stylesheet" href="menu.css">
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

  <h1> Et Ve Tavuk Yemekleri </h1>
  <div class="row">
    <!-- Fetch all the categories and use a loop to iterate through categories -->
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/arpatavuk.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">Enginarlı Arpa Şehriyeli Tavuk</h5>
          <p class="card-text" style="color: red">250₺ </p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="1">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/fasulyetavuk1.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">Fırında Fasulyeli Tavuk</h5>
          <p class="card-text" style="color: red">180₺</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="2">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/pkebap1.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">Patlıcan Kebabı</a></h5>
          <p class="card-text" style="color: red">300₺</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="3">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/fftavuk.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">Fırında Domatesli Tavuk</h5>
          <p class="card-text" style="color: red">250₺</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="4">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/psinitzel.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">Portakal Soslu Tavuk Şinitzel</h5>
          <p class="card-text" style="color: red">300₺</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="5">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/tepsikofte.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">Tepsi Kebabı</h5>
          <p class="card-text" style="color: red">320₺</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="6">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/alinazikss.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">Alinazik</h5>
          <p class="card-text" style="color: red">260₺</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="7">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/otlupilic.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">Otlu Kremalı Tavuk</h5>
          <p class="card-text" style="color: red">380₺</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="8">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="./images/patra.jfif" class="card-img-top" alt="image for this category" width="249px" height="270px">
        <div class="card-body">
          <h5 class="card-title" style="color: #007bff">Bezelyeli Baklalı Tavuklu Pilav</a></h5>
          <p class="card-text" style="color: red">220₺</p>
          <form action="_manageCart.php" method="POST">
            <input type="hidden" name="itemId" value="9">
            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
    <script src="nav.js"></script>
</body>

</html>