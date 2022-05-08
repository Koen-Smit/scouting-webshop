<?php
session_start();
$id = $_GET['id'];

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
<?php 
require_once "backend/conn.php";
$editQuery = "SELECT * FROM orders WHERE id = :id";
$editStatement = $conn -> prepare($editQuery);
$editStatement ->execute([
    "id" => $id
]);
$order = $editStatement -> fetch(PDO::FETCH_ASSOC);
?>
<div class="edit-container">
    <form action="backend/backendController.php" method='POST'>
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email-recipient" value="<?php echo $order['email_recipient']?>" style="width:150px;" readonly>
        </div>
        <div class="form-group">
            <label>OrderNumber:</label>
            <input type="number" name="order_number" value="<?php echo $order['order_number']?>" style="width:150px;" readonly>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <select name="status" id="status">
                <option value="0">Niet verzonden</option>
                <option value="1">Verzonden</option>
<           </select>   
        </div>
        <input type="submit" value="wijziging opslaan">
    </form>
</div>