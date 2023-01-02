<style>
    <?php include 'addProduct.css'; ?>
    <?php include 'navbar.php'; ?>
</style>

<?php

    session_start();

    echo "<head>";
        echo "<link href=https://fonts.googleapis.com/icon?family=Material+Icons rel=stylesheet>";
    echo "</head>";

    generateAddProduct();
    
    function generateAddProduct()
    {
        echo "<body>";
            
        if(($_SESSION['user_type'] == "Market") && isset($_SESSION['user_type']))
            generateMarketNavbar();
        else
            generateNavbar();
            
            echo "<div class=header>";

            echo "<div class=container>";

                echo "<form class=insert id=insert enctype=multipart/form-data method=post>";

                    echo "<table class=table>"; 
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Name</th>";
                                echo "<th>Brand</th>";
                                echo "<th>Description</th>";
                                echo "<th>Stock</th>";
                                echo "<th>Price</th>";
                                echo "<th>Best Seller</th>";
                                echo "<th>Image</th>";
                                echo "<th>";
                                    echo "<button onclick=createRow('product')><i class=material-icons>&#xe145;</i></button>";
                                echo "</th>";
                            echo "</tr>";
                        echo "</thead>";

                        $con=mysqli_connect("localhost", "root" , "12345678", "marketplace");

                        if($con)
                        {
                            if(isset($_POST['addToMarket']))
                            {
                                $id=$_POST['id'];
                                $name=$_POST['name'];
                                $brand=$_POST['brand'];
                                $description=$_POST['description'];
                                $stock=$_POST['stock'];
                                $price=$_POST['price'];
                                $bestSeller=$_POST['bestSeller'];
                                $images=$_POST['images'];
                                $marketId="AyKalam";

                                foreach ($id as $key => $value) 
                                {
                                    $persist="insert into products(ProductID, Name, Image, Brand, MarketID, Price, Brief, InStock, BestSeller) values
                                    ('$value','$name[$key]','$images[$key]','$brand[$key]','$marketId','$price[$key]','$description[$key]','$stock[$key]','$bestSeller[$key]')";
                                    
                                    $saveProducts=mysqli_query($con,$persist);
                                }
                            }
                        }

                        echo "<tbody id=product>";
                            echo "<tr>";
                                echo "<td>";
                                    echo "<input type=text class=form_control placeholder=#ID name=id[] required>";
                                echo "</td>";
                            
                                echo "<td>";
                                    echo "<input type=text class=form_control placeholder=Name name=name[] required>";
                                echo "</td>";
                            
                                echo "<td>";
                                    echo "<input type=text class=form_control placeholder=Brand name=brand[] required>";
                                echo "</td>";
                                
                                echo "<td>";
                                echo "<textarea class=form_control placeholder=Description></textarea name=description[] required>";
                                echo "</td>";

                                echo "<td>";
                                    echo "<input type=number class=form_control  min=1 oninput=validity.valid||(value='') name=stock[] required>";
                                echo "</td>";

                                echo "<td>";
                                    echo "<input type=text class=form_control placeholder=Price name=price[] required>";
                                echo "</td>";

                                echo "<td>";
                                    echo "<input type=checkbox class=form_control name=bestSeller[]>";
                                echo "</td>";

                                echo "<td>";
                                    echo "<label for=productImage><i class=material-icons>&#xe2c6;</i></label>";
                                    echo "<input type=file name=productImage id=productImage accept=image/* name=images[]>";
                                echo "</td>";

                                echo "<td>";
                                    echo "<button onclick=removeRow(this)>";
                                        echo "<i class=material-icons>&#xe872;</i>";
                                    echo "</button>";
                                echo "</td>";
                            echo "</tr>";
                        echo "<tbody>";
                    echo "</table>";
                echo "<button type=submit class=addToMarket name=addToMarket>Add To Market</button>";
                echo "<form>";
            echo "</div>";
        echo "</body>";
    }
?>

<script>

    function createRow(product) 
    {
        let tableBody = document.getElementById(product),
            firstRow  = tableBody.firstElementChild
            rowClone  = firstRow.cloneNode(true);
            tableBody.append(rowClone);
        cleanFirstRow(tableBody.firstElementChild);
    }

    function cleanFirstRow(firstRow) 
    {
        let children = firstRow.children;
        
        children = Array.isArray(children) ? children : Object.values(children);
        children.forEach(x=>
        {
            if(x !== firstRow.lastElementChild)
            {
                x.firstElementChild.value = '';
            }
        });
    }

    function removeRow(This) 
    {
        if(This.closest('tbody').childElementCount == 1)
            alert("You Must Add Atleast One Product");
        else
            This.closest('tr').remove();
    }

</script>