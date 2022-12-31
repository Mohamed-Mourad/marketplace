<?php
    if(isset($_GET['user']) && isset($_GET['payment']))
    {
        $userID = $_GET['user'];
        $paymentType = $_GET['payment'];

        $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");

        foreach($_COOKIE as $key => $value)
        {
            if($value == "productID")
                $addOrderToHistory = mysqli_query($connection, "insert into purchaseHistory (UserID, ProductID, Status) values ('$userID', '$key', '$paymentType')");
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
    alert('Confirmed! Shipping To Your Address');
    window.location.href='home.php';
</script>