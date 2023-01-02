<?php
    session_start();
?>

<style>
    <?php include 'navbar.css'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
        echo "<script src=https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js></script>";
    echo "</head>";
    
    function generateNavbar()
    {
        echo "<nav>";
            echo "<ul>";
                
                echo "<li><a href=home.php>Home</a></li>";
                echo "<li><a href=brands.php>Brands</a></li>";
                echo "<li><a href=favProducts.php>Wishlist</a></li>";
                echo "<li><a href=cart.php>Cart</a></li>";

                if(isset($_SESSION['user_id']))
                {
                    $uid = $_SESSION['user_id'];
                    echo "<li><a href=logout.php>Logout</a></li>";

                    $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
        
                    $getProfilePicture = mysqli_query($connection, "Select * from customers where user_id=$uid");
                    $user = mysqli_fetch_array($getProfilePicture);
                    
                    echo "<div class=profilePicture>";
                        echo "<li><a href=profile.php><img src='uploads/$user[profile_picture]'></a></li>";
                    echo "</div>";
                    
                    mysqli_close($connection);
                }
                else
                {
                    echo "<li><a href=login.php>Login</a></li>";
                    echo "<li><a href=profile.php><i class=material-icons>&#xe7ff;</i></a></li>";   
                }

                echo "<form action=search.php method=get>";
                    echo "<div class=search-box>";
                        echo "<input type=text class=input name=search placeholder=Search>";
                        echo "<input type=submit class=submit>";
                    echo "</div>";
                
                    echo "<div class=icon>";
                        echo "<i class=material-icons>&#xe8b6;</i>";
                    echo "</div>";
                echo "</form>";

            echo "</ul>";
        echo "</nav>";
    }

    function generateMarketNavbar()
    {
        echo "<nav>";
            echo "<ul>";
                
                echo "<li><a href=home.php>Home</a></li>";
                echo "<li><a href=addProduct.php>Add Product</a></li>";

                if(isset($_SESSION['user_id']))
                {
                    $uid = $_SESSION['user_id'];
                    echo "<li><a href=logout.php>Logout</a></li>";

                    $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
        
                    $getProfilePicture = mysqli_query($connection, "Select * from markets where user_id=$uid");
                    $user = mysqli_fetch_array($getProfilePicture);
                    
                    echo "<div class=profilePicture>";
                        echo "<li><a href=profile.php><img src='uploads/$user[profile_picture]'></a></li>";
                    echo "</div>";
                    
                    mysqli_close($connection);
                }
                else
                {
                    echo "<li><a href=login.php>Login</a></li>";
                    echo "<li><a href=profile.php><i class=material-icons>&#xe7ff;</i></a></li>";   
                }

                echo "<form action=search.php method=get>";
                    echo "<div class=search-box>";
                        echo "<input type=text class=input name=search placeholder=Search>";
                        echo "<input type=submit class=submit>";
                    echo "</div>";
                
                    echo "<div class=icon>";
                        echo "<i class=material-icons>&#xe8b6;</i>";
                    echo "</div>";
                echo "</form>";

            echo "</ul>";
        echo "</nav>";
    }
?>

<script>
	$(function()
    {
		$(".icon").click(function()
        {
			$(".input").toggleClass("active");
		})
	});
</script>