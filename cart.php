<?php
session_start();
?>


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



