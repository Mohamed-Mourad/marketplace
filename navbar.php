<style>
    <?php include 'navbar.css'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
    echo "</head>";

    generateNavbar();
    
    function generateNavbar()
    {
        echo "<nav>";
            echo "<ul>";
                echo "<li><a href=home.php>Home</a></li>";
                echo "<li><a href=search.php>Search</a></li>";
                echo "<li><a href=login.php>Login</a></li>";
                echo "<li><a href=profile.php><i class=material-icons>&#xe7ff;</i></a></li>";
            echo "</ul>";
        echo "</nav>";
    }
?>