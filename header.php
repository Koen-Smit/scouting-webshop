<header>
    <div class="logo-header">
        <img src="img/scouting.jpg">
    </div>
    <div class="navigatie-top">    
    <nav>
        <a href="index.php">Home</a>
        <a href="webshop.php">Webshop</a>
        <a href="overzicht.php">Overzicht</a>
        <a href="cart.php">cart</a>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Uitloggen</a>
        <?php else: ?>
            <a href="inlogpagina.php">Inloggen</a>
        <?php endif; ?>
    </nav>
    </div>
</header>