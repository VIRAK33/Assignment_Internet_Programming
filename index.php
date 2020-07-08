<?php include "connection/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/app.css">
    
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="assets/js/style.js"></script>

</head>

<body>
    <!-- Nav -->
    <div class="nav">
        <div class="container">
            <p class="display-4 float-left">Awesom
                <span class="text-success">Shop</span>
            </p>
            <div class="float-right ">
                <h2 class="display-6 need-help">
                    <span>
                        <i class="icon-question-circle"></i>
                    </span> Need help
                    <div class="btn btn-primary">Join</div>
                </h2>
            </div>
        </div>
    </div>
    <!-- Feature background Queru -->
    <?php 
    $features = run_query("select * FROM features order by rand() limit 1;"); 
    $feature = $features -> fetch_array(MYSQLI_NUM);
    ?>

    <!-- Feature -->
    <div class="container">
        <div class="feature" style="background-image:url(assets/img/feature/<?php echo $feature[3];?>)">
            <?php
            foreach($features as $f):
            echo '
            <h1 class="feature-title">'.$f["title"].'</h1>
            <p class="feature-description">'.$f["description"].'</p>
            ';
            endforeach;
            ?>

            <div id="searchbox5">
                <input id="search51" name="search-box" type="text" size="40" placeholder="Search..." />
            </div>

        </div>
    </div>

    <!-- Promotion Section -->
    <div class="container">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption promotion">
                            <h4>Coupong Saving</h4>
                            <p>Nulla consequat massa quis enim. </p>
                            <p>
                                <a href="#" class="btn btn-primary" role="button">Shop Coupon</a>
                            </p>
                        </div>
                        <div class="">
                            <img class="icon_promotion" src="assets/icon/coupon.svg" alt="" srcset="">
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption promotion">
                            <h4>Free Delivery</h4>
                            <p>Nulla consequat massa quis enim. </p>
                            <p>
                                <a href="#" class="btn btn-primary" role="button">Deliver Now</a>
                            </p>
                        </div>
                        <div class="">
                            <img class="icon_promotion" src="assets/icon/car.svg" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption promotion">
                            <h4>Gift Voucher</h4>
                            <p>Nulla consequat massa quis enim. </p>
                            <p>
                                <a href="#" class="btn btn-primary" role="button">Gift Now</a>
                            </p>
                        </div>
                        <div class="">
                            <img class="icon_promotion" src="assets/icon/gift.svg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Category Query -->
    <?php 
    $categories = run_query("select * FROM categories;"); 
    $row = $categories -> fetch_array(MYSQLI_NUM);
    $count = 1;
    ?>
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <!-- Category side -->
            <div class="col-md-3">
                <div class="sidebar">

                    <!--widget-category-->
                    <div class="widget widget-shop-category">
                        <h3>Categories</h3>
                        <ul>
                            <?php
                                    foreach($categories as $category):
                                        if($count == 1){
                                            echo
                                            '<li>
                                                <button id="'.$category["name"].'" class="text_category active">
                                                    <img class="icon_category" src="assets/icon/'.$category["icon"].'" alt="" srcset="">
                                                    '.$category["name"].'
                                                </button>
                                            </li>';
                                        }else{
                                            echo
                                            '<li>
                                                <button id="'.$category["name"].'" class="text_category">
                                                    <img class="icon_category" src="assets/icon/'.$category["icon"].'" alt="" srcset="">
                                                    '.$category["name"].'
                                                </button>
                                            </li>';
                                        }
                                    
                                        $count++;
                                    endforeach;
                                ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Product side -->
            <div class="col-md-9">
                <div  class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
                    <div class="row" id="item">
                        <?php
                            
                            // $product = 'select * from products where category_id = 1';
                            $product = 'select * from products join assets on products.id = assets.product_id where products.category_id = 1 limit 3;';
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
                                            <span class="xv-price">'.$item["price"].'</span>
                                            <a data-qv-tab="#qvt-cart" href="#" class="product-buy flytoQuickView"><i
                                                    class="icon icon-shopping-basket" aria-hidden="true"></i></a>
                                        </div>
                                        <!--xv-product-content-->
                                    </div>
                                </div>
                                ';
                               
                            endforeach;
                           
                            
                        ?>
                        
                        

                    </div>

                </div>

                    <div class="col-md-12 offset-5" id="load_more" >
                        <input type="hidden" name="notest" id="number_item" value="6">
                        <button class="btn btn-primary" id="show_more">Show more</button>
                    </div>

            </div>
        </div>
    </div>

    </div>

    <div id="show">

    </div>
</body>

</html>