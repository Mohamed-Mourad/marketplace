<?php
    session_start();
?>

<style>
    <?php include 'navbar.css'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
    echo "</head>";
    
    function generateNavbar()
    {
        echo "<nav>";
            echo "<ul>";
                echo "<li><a href=home.php>Home</a></li>";
                echo "<li><a href=search.php>Search</a></li>";

                if(isset($_SESSION['user_id']))
                {
                    $uid = $_SESSION['user_id'];
                    echo "<li><a href=logout.php>Logout</a></li>";

                    $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
        
                    $getProfilePicture = mysqli_query($connection, "Select * from customers where user_id=$uid");
                    $user = mysqli_fetch_array($getProfilePicture);

                    //echo "<li><a href=logout.php>$user[user_name]</a></li>";

                    //echo "<li><a href=profile.php><i class=material-icons>&#xe7ff;</i></a></li>";   
                    
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
            echo "</ul>";
        echo "</nav>";
    }

    function generateMarketNavbar()
    {
        echo "<nav>";
            echo "<ul>";
                echo "<li><a href=home.php>Home</a></li>";
                echo "<li><a href=search.php>Search</a></li>";
                echo "<li><a href=addProduct.php>Add Product</a></li>";

                if(isset($_SESSION['user_id']))
                {
                    $uid = $_SESSION['user_id'];
                    echo "<li><a href=logout.php>Logout</a></li>";

                    $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
        
                    $getProfilePicture = mysqli_query($connection, "Select * from markets where user_id=$uid");
                    $user = mysqli_fetch_array($getProfilePicture);

                    //echo "<li><a href=logout.php>$user[market_name]</a></li>";

                    //echo "<li><a href=profile.php><i class=material-icons>&#xe7ff;</i></a></li>";   
                    
                    echo "<div class=profilePicture>";
                        echo "<li><a href=profile.php><img src='uploads/$user[profile_picture]' class=profilePicture></a></li>";
                    echo "</div>";
                    mysqli_close($connection);
                }
                else
                {
                    echo "<li><a href=login.php>Login</a></li>";
                    echo "<li><a href=profile.php><i class=material-icons>&#xe7ff;</i></a></li>";   
                }
            echo "</ul>";
        echo "</nav>";
    }
?>