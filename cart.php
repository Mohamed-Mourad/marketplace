<?php
    session_start();
?>

<style>
    <?php include 'home.css'; ?>
    <?php include 'cart.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
        echo "<script src=https://kit.fontawesome.com/a076d05399.js crossorigin=anonymous></script>";
    echo "</head>";

    generateInCart();
    
    function generateInCart()
    {
        echo "<body>";
            
            echo "<div class=header>";

                generateNavbar();

                echo "<div class=productsSection>";

                    echo "<h1>Checkout.</h1>";

                    if((isset($_SESSION['user_id'])))
                    {
                        $con=mysqli_connect("localhost", "root" , "12345678", "marketplace");

                        foreach($_COOKIE as $key => $value)
                        {
                            if($value == "productID")
                            {
                                $inCart=mysqli_query($con, "select * from products where ProductID='$key'");
                                while($row=mysqli_fetch_assoc($inCart))
                                {
                                    $name=$row["Name"];
                                    $image=$row["Image"];
                                    $brand=$row["Brand"];
                                    $marketId=$row["MarketId"];
                                    $price=$row["Price"];
                                    $stock=$row["InStock"];

                                    $loggedUser = $_SESSION["user_id"];

                                    echo "<div class=shoppingCart>";

                                        echo "<div class=item id=item>";

                                            echo "<div class=delete>";
                                                echo "<button class=deleteButton onclick=remove($key)><i class=material-icons>&#xe872;</i></button>";
                                            echo "</div>";
                                    
                                            echo "<div class=image>";
                                                echo "<img src='productImages/$image'>";
                                            echo "</div>";
                                    
                                            echo "<div class=description>";
                                                echo "<span>$name</span>";
                                                echo "<span>Brand: $brand</span>";
                                            echo "</div>";
                                    
                                            echo "<div class=quantityAndPrice>";
                                                echo "<div class=quantity>";
                                                    echo "<span>$$price</span>";
                                                echo "</div>";
                                                echo "<div class=quantity>";
                                                    echo "<button class=add name=button onclick=add($key)><i class='fas'>&#xf067;</i></button>";
                                                    echo "<input type=text id=$key name=name value=1>";
                                                    echo "<button class=subtract name=button onclick=subtract($key)><i class='fas'>&#xf068;</i></button>";
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                            }
                        }
                        echo "<a href=checkout.php><button class=checkout>Check Out</button></a>";
                        echo "<a href=purchaseHistory.php><button class=purchaseHistory>Previous Orders</button></a>";
                    }
                    else
                        echo "<h3>Please Login To View Your Cart</h3>";
                echo "</div>";
            echo "</div>";
        echo "</body>";
    }
?>


<script>

    function remove(key) 
    {
        var remove = document.getElementById("item");
        remove.parentNode.removeChild(remove);
        document.cookie=key+"="+key+";max-age=0";
        window.location.reload();
    }

    function add(key)
    {
        document.getElementById(key).value++;
    }

    function subtract(key)
    {
        if(document.getElementById(key).value == 0){
            remove(key);
        }else
            document.getElementById(key).value--;
    }

</script>