<!DOCTYPE html>
<?php
    include 'connection/config.php';
    session_start();
    // if($_SESSION['username'] ==''){
    //     header("Location: signin.php");
    // }

    // session_destroy();

    // echo $_SESSION['username']. "Hello";

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 3</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/app.css">
        
    <link rel="stylesheet" href="assets/css/style.css">


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="assets/js/style.js"></script>
</head>
<body>
    <?php
        include 'includes/nav_bar.php';
        include 'includes/feature.php';
        include 'includes/promotion.php';
        
        
    ?>
    <!-- Cart check out -->
        <div class="cart-checkout" id="cart-checkout">
        <?php
        $amount_item = 0;
        if(isset($_SESSION['cart'])){
            $amount_item = count($_SESSION['cart']);
        }
        
        if($amount_item != 0){
            echo '
            <a href="checkout.php">
            <div class="cart-box">
                <center><i class="icon icon-shopping-basket icon-cart-box"></i><span>'. $_SESSION["cart"]["amount"] .'</span> items</center>
                <div class="box-price">
                    <center>'. $_SESSION["cart"]["total_price"] .'</center>
                </div>
            </div>
            </a>
            ';
        }
        ?>
        </div>
        <!--Category and Product -->
        <div class="container">
            <div class="row">
            <?php
                include 'includes/category.php';
                include 'includes/products.php';
            ?>
            </div>
        </div>

</body>
<script>
    function addCart(click_id){
        var item = document.getElementById(click_id)
        var product_name = $('#name'+click_id+'').val();
        var product_price = $('#price'+click_id+'').val();
        // alert(product_name+product_price);
        item.innerHTML = "Checkout";
        item .removeAttribute("onclick");
        // item.removeEventListener("onclick", elemEventHandler , false);
        // item .setAttribute("href", "checkout.php");
        // item.empty()
        // item.innerHTML = '<a href="checkout.php" style="hover:white;">Checkout</a>';
        $.ajax({
            type: 'POST',
            data: {
                action:'addToCart',
                product_id:click_id,
                product_name:product_name,
                product_price:product_price
            },
            url: 'action.php',
            error: function(error) {
                console.log(error)
            },
            success: function (data) {
                // console.log(data);
                item .setAttribute("href", "checkout.php");
                $("#cart-checkout").empty();
                $("#cart-checkout").append(data);
                // window.location.href=window.location.href
                
            }
        })
    }

</script>
</html>