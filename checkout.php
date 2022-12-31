<?php
    session_start();
?>

<style>
    <?php include 'home.css'; ?>
    <?php include 'checkout.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
        echo "<script src=https://kit.fontawesome.com/a076d05399.js crossorigin=anonymous></script>";
    echo "</head>";

    generatePage();

    function generatePage()
    {
        generateInCart();

        $loggedUser = $_SESSION["user_id"];

        if (isset($_POST['card'])) 
            echo "<script>window.location.href='payment.php?user=$loggedUser&payment=card';</script>";

        if (isset($_POST['cash'])) 
            echo "<script>window.location.href='payment.php?user=$loggedUser&payment=cash';</script>";
    }

    function generateInCart()
    {
        echo "<body>";
            
            echo "<div class=header>";

                generateNavbar();

                echo "<form class=checkout_form method=post>";
                echo "<h1>Payment Details</h1>";
                    echo "<div class=details>";
                            
                        echo "<div class=section>";
                            echo "<input type=text placeholder='Card Number' required>";
                        echo "</div>";

                        echo "<div class=section>";
                            echo "<input type=text placeholder='Cardholder Name' required>";
                        echo "</div>";

                        echo "<div class=section last_section>";
                            echo "<div class=item>";
                                echo "<input type=text class=expiry placeholder='Expiry Date' required>";
                            echo "</div>";

                            echo "<div class=item>";
                                echo "<input type=text class= placeholder placeholder=CVV required>";
                            echo "</div>";
                        echo "</div>";
        
                        echo "<div class=btns>";
                            echo "<button type=submit name=card id=card>Proceed With Card</button>";
                            echo "<button type=submit name=cash id=cash>Cash On Delivery</button>";
                        echo "</div>";

                    echo "</div>";
                echo "</form>";
            echo "<div>";
        echo "</body>";
    }
?>