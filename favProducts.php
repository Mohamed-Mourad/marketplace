<?php
    session_start();
?>

<style>
    <?php include 'home.css'; ?>
    <?php include 'search.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
        echo "<script src=https://kit.fontawesome.com/a076d05399.js crossorigin=anonymous></script>";
    echo "</head>";

    generateFavProducts();
    
    function generateFavProducts()
    {
        echo "<body>";
            
            echo "<div class=header>";

                generateNavbar();

                echo "<div class=productsSection>";

                echo "<h1>Liked Products.</h1>";

                $loggedUser = $_SESSION["user_id"];

                $connection=mysqli_connect("localhost", "root" , "12345678", "marketplace");

                $likedProducts=mysqli_query($connection, "select * from likedproducts where UserID='$loggedUser'");

                $num_rows = mysqli_num_rows($likedProducts);

                if($num_rows==0)
                    echo "<h3>Wishlist Is Empty :(</h3>";
                else
                {
                    while($row=mysqli_fetch_assoc($likedProducts))
                    {
                        $productId=$row["ProductID"];

                        $getProduct=mysqli_query($connection, "select * from products where ProductID='$productId'");

                        $product=mysqli_fetch_assoc($getProduct);

                        $productId=$row["ProductID"];
                        $name=$product["Name"];
                        $image=$product["Image"];
                        $brand=$product["Brand"];
                        $marketId=$product["MarketId"];
                        $price=$product["Price"];
                        $brief=$product["Brief"];
                        $stock=$product["InStock"];

                        echo "<div class=card>"; 
                            echo "<div class=image>"; 
                                echo "<img src='productImages/$image'>";
                            echo "</div>";

                        echo "<div class=details>";
                            echo "<h3>$name<br/></h3>";
                            echo "<h5>Brand: $brand</h5>";
                            echo "<p>$brief</p>";
                        echo "</div>";

                        echo "<div class=stockBuy>";
                            echo "<h5>Stock: $stock</h5>";
                            echo "<div class=button>";
                                echo "<a>$$price</a><a onclick=addToCart($productId)>Buy Now</a><a href=likeProduct.php?user=$loggedUser&product=$productId onclick=like()><i class=fas>&#xf004;</i></a><br>";
                            echo "</div>";
                        echo "</div>";

                        echo "</div>";
                    }
                }
                echo "</div>";
            echo "</div>";
        echo "</body>";
    }
?>

<script>
    function like()
    {
        alert('Item Added To Your Wishlist!');
    }

    function addToCart(productId)
    {
        document.cookie = productId + "=productID";  
        alert('Item Added To Cart!');
    }
</script>
