<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
    <?php include 'sign.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    echo "<head>";
        echo "<title>Sign Up</title>";
    echo "</head>";

    echo "<body>";

        generateNavbar();

        echo "<div class=container>";
            echo "<div class='regContainer up'>";
                echo "<h1>Sign Up</h1>";
                echo "<p>Please fill in this form to create an account.</p>";
            echo "</div>";
            echo "<form name=registration class='registartion-form up' method=post enctype=multipart/form-data>";
                echo "<div class=form-grid-container-rows>";
                    echo "<div class=form-grid-row>";
                        echo "<div class='form-element'>";
                            echo "<input type=radio id=customer name=userType value='Customer' CHECKED>Customer";
                            echo "<input type=radio id=market name=userType value='Market'>Market";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class=form-grid-container-cols id=customerInfo>";
                        echo "<div class=form-grid>";
                            echo "<div class=form-element>";
                                echo "<label for=username>User Name:</label>";
                                echo "<input type=text name=username id=username placeholder=john_example required>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=password>Password:</label>";
                                echo "<input type=password name=password id=password placeholder=Password required>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=password>Confirm Password:</label>";
                                echo "<input type=password name=confirmpassword id=confirmpassword placeholder='Retype Password' required>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=profilePic>Profile Picture:</label>";
                                echo "<input type=file name=profilePicture id=profilePicture accept=image/*>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class=form-grid>";
                            echo "<div class=form-element>";
                                echo "<label for=name>Full Name:</label>";
                                echo "<input type=text name=name id=name placeholder='john example' required>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=address>Address:</label>";
                                echo "<input type=text name=address id=address placeholder='your address' required>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=location>Location:</label>";
                                echo "<input type=text name=location id=location placeholder='location to deliver to'>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=phoneNumber>Phone Number:</label>";
                                echo "<input type=tel name=phoneNumber id=phoneNumber placeholder='eg: 01012345678' required>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class=form-grid-container-cols id=marketInfo>";
                        echo "<div class=form-grid>";
                            echo "<div class=form-element>";
                                echo "<label for=username>Market Name:</label>";
                                echo "<input type=text name=username_market id=username_market placeholder='your market name'>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=password>Password:</label>";
                                echo "<input type=password name=password_market id=password_market placeholder=Password>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=password>Confirm Password:</label>";
                                echo "<input type=password name=confirmpassword_market id=confirmpassword_market placeholder='Retype Password'>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=profilePic>Market Logo:</label>";
                                echo "<input type=file name=market_logo id=market_logo accept=image/*>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class=form-grid>";
                            echo "<div class=form-element>";
                                echo "<label for=name>Balance:</label>";
                                echo "<input type=text name=balance_market id=balance_market placeholder='your balance'>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=address>Balance Number:</label>";
                                echo "<input type=text name=balance_number_market id=balance_number_market placeholder='your bank account IBAN'>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=location>Paypal:</label>";
                                echo "<input type=text name=paypal_market id=paypal_market placeholder='the email associated with your PAYPAL'>";
                            echo "</div>";
                            echo "<div class=form-element>";
                                echo "<label for=phoneNumber>Phone Number:</label>";
                                echo "<input type=tel name=phoneNumber_market id=phoneNumber_market placeholder='eg: 01012345678'>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class=form-grid-row>";
                        echo "<div class=form-element>";
                            echo "<input type=submit class=submit name=submit id=sbmt value=Signup>";
                        echo "</div>";
                        echo "<div class='form-element instead'>";
                            echo "<h3>Have an account? <a class=signa href=login.php>Login</a> instead</h3>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</form>";
        echo "</div>";
    echo "</body>";

    if(isset($_POST['submit'])){
        signup();
    }

    function signup(){
        $userType = $_POST["userType"];

        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $location = $_POST["location"];
        $phoneNumber = $_POST["phoneNumber"];
        $img = $_FILES["profilePicture"]["name"];

        $usernameM = $_POST["username_market"];
        $passwordM = $_POST["password_market"];
        $balanceM = $_POST["balance_market"];
        $balance_numberM = $_POST["balance_number_market"];
        $paypalM = $_POST["paypal_market"];
        $phoneNumberM = $_POST["phoneNumber_market"];
        $imgM = $_FILES["market_logo"]["name"];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $target_fileM = $target_dir . basename($_FILES["market_logo"]["name"]);
        $imageFileTypeM = strtolower(pathinfo($target_fileM,PATHINFO_EXTENSION));

        // check if image is real or fake
        $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
        $checkM = getimagesize($_FILES["market_logo"]["tmp_name"]);

        if($check !== false) {
            $uploadOk = 1;

            // put limit to image size 500KB
            if ($_FILES["profilePicture"]["size"] > 500000) {
                echo '<script type ="text/JavaScript">';  
                    echo 'alert("Chosen file is too large! please select an image smaller than 500KB.")';  
                echo '</script>';
                $uploadOk = 0;
                exit;
            }

            // upload the image
            if (!(move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file))) {
                echo '<script type ="text/JavaScript">';  
                    echo 'alert("There was an error uploading your image, please try again later.")';  
                echo '</script>';
            }

        } elseif(checkM) {
            $uploadOk = 1;

            // put limit to image size 500KB
            if ($_FILES["market_logo"]["size"] > 500000) {
                echo '<script type ="text/JavaScript">';  
                    echo 'alert("Chosen file is too large! please select an image smaller than 500KB.")';  
                echo '</script>';
                $uploadOk = 0;
                exit;
            }

            // upload the image
            if (!(move_uploaded_file($_FILES["market_logo"]["tmp_name"], $target_fileM))) {
                echo '<script type ="text/JavaScript">';  
                    echo 'alert("There was an error uploading your image, please try again later.")';  
                echo '</script>';
            }

        } else {
            echo '<script type ="text/JavaScript">';  
                echo 'alert("Chosen file is not an image! please select and image.")';
            echo '</script>';
            exit;
            $uploadOk = 0;
        }

        $connection = mysqli_connect("localhost", "root", "12345678", "marketplace");
        
        if($userType == 'Customer'){
            $QSignup = mysqli_query($connection, "INSERT INTO customers (user_id, user_name, passw, fullname, addr, locat, phone_number, profile_picture) 
            VALUES (NULL, '$username', '$password', '$name', '$address', '$location', '$phoneNumber', '$img');");

            mysqli_close($connection);

            if(!$QSignup){
                echo '<script type ="text/JavaScript">';  
                    echo 'alert("Something went wrong")';  
                echo '</script>';
            }else {
                echo "<script>window.location.href='login.php';</script>";
                exit;
            }
        }else if($userType == 'Market') {
            $QSignup = mysqli_query($connection, "INSERT INTO markets (user_id, market_name, passw, balance, balance_number, paypal, phone_number, market_logo) 
            VALUES (NULL, '$usernameM', '$passwordM', '$balanceM', '$balance_numberM', '$paypalM', '$phoneNumberM', '$imgM');");

            mysqli_close($connection);

            if(!$QSignup){
                echo '<script type ="text/JavaScript">';  
                    echo 'alert("Something went wrong")';  
                echo '</script>';
            }else {
                echo "<script>window.location.href='login.php';</script>";
                exit;
            }
        }
    }

?>

<script>
    document.getElementById("marketInfo").style.display="none"; 
    $('input[type=radio]').change(function(e){
        var userType = document.querySelector('input[name="userType"]:checked').value;

        if(userType=='Customer')
        {
            document.getElementById("customerInfo").style.display="grid";
            document.getElementById("marketInfo").style.display="none";

            document.getElementById("username").required = true;
            document.getElementById("password").required = true;
            document.getElementById("confirmpassword").required = true;
            document.getElementById("profilePicture").required = true;
            document.getElementById("name").required = true;
            document.getElementById("address").required = true;
            document.getElementById("location").required = false;
            document.getElementById("phoneNumber").required = true;

            //document.getElementByClassName("customerInfo").required = true;
            //document.getElementById("location").required = false;

            document.getElementById("username_market").required = false;
            document.getElementById("password_market").required = false;
            document.getElementById("confirmpassword_market").required = false;
            document.getElementById("market_logo").required = false;
            document.getElementById("balance_market").required = false;
            document.getElementById("balance_number_market").required = false;
            document.getElementById("paypal_market").required = false;
            document.getElementById("phoneNumber_market").required = false;

            //document.getElementByClassName("marketInfo").required = false;
        }

        if(userType=='Market')
        {
            document.getElementById("customerInfo").style.display="none";
            document.getElementById("marketInfo").style.display="grid";

            document.getElementById("username").required = false;
            document.getElementById("password").required = false;
            document.getElementById("confirmpassword").required = false;
            document.getElementById("profilePicture").required = false;
            document.getElementById("name").required = false;
            document.getElementById("address").required = false;
            document.getElementById("location").required = false;
            document.getElementById("phoneNumber").required = false;

            //document.getElementByClassName("customerInfo").required = false;
            //document.getElementById("location").required = false;

            document.getElementById("username_market").required = true;
            document.getElementById("password_market").required = true;
            document.getElementById("confirmpassword_market").required = true;
            document.getElementById("market_logo").required = true;
            document.getElementById("balance_market").required = true;
            document.getElementById("balance_number_market").required = true;
            document.getElementById("paypal_market").required = true;
            document.getElementById("phoneNumber_market").required = true;

            //document.getElementByClassName("marketInfo").required = true;
        }
    });
    
</script>