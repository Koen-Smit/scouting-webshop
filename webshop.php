<?php session_start();?>
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
<?php require_once "header.php"?>
<body>
    <div class="wrapper">
        <h2>Producten overzicht</h2>
        <div class="all-product-wrapper">
        <?Php 
        
        require_once "backend/conn.php";
        $query = "SELECT * FROM  products";
        $statement = $conn->prepare($query);
        $statement->execute();
        $products = $statement->Fetchall(PDO::FETCH_ASSOC); 
        
        foreach($products as $product)
        { ?>
                <div class="product">
                    <img src=<?php echo $product['img'];?> alt="">
                    <form action="backend/backendController.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="action" value="add">
                            <input type ="hidden" name="product-id" value="<?php echo $product['id'];?>">
                            <label for="product1"><?php echo $product['name']?></label>
                            <input type="number" name="amount"  min="0">
                        </div>
                        <input type="submit" name="submit" value="verzend-product">
                    </form>
                </div>
            
                <?php
        }
           ?>
        </div>
    </div>
    
</body>
<?php require_once "footer.php"?>
</html>