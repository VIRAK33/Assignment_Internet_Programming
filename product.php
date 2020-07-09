<!DOCTYPE html>
<?php
    include 'connection/config.php';
?>
<html lang="en" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Assignment 3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
    crossorigin="anonymous">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>



</head>

<body>
    <?php
        include 'includes/nav_bar.php';
        include 'includes/feature.php';
        include 'includes/promotion.php';
    ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">

                <!-- Category -->
                <?php 
                    $categories = run_query("select * FROM categories;"); 
                    $row = $categories -> fetch_array(MYSQLI_NUM);
                    $count = 1;
                    $category_id =''; 
                    if(isset($_POST['category_id'])){
                        $category_id = $_POST['category_id'];
                        
                    }
                ?>
                <!--widget-category-->
                <div class="widget widget-shop-category">
                    <h3>Categories</h3>
                    <ul>
                        <?php
                            foreach($categories as $category):
                                if($category_id == $category['id']){
                                    echo
                                    '<li>
                                        <button id="'.$category["name"].'" class="text_category active">
                                            <img class="icon_category" src="assets/icon/'.$category["icon"].'" alt="" srcset="">
                                            '.$category["name"].'
                                        </button>
                                    </li>';
                                }
                                else{
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

        <!-- Product -->
        <?php
            $product_id = '';
            $product ="";
            if(isset($_POST['product_id'])){
                $product_id = $_POST['product_id'];
                $product = "select * from products join assets on products.id = assets.product_id where products.id = $product_id;";
                
            }else{
                $product_id = 2;
                $product = "select * from products join assets on products.id = assets.product_id where 1;";
                
            }
            
                // $product = "select * from products join assets on products.id = assets.product_id where products.id = $product_id;";
                $items = run_query($product);
                // $result = $items  -> fetch_array(MYSQLI_NUM); fetch_assoc();
                $result = $items  -> fetch_assoc();
                
        
        ?>
        <div class="col-md-9" id ="item">
            <!-- Product Detail -->
            <?php include 'includes/product_detail.php'; ?>
            
            <!-- Comment section -->
            <?php include 'includes/reviews.php'; ?>

        </div>
    </div>
</div>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/style.js"></script>
    
</body>

</html>
