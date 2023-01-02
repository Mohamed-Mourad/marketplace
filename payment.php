<?php
    session_start();

    if(isset($_GET['user']) && isset($_GET['payment']))
    {
        $userID = $_GET['user'];
        $paymentType = $_GET['payment'];

        $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");

        foreach($_COOKIE as $key => $value)
        {
            $product = json_decode($value);
            $pid = $product->productID;
            $quantity = $product->quantity;

            $getProduct = mysqli_query($connection, "SELECT * FROM products WHERE ProductID='$pid'");
            $product = mysqli_fetch_array($getProduct);
            $mid = $product["MarketID"];
            $price = $product["Price"];
            $InStock = $product["InStock"];
            $newInStock = ($InStock - $quantity);

            $getMarket = mysqli_query($connection, "SELECT * FROM markets WHERE user_id='$mid'");
            $market = mysqli_fetch_array($getMarket);
            $balance = $market["balance"];
            $newBalance = ($balance + ($price * $quantity));
            
            //if($value == "productID")
            $addOrderToHistory = mysqli_query($connection, "insert into purchaseHistory (UserID, ProductID, Status) values ('$userID', '$key', '$paymentType')");
            $updateMarketBalance = mysqli_query($connection, "update markets set balance='$newBalance' where user_id='$mid'");
            $updateProductStock = mysqli_query($connection, "update products set InStock='$newInStock' where ProductID='$pid'");
        }

        mysqli_close($connection);

        if (isset($_SERVER['HTTP_COOKIE'])) 
        {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            
            foreach($_COOKIE as $key => $value) 
            {
                if($value == "productID")
                    setcookie($key,$value, time()-3600);
            }
        }
    }
?>

<script>
    
    const cookies = document.cookie.split(";");

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i];
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }

    alert('Confirmed! Shipping To Your Address');
    window.location.href='home.php';
</script>