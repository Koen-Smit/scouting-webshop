<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen";
    header("Location: ../inlogpagina.php");
    exit;
}

$action= $_POST['action'];

if ($action == "add")
{   
    $product_id= $_POST['product-id'];
    $amount = $_POST['amount'];
    
    if($amount == null || $amount == 0)
    {
        die("geen geldig getal gekozen");
    }

    $_SESSION['cart'][$product_id] = $amount;
    
     header("Location: ../webshop.php");
}
if ($action =="create")
{   
    $email=$_POST['email'];
    $status = $_POST['status'];
    $cart=$_POST['cart'];
    $orderNumber = rand();
    $_SESSION['winkelwagen'] = json_encode($_SESSION['cart']);
    require_once "conn.php";
    $query="INSERT INTO orders(status, email_recipient, producten,order_number) VALUES(:status, :email, :cart, :order_number)";
    $statement = $conn->prepare($query);
    $statement->execute([
       ":status" =>$status,
       ":email" => $email, 
       ":cart" => $_SESSION['winkelwagen'],
       ":order_number" => $orderNumber
    ]);
    header("Location: ../overzicht.php");
}
if ($action == "edit")
{   
    $id = $_POST['id'];
    $status = $_POST['status'];

    require_once "conn.php";
    $query ="UPDATE orders SET status = :status WHERE id = :id ";
    $statement = $conn->prepare($query);
    $statement-> execute([
        ":id" => $id,
        ":status" => $status
    ]);
    header("Location: ../overzicht.php");
}
?>