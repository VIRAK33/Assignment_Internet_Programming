<!DOCTYPE html>
<?php
    include 'connection/config.php';
    session_start();
    if($_SESSION['username'] ==''){
        header("Location: signin.php");
    }

    $items = array();
    $amount = 0;
    foreach($_SESSION["cart"] as $keys => $values):
        if($values["product_id"] != ''){
            array_push($items, $values["product_id"]);
            $amount++;

        }
    endforeach;


    $query = 'select pro.*, ass.resource_path from products as pro join assets as ass on pro.id = ass.product_id where pro.id in (' . implode(',', array_map('intval', $items)) . ')';
   
    $product_cart = run_query($query);

    
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/app.css">
        
    <link rel="stylesheet" href="assets/css/style.css">


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="assets/js/style.js"></script>
    <style>
        .item-checkout{
            height: 200px;
        }
        .padding-img{ padding: 20px; }

    </style>
</head>
<body>

<div class="container">

    <div class="itme-product-checkout">
        <div class="" style="margin: 0 auto">
            <div class="float-left"><a href="index.php" class="btn btn-success">Back</a></div>
            <h1 class="text-success text-center">Checkout</h1>
        </div>
        <div class="item-amount" style="border-bottom: 1px solid rgb(226, 226, 226);">
            <div class="row">
                
                <h3 class="text-success" > <i class="icon icon-shopping-basket" id ="amountProductInCart"> &nbsp; <?php echo $amount;?>  items</i> </h3>
            </div>
        </div>
        <?php
        foreach($product_cart as $p):
            echo '
        <div class="row item-checkout" id="item_product'.$p["id"].'" style="border-bottom: 1px solid rgb(226, 226, 226); padding: 20px;">
            <div class="col-md-3">
                <img class="xv-superimage" style="width:70%;" src="'.$p["resource_path"].'" alt="assets/img/demo/d1.jpg"/>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h2 class="float-left">'.$p["name"].'</h2>
                </div>
                <div class="row">
                    <h3><span style="color:green" id="price'.$p["id"].'" value = '.$p["price"].'>'.$p["price"].'</span></h3>
                </div>
                <div class="row mt-2">
                    <input  onclick="calculatePrice(this.id)" type="number" min="1" max="50" name="" id="'.$p["id"].'" value ="1" style="width: 100px;" >
                     &nbsp; <h4>Qty</h4>
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 60px;">
                <div class="row"  style="float: right;">
                    <div class="" style="margin-right: 50px;">
                        <h3><span style="color:green" id="product'.$p["id"].'" >'.$p["price"].'</span></h3>
                    </div>
                    <div class="" style="margin-top: 7px;">
                        <i class="s-48 icon-remove" id="'.$p["id"].'" onclick="remove(this.id)"></i>
                    </div>
                </div>
            </div>
        </div> ';
        endforeach;
        ?>


        <!-- <div class="row item-checkout" style="border-bottom: 1px solid rgb(226, 226, 226); padding: 20px;">
            <div class="col-md-3">
                <img class="xv-superimage" style="width:70%;" src="https://images-na.ssl-images-amazon.com/images/I/61fkdeyq5QL._SX466_.jpg" alt="assets/img/demo/d1.jpg"/>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <h2 class="float-left">Name product</h2>
                </div>
                <div class="row">
                    <h3><span style="color:green">$12</span></h3>
                </div>
                <div class="row mt-2">
                    <input class="form-control" type="number" min="1" max="50" name="" id="" value ="1" style="width: 100px;" >
                     &nbsp; <h4>Qty</h4>
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 60px;">
                <div class="row"  style="float: right;">
                    <div class="" style="margin-right: 50px;">
                        <h3><span style="color:green">$12</span></h3>
                    </div>
                    <div class="" style="margin-top: 7px;">
                        <i class="s-48 icon-remove "></i>
                    </div>
                </div>
            </div>
        </div> -->
        <div class=""style="margin-top:100px; float:right">
            <button type="button "class="btn btn-success btn-lg" >
                Checkout
            </button>
        </div>

    </div>

</div>


</body>

<script>
function calculatePrice(click_id){
    var qty = document.getElementById(click_id).value;
    var idSelected = document.getElementById(click_id).id;
    var priceProductID = "product" + idSelected;
    var costID = "price" + idSelected;
    var price = document.getElementById(costID).innerHTML;
    
    var productPrice = Number(qty) * Number(price);
    // console.log(priceProductID)
    // console.log(price)
    // console.log(productPrice)
    document.getElementById(priceProductID).innerHTML = productPrice

}

function remove(click_id){

        // alert(click_id)
        var item = "item_product"+ click_id;
        document.getElementById(item).remove();
        $.ajax({
            type: 'POST',
            data: {
                removeCart:'remove',
                product_id:click_id,
            },
            url: 'action.php',
            error: function(error) {
                console.log(error)
            },
            success: function (data) {
                $("#amountProductInCart").empty()
                $("#amountProductInCart").append(data);
                
            }
        })
    }





</script>
</html>