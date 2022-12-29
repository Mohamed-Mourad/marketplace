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

    generateProfile();

    function generateProfile(){
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
                }else{
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
                }
                
            echo "</div>";
        echo "</body>";
    }

?>