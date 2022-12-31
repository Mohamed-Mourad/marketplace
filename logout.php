<?php
    session_start();
    unset($_SESSION["user_id"]);
    session_destroy();
    if (isset($_SERVER['HTTP_COOKIE'])) 
    {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        
        foreach($cookies as $cookie) 
        {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/');
        }
    }
    echo "<script>window.location.href='home.php';</script>";
?>