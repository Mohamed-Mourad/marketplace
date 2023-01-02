<?php
    session_start();
?>

<style>
    <?php include 'home.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
        echo "<script src=https://kit.fontawesome.com/a076d05399.js crossorigin=anonymous></script>";
    echo "</head>";

    generateHomePage();
    
    function generateHomePage()
    {
        echo "<body>";
            
            echo "<div class=header>";

                if(($_SESSION['user_type'] == "Market") && isset($_SESSION['user_type']))
                    generateMarketNavbar();
                else
                    generateNavbar();

                echo "<div id=slogan>";
                    echo "<h1>CompHive.</h2>";
                    echo "<h3>The hive of all things tech</h3>";
                echo "</div>";

                echo "<div id=explore>";
                    echo "<a href=#productSection>";
                        echo "<p>Explore Products</p>";
                        echo "<i class=material-icons>&#xe5db;</i>";
                    echo "</a>";
                echo "</div>";

            echo "</div>";
            
            echo "<section id=productSection>";

                echo "<h1>Best Sellers.</h1>";

                $con=mysqli_connect("localhost", "root" , "12345678", "marketplace");
                if($con)
                {
                    $selectBestSellers=mysqli_query($con, "select * from products where BestSeller=1");

                    while($row=mysqli_fetch_assoc($selectBestSellers))
                    {
                        $productId=$row["ProductID"];
                        $name=$row["Name"];
                        $image=$row["Image"];
                        $brand=$row["Brand"];
                        $marketId=$row["MarketId"];
                        $price=$row["Price"];
                        $brief=$row["Brief"];
                        $stock=$row["InStock"];

                        $loggedUser = $_SESSION["user_id"];

                        echo "<div class=card>"; 
                            echo "<div class=image>"; 
                                echo "<img src='productImages/$image'>";
                            echo "</div>";

                            echo "<div class=details>";
                                echo "<h3>$name</h3>";
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
                mysqli_close($con);
            echo "</section>";
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