<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&family=Lobster&family=Tapestry&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="login_signup.css">
	<link rel="stylesheet" type="text/css" href="home.css">

	<title>Kayıt Ol| Yücel Cafe&Restaurant</title>
</head>
<body>

	<div class="container">
		<form action="signup.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Kayıt ol</p>
			<div class="input-group">
				<input type="text" placeholder="Kullanıcı Adı" name="username" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="E-mail" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Şifre" name="password" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Şifreyi Onayla" name="cpassword"required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Kayıt Ol</button>
			</div>
			<p class="login-register-text">Zaten bir hesabın var mı? <a href="login.php">Giriş Yap</a>.</p>
		</form>

  </div>
</body>
</html>
            
          
        
      
    

<?php
$showAlert = false;
$showError = false;
//kullanıcı var mı yok mu kontrol ediliyor eğer var ise giriş yap yok ise kayıt işlemi devam edicek
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'config.php';/*PHP dosyalarında tekrar tekrar aynı bağlantı bilgilerini yazmak yerine bu kısa yöntem kullanılıyor*/
    $username = $_POST["username"];
    // $firstName = $_POST["firstName"];
    // $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    // $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    //kullanıcı adı var mı yok mu kontrol etme
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($link, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
      $showError = '<div style="position:absolute; bottom: 25px; color:red;">Username already exists.</div>';
        echo $showError;
    }
    else{
      if(($password == $cpassword)){
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `users` ( `username`,`email`, `password`, `joinDate`) VALUES ('$username',  '$email',  '$hash', current_timestamp())";   
          $result = mysqli_query($link, $sql);
          if ($result){
              $showAlert = true;
              header("Location: /MyFoodKart/login.php?signupsuccess=true");
          }
      }
      else{
        $showError = '<div style="position:absolute; bottom: 25px; color:red;">Passwords do not match.</div>';
          echo $showError ;
      }
    }
}
    
?>