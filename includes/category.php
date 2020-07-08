<?php 
    $categories = run_query("select * FROM categories;"); 
    $row = $categories -> fetch_array(MYSQLI_NUM);
    $count = 1;
?>


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