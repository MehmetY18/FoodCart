<?php
include 'config.php'; /*PHP dosyalarında tekrar tekrar aynı bağlantı bilgilerini yazmak yerine bu kısa yöntem kullanılıyor*/
session_start(); 
echo "Çıkış Yapılıyor. Lütfen Bekleyin...";
if(isset($_SESSION['username'])){ /* süper global dizisi içinde 'username' anahtarı varsa, yani bir kullanıcı oturumu başlatılmışsa, içerideki işlemleri gerçekleştirir.*/
unset($_SESSION["loggedin"]); 
unset($_SESSION["username"]);
unset($_SESSION["userId"]);
/*/*süper global dizisindeki belirtilen anahtarları kaldırır. Bu durumda, oturum değişkenleri (loggedin, username ve userId) temizlenir.*/

session_unset(); /*fonksiyonu, tüm oturum değişkenlerini kaldırır.*/
session_destroy();/* fonksiyonu ise, mevcut oturumu sonlandırır ve oturum bilgilerini siler.*/
}
if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){ /* Bu ifade, eğer "user" ve "pass" adında tanımlanmış çerezler (cookies) varsa, içerideki işlemleri gerçekleştirir.*/
    setcookie("user", '', time() - (3600));
    setcookie("pass", '', time() - (3600));
    /*fonksiyonu, bir çereze boş bir değer atanarak ve süresi geçmiş bir zaman dilimi belirtilerek çerezi siler.*/
}
header("location: /MyFoodKart/home.html"); /*Çıkış yaptıktan sonra bu adrese gönder*/
?>