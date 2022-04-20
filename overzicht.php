<?php include "backend/backendController.php" ?>


<?php foreach($users as $user):?>
 <?php echo $user['naam'] ?>   
<?php echo $user['product'] ?>
<?php echo $user['datum'] ?>
<?php endforeach ?>