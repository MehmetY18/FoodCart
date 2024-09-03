<?php 
include 'configfortwoconnection.php'; /*PHP dosyalarında tekrar tekrar aynı bağlantı bilgilerini yazmak yerine bu kısa yöntem kullanılıyor*/
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
            <h2>MyFoodKart</h2>
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

        <h1> Tatlı ve Kek </h1>
        <div class="row">
            <!-- Fetch all the categories and use a loop to iterate through categories -->
            <div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/bademcilek1.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">Yulaflı Badem Unlu Çilekli Tart</h5>
                            <p class="card-text" style="color: red">220₺</p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="46">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/bademunlukek41.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">Badem Unlu Elmalı Kek</h5>
                            <p class="card-text" style="color: red">250₺</p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="47">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/minikek4.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">Şekersiz Mini Cheesecake</h5>
                            <p class="card-text" style="color: red">180₺</p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="48">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/pannekek2.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">Portakallı Tepsi Keki</h5>
                            <p class="card-text" style="color: red">150₺</p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="49">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/karamelsoskek.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">Tahinli Karamel Soslu Çikolatalı Kek</h5>
                            <p class="card-text" style="color: red">260₺</p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="50">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button></form>
                          </div>
                        </div>
                      </div><div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="./images/pancarlibrownie7.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                          <div class="card-body">
                            <h5 class="card-title" style="color:#007bff;">Pancarlı Brownie</h5>
                            <p class="card-text" style="color: red">220₺</p>
                            <form action="_manageCart.php" method="POST">
                              <input type="hidden" name="itemId" value="51">
                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button></form>
                          </div>
                        </div>
                        </div><div class="col">
                      <div class="card" style="width: 18rem;">
                        <img src="./images/cupcake.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                        <div class="card-body">
                          <h5 class="card-title" style="color:#007bff;">Cupcake</h5>
                          <p class="card-text" style="color: red">245₺</p>
                          <form action="_manageCart.php" method="POST">
                            <input type="hidden" name="itemId" value="52">
                            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button></form>
                        </div>
                      </div>
                    </div><div class="col">
                      <div class="card" style="width: 18rem;">
                        <img src="./images/tutsy4.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                        <div class="card-body">
                          <h5 class="card-title" style="color:#007bff;">Tuty's Cakes Çikolatalı Cupcake</h5>
                          <p class="card-text" style="color: red">190₺</p>
                          <form action="_manageCart.php" method="POST">
                            <input type="hidden" name="itemId" value="53">
                            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button></form>
                        </div>
                      </div>
                    </div><div class="col">
                      <div class="card" style="width: 18rem;">
                        <img src="./images/cheesetart2.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                        <div class="card-body">
                          <h5 class="card-title" style="color:#007bff;">Cheesecake Tart</h5>
                          <p class="card-text" style="color: red">150₺</p>
                          <form action="_manageCart.php" method="POST">
                            <input type="hidden" name="itemId" value="54">
                            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Sepete Ekle</button></form>
                        </div>
                      </div>
                    </div>
                    </div>
                    </div>  
                    </div>
        </div>
        <script src="nav.js"></script>
    </body>
</html>