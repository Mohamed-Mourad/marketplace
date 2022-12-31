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

    generateSearchPage();
    
    function generateSearchPage()
    {
        echo "<body>";
            
            echo "<div class=header>";

                generateNavbar();

                echo "<div class=productsSection>";
                echo "<h1>Search Results.</h1>";

                $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
        
                $search = $_GET["search"];
                
                $getSearchResults = mysqli_query($connection, "Select * from products where Name='$search'");
                
                $num_rows = mysqli_num_rows($getSearchResults);

                if($num_rows==0)
                {
                    echo "<h3>Sorry, This Product Is Not Currently On The Market :(</h3>";
                    return;
                }
                else
                {
                    while($row=mysqli_fetch_assoc($getSearchResults))
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
                                    echo "<h3>$name<br/></h3>";
                                    echo "<h5>Brand: $brand</h5>";
                                    echo "<p>$brief</p>";
                                echo "</div>";

                                echo "<div class=stockBuy>";
                                    echo "<h5>Quantity In Stock: $stock</h5>";
                                    echo "<div class=button>";
                                        echo "<a>$$price</a><a onclick=addToCart($productId)>Buy Now</a><a href=likeProduct.php?user=$loggedUser&product=$productId onclick=like()><i class=fas>&#xf004;</i></a><br>";
                                    echo "</div>";
                                echo "</div>";

                            echo "</div>";
                        }
                    }
                    mysqli_close($connection);
                echo "</div>";
            echo "</div>";
        echo "<body>";
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