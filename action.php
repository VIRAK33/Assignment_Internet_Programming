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
    $query = "select * from products join assets on products.id = assets.product_id where products.category_id = '{$category_id}' AND name LIKE '%{$key}%' limit $no;";
   
    $items = run_query($query);
    $output ='';

    if(mysqli_num_rows($items)>0){

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
                                <ul class="style1">
                                    <li><a data-qv-tab="#qvt-wishlist" class=" btn-square btn-blue"
                                            href="#"><i class="icon icon-heart"></i></a></li>
                                    <li><a data-qv-tab="#qvt-compare" class=" btn-square btn-blue" href="#"><i
                                            class="icon icon-exchange"></i></a></li>
                                    <li><a class="btn-cart btn-square btn-blue" href="#"><i
                                            class="icon icon-expand"></i></a></li>
                                </ul>
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



?> 