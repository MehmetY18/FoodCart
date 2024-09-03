<?php
include 'configfortwoconnection.php'; /*PHP dosyalarında tekrar tekrar aynı bağlantı bilgilerini yazmak yerine bu kısa yöntem kullanılıyor*/

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    if(isset($_POST['addToCart'])) {  /*bir ürünü sepete ekleyip eklemediğini kontrol ediliyoruz*/
        $itemId = $_POST["itemId"];
        //itemId olup olmadığını kontrol ediyoruz
        $existSql = "SELECT * FROM `viewcart` WHERE itemId = '$itemId' AND `userId`='$userId'";
        /*Bir ürünün sepete daha önce eklenip eklenmediğini kontrol eder.*/
        $result = mysqli_query($link, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            echo "<script>alert('Böyle bir ürün zaten var');
                    window.history.back(1);
                    </script>";
        }
        else{
            //Ürüne sepete ekleye basınca sepete gelmesini sağlayan kısım
            $sql = "INSERT INTO `viewcart` (`itemId`, `itemQuantity`, `userId`, `addedDate`) VALUES ('$itemId', '1', '$userId', current_timestamp())";   
            $result = mysqli_query($link, $sql);
            if ($result){
                echo "<script>
                    window.history.back(1);
                    </script>";
            }
        }
    } 
     //sepetten kaldırma işlemi
    if(isset($_POST['removeItem'])) { //basılıp basılmadığı kontrol ediliyor
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `viewcart` WHERE `itemId`='$itemId' AND `userId`='$userId'";   
        $result = mysqli_query($link, $sql);
        echo "<script>alert('Silindi');
                window.history.back(1);
            </script>";
    }
    //tüm ürünleri sepetten kaldırma işlemi 
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
        $result = mysqli_query($link, $sql);
        echo "<script>alert('Hepsini Temizle');
                window.history.back(1);
            </script>";
    }
    //ödeme işlemi kısmı
    if(isset($_POST['checkout'])) {
        $amount = $_SESSION["amount"];
        $address1 = $_POST["address"];
        $address2 = $_POST["address1"];
        $phone = $_POST["phone"];
        $zipcode = $_POST["zipcode"];
        $password = $_POST["password"];
        $address = $address1.", ".$address2;
        
        $passSql = "SELECT * FROM users WHERE userid='$userId'"; 
        $passResult = mysqli_query($link, $passSql);
        $passRow=mysqli_fetch_assoc($passResult);
        $userName = $passRow['username'];
        if (password_verify($password, $passRow['password'])){ 
            $sql = "INSERT INTO `orders` (`userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES ('$userId', '$address', '$zipcode', '$phone', '$amount', '0', '0', current_timestamp())";
            $result = mysqli_query($link, $sql);
            $orderId = $link->insert_id;
            if ($result){
                $addSql = "SELECT * FROM `viewcart` WHERE userId='$userId'"; 
                $addResult = mysqli_query($link, $addSql);
                while($addrow = mysqli_fetch_assoc($addResult)){
                    $itemId = $addrow['itemId'];
                    $itemQuantity = $addrow['itemQuantity'];
                    $itemSql = "INSERT INTO `orderitems` (`orderId`, `itemId`, `itemQuantity`) VALUES ('$orderId', '$itemId', '$itemQuantity')";
                    $itemResult = mysqli_query($link, $itemSql);
                }
                $deletesql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
                $deleteresult = mysqli_query($link, $deletesql);
                echo '<script>alert("Bizden alışveriş yaptığınız için teşekkür ederiz. Sipariş numaranız ' .$orderId. '.");
                    window.location.href="http://localhost:8080/MyFoodKart/viewOrder.php";  
                    </script>';
                    exit();
            }
        } 
        else{
            echo '<script>alert("Yanlış Parola! Lütfen Doğru Şifreyi Girin");
                    window.history.back(1);
                    </script>';
                    exit();
        }    
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $itemId = $_POST['itemId'];
        $qty = $_POST['quantity'];
        $updatesql = "UPDATE `viewcart` SET `itemQuantity`='$qty' WHERE `itemId`='$itemId' AND `userId`='$userId'";
        $updateresult = mysqli_query($link, $updatesql);
    }
    
}
?>


