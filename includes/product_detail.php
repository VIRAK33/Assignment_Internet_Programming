<!-- Product -->
<?php
    $product_id = '';
    $product = '';
    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];
        $product = "select * from products join assets on products.id = assets.product_id where products.id = $product_id;";
        
    }else{
        $product = "select * from products join assets on products.id = assets.product_id where 1;";
        
    }
    
        // $product = "select * from products join assets on products.id = assets.product_id where products.id = $product_id;";
        $items = run_query($product);
        // $result = $items  -> fetch_array(MYSQLI_NUM); fetch_assoc();
        $result = $items  -> fetch_assoc();
        

?>


<div class="widget" id="product_detail_section">
    <div class="single-product-detail" >
        <div class="row">
            <div class="col-xs-12 col-md-5">
                <div class="demo">
                    <div class="lSSlideOuter ">
                        <div class="lSSlideWrapper usingCss" style="transition-duration: 400ms; transition-timing-function: ease;">
                            <ul id="lightSliderGallery" class="lightSlider showSlider lsGrab lSSlide" data-gallery="true" data-item="1" data-loop="true"
                                data-auto="true" data-thumbs="4" data-controls="false" data-position="middle" style="width: 4972.8px; transform: translate3d(-2131.2px, 0px, 0px); height: 600px; padding-bottom: 0%;">
                                <li data-thumb='<?php echo $result["resource_path"];?>' class="clone left" style="width: 704.4px; margin-right: 6px;">
                                    <img src='<?php echo $result["resource_path"];?>'>
                                </li>
                                <li data-thumb='<?php echo $result["resource_path"];?>' class="lslide" style="width: 704.4px; margin-right: 6px;">
                                    <img src='<?php echo $result["resource_path"];?>'>
                                </li>
                                <li data-thumb='<?php echo $result["resource_path"];?>' class="lslide" style="width: 704.4px; margin-right: 6px;">
                                    <img src='<?php echo $result["resource_path"];?>'>
                                </li>
                                <li data-thumb='<?php echo $result["resource_path"];?>' class="lslide active" style="width: 704.4px; margin-right: 6px;">
                                    <img src='<?php echo $result["resource_path"];?>'>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!--column-6-->
            <div class="col-xs-12 col-md-6 col-md-offset-1">
                <div class="single-product-overview ">
                    <h2>
                        <?php echo $result['name']?>
                    </h2>

                    <div class="content-wrapper">
                        <p>
                            <?php echo $result['description']?>
                        </p>
                    </div>

                    <div class="cart-options">
                        <span href="#" class="price">
                            <span>$
                                <?php echo (((100-$result['discount']) * $result['price'])/100); ?>
                            </span>
                            <del>$
                                <?php  echo $result['price'] ?>
                            </del>
                        </span>
                        <div class="cart-buttons">
                            <div class="quantity">
                                <span class="xv-qyt xv-qup" data-value="1">+</span>
                                <span class="xv-qyt xv-down" data-value="-1">-</span>
                                <input step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" type="number">
                            </div>
                            <span>
                                <a class="btn btn-lg btn-primary">ADD TO CART</a>
                            </span>
                        </div>
                        <!--cart-buttons-->
                    </div>
                    <!--cart-options-->
                </div>
                <!--single-product-overview-->
            </div>
            <!--column-6-->
        </div>
        <!--single-product-detail-->

    </div>
</div>
