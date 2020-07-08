<?php

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
    $output ='';

    if(mysqli_num_rows($items)>0){
        $item_amount = 0;
        while($row = mysqli_fetch_array($items)){

                $output .= '
                <div class="xv-product-unit">
                    <div class="xv-product mb-15 mt-15 paper-block">
                        <figure class="product">
                            <div class="discount">
                            - '.$row["discount"].'%
                            </div>
                            <a href="#"><img class="xv-superimage" src="'.$row["resource_path"].'" alt="assets/img/demo/d1.jpg"/></a>
                            <figcaption>
                                    <form action="product.php" method="post" class="style1">
                                    <div class="style1">
                                    <input type="hidden" name="product_id" value="'.$row["id"].'">
                                    <input type="hidden" name="category_id" value="'.$row["category_id"].'">
                                    <button style="margin-top:60px;" class="btn-cart btn-square btn-blue" type="submit"><i class="icon icon-expand"></i></button>
                                    </div>
                                </form>
                            </figcaption>
                        </figure>
                        <div class="xv-product-content">
                            <h3><a href="detail1.html">'.$row["name"].'</a></h3>
                            <p>'.$row["description"].'</p>
                            <ul class="color-opt">
                                '.$row["description"].'
                            </ul>
                            <ul class="extra-links">
                                <li><a href="#"><i class="icon icon-heart"></i>Wishlist</a></li>
                                <li><a href="#"><i class="icon icon-exchange"></i>Compare</a></li>
                                <li><a href="#"><i class="icon icon-expand"></i>Expand</a></li>
                            </ul>
                            <!--ul-->
                            <div class="xv-rating stars-5"></div>
                            <span class="xv-price">'.$row["price"].'</span>
                            <a data-qv-tab="#qvt-cart" href="#" class="product-buy flytoQuickView"><i
                                    class="icon icon-shopping-basket" aria-hidden="true"></i></a>
                        </div>
                        <!--xv-product-content-->
                    </div>
                </div>

                ';


        }
        echo $output;

    }

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



?> 