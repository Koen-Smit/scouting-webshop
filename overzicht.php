<?php session_start(); 
if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen";
    header("Location: inlogpagina.php?");
    exit;
}
?>
<?php
require_once "backend/conn.php";
$query= "SELECT * FROM orders WHERE status = :status";
$statement = $conn->prepare($query);
$statement ->execute([
    ":status" => $status]);
$orders= $statement-> fetch(PDO::FETCH_ASSOC);

?>
<?php foreach($orders as $order):?>
 <?php echo $order['naam'] ?>   
<?php echo $order['product'] ?>
<?php echo $order['datum'] ?>
<?php endforeach ?>
