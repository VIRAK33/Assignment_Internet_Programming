
<div class="col-md-9">
    <div  class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
        <div class="row" id="item">
            <?php

                if(!isset($_SESSION['cart'])){
                    $_SESSION['cart'] = array();
                    
                    

                }

                
                // $product = 'select * from products where category_id  = 1';
                $product = 'select pro.*, ass.resource_path from products as pro join assets as ass on pro.id = ass.product_id where pro.category_id = 1 limit 3;';
                $items = run_query($product);
                
                foreach($items as $item):
                    
                    echo '
                    <div class="xv-product-unit ">
                        <div class="xv-product mb-15 mt-15 paper-block">
                            <figure class="product">
                                <div class="discount">
                                    - '.$item["discount"].'%
                                </div>
                                <a href="#"><img class="xv-superimage" src="'.$item["resource_path"].'" alt="assets/img/demo/d1.jpg"/></a>
                                <figcaption>

                                    <form action="product.php" method="post" class="style1">
                                        <div class="style1">
                                        <input type="hidden" name="product_id" value="'.$item["id"].'">
                                        <button style="margin-top:60px;" class="btn-cart btn-square btn-blue" type="submit"><i class="icon icon-expand"></i></button>
                                        </div>
                                    </form>

                                </figcaption>
                            </figure>
                            <div class="xv-product-content">
                                <h3><a href="detail1.html">'.$item["name"].'</a></h3>
                                <p>'.$item["description"].'</p>
                                <ul class="color-opt">
                                    '.$item["description"].'
                                </ul>
                                <ul class="extra-links">
                                    <li><a href="#"><i class="icon icon-heart"></i>Wishlist</a></li>
                                    <li><a href="#"><i class="icon icon-exchange"></i>Compare</a></li>
                                    <li><a href="#"><i class="icon icon-expand"></i>Expand</a></li>
                                </ul>
                                <!--ul-->
                                <div class="xv-rating stars-5"></div>
                                <span class="xv-price">'.$item["price"].'</span>';
                                echo '
                                    <input type="hidden" name="hidden_name" id="name'.$item["id"].'" value="'.$item["name"].'">
                                    <input type="hidden" name="hidden_price" id="price'.$item["id"].'" value="'.$item["price"].'">
                                ';
                                $status = '';
                                if(isset($_SESSION['username'])){
                                    $count = count($_SESSION['cart']);
                                    
                                    if($count > 0){
                                        $count = count($_SESSION['cart']);
                                        // for($i=0; $i< $count; $i++){
                                        $isHave = false;
                                        foreach($_SESSION["cart"] as $keys => $values):
                                            if($item['id'] != $status){
                                                
                                                if($item["id"] == $values["product_id"]){
                                                    echo ' <a href="checkout.php" style="cursor: pointer;" class="product-buy" id="'.$item["id"].'"  ><i class="icon icon-shopping-basket"></i>&nbsp;Checkout</a>';
                                                    $status = $item['id'];
                                                    $isHave = true;
                                                break;
                                                }
                                        
                                            }
                                        endforeach;
                                        if(!$isHave){
                                            echo ' <a style="cursor: pointer;" class="product-buy" id="'.$item["id"].'" onclick="addCart(this.id)" ><i class="icon icon-shopping-basket"></i>&nbsp;Cart</a>';
                                        }
                                        // }
                                        
                                    }else{
                                        echo ' <a style="cursor: pointer;" class="product-buy" id="'.$item["id"].'" onclick="addCart(this.id)" ><i class="icon icon-shopping-basket"></i>&nbsp;Cart</a>';
                                    }

                                }else{
                                    echo ' <a href="signin.php" style="cursor: pointer;" class="product-buy"  ><i class="icon icon-shopping-basket"></i>&nbsp;Cart</a>';
                                }

                            echo' 
                            </div>
                            <!--xv-product-content-->
                        </div>
                    </div>
                    ';
                    
                endforeach;
                
            ?>
            <!-- <script>
                function addCart(click_id){
                    var item = document.getElementById(click_id)
                    var product_name = $('#name'+click_id+'').val();
                    var product_price = $('#price'+click_id+'').val();
                    alert(product_name+product_price);
                    item.innerHTML = "Checkout";
                    // item .setAttribute("href", "checkout.php");
                    item.innerHTML = '<a href="checkout.php" style="hover:white;">Checkout</a>';
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
                            $("#cart-checkout").empty();
                            $("#cart-checkout").append(data);
                            
                        }
                    })
                }

            </script> -->

        </div>
        <div class="col-md-12 offset-5">
            <input type="hidden" name="" value="6" id ="number_item" >
            <button class="btn btn-primary" id="load_more">Show more</button>
        </div>

    </div>


</div>
