<?php
    if(isset($_GET['user']) && isset($_GET['product']))
    {
        $userID = $_GET['user'];
        $productID = $_GET['product'];

        $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");

        $previouslyLiked=mysqli_query($connection, "select * from likedproducts where UserID='$userID' and ProductID='$productID'");

        if(mysqli_num_rows($previouslyLiked) == 0)
            $likeProduct = mysqli_query($connection, "insert into likedproducts (UserID, ProductID) values ('$userID', '$productID')");

        mysqli_close($connection);

        echo "<body onload=history.go(-1);>";
    }
?>