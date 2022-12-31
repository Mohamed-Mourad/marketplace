<?php
    if(isset($_GET['user']) && isset($_GET['brand']))
    {
        $userID = $_GET['user'];
        $brandName = $_GET['brand'];

        $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");

        $brandExists=mysqli_query($connection, "select * from brands where BrandName='$brandName'");

        if(mysqli_num_rows($brandExists) == 1)
        {
            $previouslyLiked=mysqli_query($connection, "select * from likedbrands where UserID='$userID' and BrandName='$brandName'");

            if(mysqli_num_rows($previouslyLiked) == 0)
                $likeBrand = mysqli_query($connection, "insert into likedbrands (UserID, BrandName) values ('$userID', '$brandName')");
        }

        mysqli_close($connection);

        echo "<body onload=history.go(-1);>";
    }
?>