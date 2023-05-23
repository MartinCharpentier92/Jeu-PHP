<header>

<ul id="nav">
    <?php if (!isset($_SESSION['user'])) { ?>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="login.php">Connexion</a></li>
        <li><a href="register.php">Créer un compte</a></li>
    <?php } else { ?>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="persos.php"><?php echo $_SESSION['user']['nickname'] ?></a></li>
        <li><a href="logout.php">Déconnexion</a></li>
    <?php } ?>
</ul>


</header>
   