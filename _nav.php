
    <ul id="nav">
        <?php if (!isset($_SESSION['user'])) { ?>

            <div class="nav-link1">
                <li><a href="index.php">Accueil</a></li>    
            </div>
            <div class="nav-link2">
                <li><a href="login.php">Connexion</a></li>
                <li><a href="register.php">Créer un compte</a></li>
                
            </div>
            
        <?php } else { ?>

            <div class="nav-link1">
                <li><a href="index.php">Accueil</a></li>
            </div>
            <div class="nav-link2">
                <li><a href="persos.php">
                    <?php echo $_SESSION['user']['nickname']; ?>
                </a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </div>
            
        <?php } ?>
    </ul>