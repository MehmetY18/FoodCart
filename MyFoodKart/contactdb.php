<?php
include 'configfortwoconnection.php';/*PHP dosyalarında tekrar tekrar aynı bağlantı bilgilerini yazmak yerine bu kısa yöntem kullanılıyor*/
$name = $_POST["fname"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$message = $_POST["message"];
//İletişim kısmı
$sql = "INSERT INTO contact(  `name`, `email`, `mobile`, `message`) VALUES ('{$name}','{$email}','{$mobile}', '{$message}' )";
$result = mysqli_query($link, $sql) or die("Query Failed!");
if($result){
    echo "<script>alert('Mesajınız başarıyla gönderildi');
    window.history.back(1);
    </script>";
  }
mysqli_close($link);
?>
