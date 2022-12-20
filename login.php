<?php
    session_start();
?>

<style> 
    <?php include 'sign.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    echo "<head>";
    echo "<title>Log In</title>";
    echo "</head>";
    
    echo "<body>";
        echo "<div class=container>";
            echo "<div class=regContainer>";
                echo "<h1>Log In</h1>";
                echo "<p>Please fill in this form to log in to your account.</p>";
            echo "</div>";

            echo "<form name=registration class=registartion-form method=post action=login.php>";
                echo "<div>";
                    echo "<div class=form-element>";
                        echo "<input type=radio id=customer name=userType value='Customer'>Customer";
                        echo "<input type=radio id=market name=userType value='Market'>Market";
                    echo "</div>";
                    
                    echo "<div class=form-element>";
                        echo "<label for=username>User Name:</label>";
                        echo "<input type=text name=username id=username placeholder=john_example required>";
                    echo "</div>";
                    
                    echo "<div class=form-element>";
                        echo "<label for=password>Password:</label>";
                        echo "<input type=password name=password id=password placeholder=Password required>";
                    echo "</div>";
                    
                    echo "<div class=form-element>";
                        echo "<input type=submit class=submit name=submit id=sbmt value=Login>";
                    echo "</div>";
                    
                    echo "<div class=form-element>";
                        echo "<h3>Don't have an account? <a class=signa href=signup.php>Sign Up</a> instead</h3>";
                    echo "</div>";
                echo "</div>";
            echo "</form>";
        echo "</div>";
    echo "</body>";

    if(isset($_POST['submit'])){
        login();
    }

    function login(){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $userType = $_POST["userType"];

        $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
        
        if($userType == 'Customer'){
            $QLogin = mysqli_query($connection, "SELECT * FROM customers WHERE user_name = '$username'");
            $numReturnedRows = mysqli_num_rows($QLogin);
            $user = mysqli_fetch_array($QLogin);
        }elseif($userType == "Market"){
            $QLogin = mysqli_query($connection, "SELECT * FROM markets WHERE market_name = '$username'");
            $numReturnedRows = mysqli_num_rows($QLogin);
            $user = mysqli_fetch_array($QLogin);
        }

        mysqli_close($connection);

        if($numReturnedRows > 0 & $user["passw"] == $password){
            $uid = $user["user_id"];
            $_SESSION['user_id'] = $uid;
            echo "<script>window.location.href='home.php';</script>";
            exit;
        }elseif($numReturnedRows > 0 & $user["passw"] != $password){
            echo '<script type ="text/JavaScript">';  
                echo 'alert("Incorrect password! Please try again.")';  
            echo '</script>';
        }elseif($numReturnedRows == 0){
            echo '<script type ="text/JavaScript">';
                echo 'alert("Invalid username! please try again.")';  
            echo '</script>';
        }
    }
?>