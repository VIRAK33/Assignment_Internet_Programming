<!DOCTYPE html>
<?php
    include 'connection/config.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/app.css">
        
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="assets/js/style.js"></script>
</head>
<body>
    <?php
        include 'includes/nav_bar.php';
        include 'includes/feature.php';
        include 'includes/promotion.php';
    ?>
        <!--Category and Product -->
        <div class="container">
            <div class="row">
            <?php
                include 'includes/category.php';
                include 'includes/products.php';
            ?>
            </div>
        </div>
</body>
</html>