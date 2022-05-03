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

    $_SESSION['cart']=
    [
        $product_id => $amount
    ];
    echo $amount;
    // header("Location: ../index.php");


}

?>