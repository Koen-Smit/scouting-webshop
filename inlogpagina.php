<?php session_start(); ?>
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
<div class="wrapper">
    <div class="inlogdiv">
        <form action="backend/loginController.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="username" style="width: 100px;">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="password" style="width: 100px;">
            </div>
            <input type="submit" value="inloggen">

        </form>
    </div>
</div>