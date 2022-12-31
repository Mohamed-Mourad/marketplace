<?php
    session_start();
?>

<style>
    <?php include 'purchaseHistory.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
        echo "<script src=https://kit.fontawesome.com/a076d05399.js crossorigin=anonymous></script>";
    echo "</head>";

    generateHistory();
    
    function generateHistory()
    {
        echo "<body>";
            
            generateNavbar();

            echo "<div class=header>";

                echo "<div class=productsSection>";

                    echo "<h1>Previous Orders.</h1>";
    
                    $loggedUser = $_SESSION["user_id"];

                    $con=mysqli_connect("localhost", "root" , "12345678", "marketplace");

                    $userHistory=mysqli_query($con, "select * from purchasehistory where UserID='$loggedUser'");
                    
                    while($row=mysqli_fetch_assoc($userHistory))
                    {
                        $orderID=$row["OrderID"];
                        $productID=$row["ProductID"];
                        $status=$row["Status"];

                        echo "<div class=shoppingCart>";
                            $getProduct=mysqli_query($con, "select * from products where ProductID='$productID'");
                            $productRow=mysqli_fetch_assoc($getProduct);
                            
                            $name=$productRow["Name"];
                            $image=$productRow["Image"];
                            $brand=$productRow["Brand"];
                            $description=$productRow["Brief"];

                            echo "<div class=item id=item>";
                                echo "<div class=image>";
                                    echo "<img src='productImages/$image'>";
                                echo "</div>";

                                echo "<div class=description>";
                                    echo "<span>$name</span>";
                                    echo "<span>Brand: $brand</span>";
                                    echo "<span style=color:gray;font-size:15px;font-weight:100;>$description</span>";
                                echo "</div>";

                                echo "<div class=status>";
                                    if($status=="card")
                                        echo "<span class=purchased>Purchased</span>";
                                    else
                                        echo "<span class=inProgress>In Progress</span>";
                                echo "</div>";

                            echo "</div>";
                        echo "</div>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</body>";
    }
?>