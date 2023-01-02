<?php
    session_start();
?>

<style>
    <?php include 'profile.css'; ?>
    <?php include 'sign.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
    echo "</head>";

    generatePage();

    function generatePage()
    {
        if(isset($_SESSION['user_type']))
        {
            if($_SESSION['user_type']=="Customer")
            {
                generateCustomerProfile();

                if(isset($_POST['submit']))
                {
                    $uid = $_SESSION['user_id'];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $fullName = $_POST["name"];
                    $address = $_POST["address"];
                    $location = $_POST["location"];
                    $phoneNumber = $_POST["phoneNumber"];

                    $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
                    if(mysqli_query($connection, "update customers set user_name='$username', passw='$password', fullname='$fullName', addr='$address', locat='$location', phone_number='$phoneNumber' WHERE user_id='$uid'"))
                        echo "<script>Update Profile</script>";
                    mysqli_close($connection);
                }

            }elseif($_SESSION['user_type']=="Market")
            {
                generateMarketProfile();
                
                if(isset($_POST['submit']))
                {
                    $uid = $_SESSION['user_id'];
                    $usernameM = $_POST["username_market"];
                    $passwordM = $_POST["password_market"];
                    $balanceM = $_POST["balance_market"];
                    $balance_numberM = $_POST["balance_number_market"];
                    $paypalM = $_POST["paypal_market"];
                    $phoneNumberM = $_POST["phoneNumber_market"];

                    $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
                    if(mysqli_query($connection, "update markets set market_name='$usernameM', passw='$passwordM', balance='$balanceM', balance_number='$balance_numberM', paypal='$paypalM', phone_number='$phoneNumber' WHERE user_id='$uid'"))
                        echo "<script>Update Profile</script>";
                    mysqli_close($connection);
                }
            }
        }else{
            echo "<body>";
            
                generateNavbar();

                echo "<div class=container>";
                    echo "<div class='regContainer up'>";
                        echo "<h1>Profile</h1>";
                        echo "<p></p>";
                    echo "</div>";

                    echo "<form name=registration class='registartion-form up' method=post enctype=multipart/form-data>";
                        echo "<div class=form-grid-container-rows>";
                            echo "<div class='form-element instead'>";
                                echo "<h2>Please <a class=signa href=login.php>Login</a> first</h2>";
                            echo "</div>";

                            echo "<div class='form-element instead'>";
                                echo "<h3>Don't have an account? <a class=signa href=signup.php>Signup</a> instead</h3>";
                            echo "</div>";
                        echo "</div>";
                    echo "</form>";
                echo "</div>";
            echo "</body>";
        }
    }

    function generateCustomerProfile(){
        echo "<body>";
            
            generateNavbar();

            echo "<div class=container>";
                echo "<div class='regContainer up'>";
                    echo "<h1>Profile</h1>";
                    echo "<p></p>";
                echo "</div>";

                if(isset($_SESSION['user_id']))
                {
                    $uid = $_SESSION['user_id'];

                    $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
                    $selectUser = mysqli_query($connection, "select * from customers where user_id=$uid");
                    $user = mysqli_fetch_array($selectUser);

                    mysqli_close($connection);

                    echo "<form name=registration class='registartion-form up' method=post enctype=multipart/form-data>";
                        echo "<div class=form-grid-container-rows>";
                            echo "<div class=form-grid-container-cols id=customerInfo>";
                                echo "<div class=form-grid>";
                                    echo "<div class=form-element>";
                                        echo "<label for=username>User Name:</label>";
                                        echo "<input type=text name=username id=username placeholder=username value='$user[user_name]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=password>Password:</label>";
                                        echo "<input type=password name=password id=password placeholder=Password value='$user[passw]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=password>Confirm Password:</label>";
                                        echo "<input type=password name=confirmpassword id=confirmpassword placeholder='Retype Password' value='$user[passw]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=profilePic>Profile Picture:</label>";
                                        echo "<input type=file name=profilePicture id=profilePicture accept=image/*>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class=form-grid>";
                                    echo "<div class=form-element>";
                                        echo "<label for=name>Full Name:</label>";
                                        echo "<input type=text name=name id=name placeholder='john example' value='$user[fullname]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=address>Address:</label>";
                                        echo "<input type=text name=address id=address placeholder='your address' value='$user[addr]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=location>Location:</label>";
                                        echo "<input type=text name=location id=location placeholder='location to deliver to' value='$user[locat]'>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=phoneNumber>Phone Number:</label>";
                                        echo "<input type=tel name=phoneNumber id=phoneNumber placeholder='eg: 01012345678' value='$user[phone_number]' required>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class=form-grid-row>";
                                echo "<div class=form-element>";
                                    echo "<input type=submit class=submit name=submit id=sbmt value=Update>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</form>";
                }
            echo "</div>";
        echo "</body>";
    }

    function generateMarketProfile(){
        echo "<body>";
            
            generateMarketNavbar();

            echo "<div class=container>";
                echo "<div class='regContainer up'>";
                    echo "<h1>Profile</h1>";
                    echo "<p></p>";
                echo "</div>";

                if(isset($_SESSION['user_id']))
                {
                    $uid = $_SESSION['user_id'];

                    $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
                    $selectUser = mysqli_query($connection, "select * from markets where user_id=$uid");
                    $user = mysqli_fetch_array($selectUser);

                    mysqli_close($connection);

                    echo "<form name=registration class='registartion-form up' method=post enctype=multipart/form-data>";
                        echo "<div class=form-grid-container-rows>";
                            echo "<div class=form-grid-container-cols id=marketInfo>";
                                echo "<div class=form-grid>";
                                    echo "<div class=form-element>";
                                        echo "<label for=username>Market Name:</label>";
                                        echo "<input type=text name=username_market id=username_market placeholder='Market Name' value='$user[market_name]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=password>Password:</label>";
                                        echo "<input type=password name=password_market id=password_market placeholder=Password value='$user[passw]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=password>Confirm Password:</label>";
                                        echo "<input type=password name=confirmpassword_market id=confirmpassword_market placeholder='Retype Password' value='$user[passw]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=profilePic>Market Logo:</label>";
                                        echo "<input type=file name=market_logo id=market_logo accept=image/*>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class=form-grid>";
                                    echo "<div class=form-element>";
                                        echo "<label for=name>Balance:</label>";
                                        echo "<input type=text name=balance_market id=balance_market placeholder='your balance' value='$user[balance]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=address>Balance Number:</label>";
                                        echo "<input type=text name=balance_number_market id=balance_number_market placeholder='your bank account IBAN' value='$user[balance_number]' required>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=location>Paypal:</label>";
                                        echo "<input type=text name=paypal_market id=paypal_market placeholder='the email address associated with your PAYPAL' value='$user[paypal]'>";
                                    echo "</div>";
                                    echo "<div class=form-element>";
                                        echo "<label for=phoneNumber>Phone Number:</label>";
                                        echo "<input type=tel name=phoneNumber_market id=phoneNumber_market placeholder='eg: 01012345678' value='$user[phone_number]' required>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class=form-grid-row>";
                                echo "<div class=form-element>";
                                    echo "<input type=submit class=submit name=submit id=sbmt value=Update>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</form>";
                }
            echo "</div>";
        echo "</body>";
    }

?>