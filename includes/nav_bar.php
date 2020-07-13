    <!-- Nav -->
    <div class="nav">
        <div class="container">
            <p class="display-4 float-left">Awesom
                <span class="text-success">Shop</span>
            </p>
            <div class="float-right ">
                <h2 class="display-6 need-help float-left">
                    <span>
                        <i class="icon-question-circle"></i>
                    </span> Need help &nbsp;
                    
                    
                    <?php
                        if(isset($_SESSION['username'])){
                            echo '
                            <div class="dropdown float-right" style="width:100">
                                <p class="text-primary dropdown-toggle" style="cursor: pointer;"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    '.$_SESSION['username'].'
                                </p>
                                <div class="dropdown-menu" style="width:100px" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" style="width:100px" href="#" id="logout">Logout</a>
                                
                                </div>
                            </div>';
                        }else{
                            echo '<div class="btn btn-primary"><a href="signin.php" style = "color:white">Join</a></div>';
                        }

                    ?>
                    
                </h2>
            </div>
        </div>
    </div>