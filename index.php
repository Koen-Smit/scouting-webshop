
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Document</title>
</head>
<?php require_once "header.php" ?>
<body>
    <div class="wrapper">
        <div class="banner">
            <img src="img/scoutingbanner.jpg" alt="banner-scouting">
        </div>
    <div class="wrapper">
        <h2>Nieuwe producten</h2>
        <div class="new-product-wrapper">
            <div class="new-product">
                <img src="img/scouting.jpg" alt="">
                <form action="backend/backendController.php">
                    <div class="form-group">
                        <label for="product1">product1</label>
                        <input type="number" name="product1" id="product1" min="0">
                    </div>
                    <input type="submit" name="submit" value="verzend-product">
            </div>
            <div class="new-product">
                <img src="img/scouting.jpg" alt="">
                <form action="backend/backendController.php">
                    <div class="form-group">
                        <label for="product2">product2</label>
                        <input type="number" name="product2" id="product2" min="0">
                    </div>
                    <input type="submit" name="submit" value="verzend-product">
            </div>
            <div class="new-product">
                <img src="img/scouting.jpg" alt="">
                <form action="backend/backendController.php">
                    <div class="form-group">
                        <label for="product3">product3</label>
                        <input type="number" name="product3" id="product3" min="0">
                    </div>
                    <input type="submit" name="submit" value="verzend-product">
            </div>
            <div class="new-product">
                <img src="img/scouting.jpg" alt="">
                <form action="backend/backendController.php">
                    <div class="form-group">
                        <label for="product4">product4</label>
                        <input type="number" name="product4" id="product4" min="0">
                    </div>
                    <input type="submit" name="submit" value="verzend-product">
            </div>
        </div>

</body>
<?php require_once "footer.php"?>
</html>