<?php
require_once 'conn.php';
$query ="SELECT * FROM orders ";
$statement = $conn->prepare($query);
$statement->execute();
$users = $statement->fetchall(PDO::FETCH_ASSOC);
?>