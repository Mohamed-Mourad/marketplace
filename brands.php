<?php
    session_start();
?>

<style>
    <?php include 'home.css'; ?>
    <?php include 'brands.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    echo "<head>";
        echo "<script src=https://kit.fontawesome.com/a076d05399.js crossorigin=anonymous></script>";
    echo "</head>";

    generateBrandsPage();
    
    function generateBrandsPage()
    {
        echo "<body>";
            echo "<div class=header>";
                
                generateNavbar();

                echo "<div class=brandsSection>";

                $loggedUser = $_SESSION["user_id"];

                    echo "<h1>Our Brands.</h1>";
                        $connection=mysqli_connect("localhost", "root" , "12345678", "marketplace");

                        $allBrands=mysqli_query($connection, "select * from brands");

                        while($row=mysqli_fetch_assoc($allBrands))
                        {
                            $brandName=$row["BrandName"]; 
                            echo "<div class=details>";
                                echo "<a href=likeBrand.php?user=$loggedUser&brand=$brandName><i class='fas'>&#xf004;</i></a>";
                                echo "<h3>$brandName<br/></h3>";
                            echo "</div>";
                        }

                    echo "<h1>Liked Brands.</h1>";
                        $likedBrands=mysqli_query($connection, "select * from likedBrands where UserID='$loggedUser'");

                        while($brandRow=mysqli_fetch_assoc($likedBrands))
                        {
                            $liked=$brandRow["BrandName"]; 
                            echo "<div class=details>";
                                echo "<h3>$liked<br/></h3>";
                            echo "</div>";
                        }
                        
                echo "</div>";
            echo "</div>";
        echo "</body>";
    }
?>