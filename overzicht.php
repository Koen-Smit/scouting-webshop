<?php session_start(); 
if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen";
    header("Location: inlogpagina.php?");
    exit;
}
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
<?php require_once "header.php" ?>
<?php
require_once "backend/conn.php";
$query= "SELECT * FROM orders";
$statement = $conn->prepare($query);
$statement ->execute();
$orders= $statement-> fetchAll(PDO::FETCH_ASSOC);

?>
<div class="overzicht-container">
    <table>
        <tr></tr>
            <th>Order Number:</th>
            <th>Email:</th>
            <th>Status:</th>
            <th>Wijziging</th>
        </tr>
        <?php foreach ($orders as $order):?>
            <tr>
                <td><?php echo $order['order_number'] ?></td>
                <td><?php echo $order['email_recipient'] ?></td>
                <td><?php if (($order['status']) == 1)
                {
                    echo "verzonden";
                }
                else{
                    echo "niet verzonden";
                }?></td> 
                <td><a href="edit.php?id=<?php echo $order['id'];?>">aanpassen</a></td>                   
            </tr>
        <?php endforeach ?>
    </table>
</div>
