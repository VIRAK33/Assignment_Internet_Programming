<?php
session_start();

include "connection/config.php";

   
if(isset($_POST["key"])){
    $key = $_POST['key'];
    $category_id = $_POST['category_id'];

    $no = '';
    if(isset($_POST['no_item'])){
        $no = $_POST['no_item'];
    }else{
        $no = 3;
    }

    // $query = "SELECT * FROM products WHERE category_id= '{$category_id}' AND name LIKE '%{$key}%'";
    // $query = "select * from products join assets on products.id = assets.product_id where products.category_id = '{$category_id}' AND name LIKE '%{$key}%';";
    $query = "select pro.*, ass.resource_path from products as pro join assets as ass on pro.id = ass.product_id where pro.category_id = '{$category_id}' AND pro.name LIKE '%{$key}%' limit $no;";
   
    $items = run_query($query);
    $output_ ='';
    $output ='';

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

}

if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    $product_id = $_POST['product'];

    $query = "INSERT INTO `reviews` (`id`, `content`, `written_at`, `product_id`) VALUES (NULL, '$comment', current_timestamp(), '$product_id');";

    $i = run_query($query);
    if($i){

           echo '
                <div class="media text-muted pt-3 comment ">  
                <img src="assets/img/dummy/u2.png" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">@username</strong>
                '.$comment.'
                </p>
                </div>
            ';
            // echo $comment;

        
    }
    
}


//Add cart to session
if(isset($_POST['action'])){
    if($_POST['product_id']){


        $item_array = array(
            'product_id'               =>     $_POST["product_id"],  
            'product_name'             =>     $_POST["product_name"],  
            'product_price'            =>     $_POST["product_price"]
           );
        $_SESSION["cart"][] = $item_array;
        $total_price = 0;
        // $count = 0;


        if(empty($_SESSION["cart"]["amount"])){
            $_SESSION["cart"]["amount"] = 1;
        }else{
            $_SESSION["cart"]["amount"] += 1;
        }
        
        foreach($_SESSION["cart"] as $keys => $values):
            // echo $values['product_price'];
            $total_price += $values["product_price"];
        endforeach;
        $_SESSION["cart"]["total_price"] = $total_price;


        echo '
        <a href="checkout.php">
        <div class="cart-box">
            <center><i class="icon icon-shopping-basket icon-cart-box"></i><span>'. $_SESSION["cart"]["amount"] .'</span> items</center>
            <div class="box-price">
                <center>'. $total_price .'</center>
            </div>
        </div>
        </a>
        ';


    }

     
}

//Remove cart from session
if(isset($_POST["removeCart"])){


    if($_POST["removeCart"] == 'remove')
    {
        
        foreach($_SESSION["cart"] as $keys => $values)
        {

            if($values["product_id"] == $_POST["product_id"])
            {
                unset($_SESSION["cart"][$keys]);
                
            }
        }

        //Count product
        $count = 0;
        foreach($_SESSION["cart"] as $keys => $values):
            if($values["product_id"] != ''){
                $count++;
    
            }
        endforeach;
        echo $count . " items";
        $_SESSION["cart"]["amount"] = $count;
    }
}



?> 
