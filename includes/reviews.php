<?php 

$allComment = "SELECT * FROM `reviews` WHERE product_id= '$product_id'";
$reviews = run_query($allComment);


?>


<!-- Comment section -->


<div class="review_section">
    <h2>Comments</h2>
    <hr>


    <div class=""  id= "all_comment">
        <?php
        $comment = '';
        while($review = mysqli_fetch_array($reviews)){
            $comment .= '
            <div class="media text-muted pt-3 comment ">            
            <img src="assets/img/dummy/u2.png" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">@username</strong>
            '.$review["content"].'
            </p>
            </div>
            ';
        }
            echo $comment;
        
        
        ?>
    </div>

    <!-- Comment Section -->
    <?php
            $product_ = "select * from products where id = $product_id;";

        
            $items_ = run_query($product_);
            $result_ = $items_  -> fetch_assoc();
    
    ?>

    <!-- <form action="" class="" method="post"> -->
        <fieldset>
            <legend>Write your comment review here</legend>
        
        <textarea name="" id="comment_value" cols="30" rows="10"></textarea>
        <div class="float-right">

        <input type="hidden" name="product_id" id="product_id_comment" value =<?php echo $result_["id"];?> >
        <button class="btn btn-success " id="btn_send_comment">Send</button>
        <input type="reset" name="" value="Discard" id="" class="btn btn-info">
        </fieldset>
            
        </div>
    <!-- </form> -->
</div>
