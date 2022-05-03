<?php
session_start();
$username= $_POST['username'];
$password = $_POST['password'];

require_once "conn.php";

$query= "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement ->execute([
    ":username" => $username]);
$user= $statement-> fetch(PDO::FETCH_ASSOC);

if($statement->rowCount() < 1)
{
    die("Error: Account bestaat niet ");
}
if(!password_verify($password,$user['password']))
{
    die("Error Account gegevens niet juist!");
}

$_SESSION['user_id'] = $user['id'];
header("location: $base_url/index.php");


?>