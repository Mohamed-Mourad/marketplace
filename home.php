<?php
    session_start();
?>

<style>
    <?php include 'home.css'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
    echo "</head>";

    generateHomePage();
    
    function generateHomePage()
    {
        echo "<body>";
            
            echo "<div class=header>";
                echo "<nav>";
                    echo "<ul>";
                        echo "<li><a href=home.php>Home</a></li>";
                        echo "<li><a href=search.php>Search</a></li>";
                        if(isset($_SESSION['user_id'])){
                            $uid = $_SESSION['user_id'];
                            $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
                            $QGetUser = mysqli_query($connection, "SELECT * FROM customers WHERE user_id = '$uid'");
                            $user = mysqli_fetch_array($QGetUser);
                            mysqli_close($connection);
                            echo "<li><a href=logout.php>Logout</a></li>";
                            // uploads/$user['profile_picture']
                            echo "<li><a href=profile.php><i class=material-icons>&#xe7ff;</i></a></li>";
                        }else{
                            echo "<li><a href=login.php>Login</a></li>";
                            echo "<li><a href=profile.php><i class=material-icons>&#xe7ff;</i></a></li>";   
                        }
                    echo "</ul>";
                echo "</nav>";

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
                        $name=$row["Name"];
                        $image=$row["Image"];
                        $brand=$row["Brand"];
                        $marketId=$row["MarketId"];
                        $price=$row["Price"];
                        $brief=$row["Brief"];
                        $stock=$row["InStock"];

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
                                    echo "<a>$$price</a><a href=buyNow.php>Buy Now</a><br>";
                                echo "</div>";
                            echo "</div>";

                        echo "</div>";
                    }
                }
                mysqli_close($con);

            echo "</section>";
        }
        echo "</body>";
?>