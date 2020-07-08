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