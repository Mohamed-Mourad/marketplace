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
?>

<script>
    const cookies = document.cookie.split(";");

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i];
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
</script>

<?php
    echo "<script>window.location.href='home.php';</script>";
?>