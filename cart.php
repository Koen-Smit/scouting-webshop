<?php
session_start();
?>
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
<?php require_once "header.php"; ?>

<div class="cart">
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $totalPrice = 0;
        foreach($_SESSION['cart'] as $productId => $amount)
        {   
            require_once "backend/conn.php";
            
            $query = "SELECT * FROM products WHERE id = :id";

            $stmt = $conn->prepare($query);
            $stmt->execute([
                ":id"=> $productId
            ]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalProductPrice = $product['price'] * $amount;
            $totalPrice = $totalPrice + $totalProductPrice;

            ?>
            
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td>&euro;<?php echo $product['price']; ?>,-</td>
                <td><?php echo $amount ?></td>
                <td>&euro;<?php echo $totalProductPrice; ?>,-</td>
            </tr>
            <?php
        }
    ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>&euro;<?php echo $totalPrice; ?>,-</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="verzend-cart">
<form action="backend/backendcontroller.php" method="POST">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" style="width: 200px;">
        <input type="hidden" name="action" value="create">
        <input type="hidden" name="status" value="0">
        <input type="hidden" name="cart" value="<?php $_SESSION['cart']?>">
    </div>
    <input type="submit" value="Bestel">
</form>
</div>



