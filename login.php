<?php 

    require_once('functions.php');

    if (isset($_POST["send"])) {
        $bdd = connect();
        $sql = "SELECT * FROM users WHERE `nickname` = :nickname;";
        
        $sth = $bdd->prepare($sql);
        
        $sth->execute([
            'nickname'     => $_POST['nickname']
        ]);

        $user = $sth->fetch();
        
        if ($user && password_verify($_POST['password'], $user['password']) ) {
            // dd($user);
            $_SESSION['user'] = $user;
            header('Location: persos.php');
        } else {
            $msg = "Pseudo ou mot de passe incorrect !";
        }
    }
?>

<?php require_once('_header.php'); ?>

    <form class="login-form" action="" method="post">
        <h1 class="login-form-h1">Connexion</h1>

        <div class="msg-erreur">
            <?php if (isset($msg)) { echo "<div>" . $msg . "</div>"; } ?>
        </div>
        

        <div class="login-form-element1">
            <label for="nickname">Pseudo :</label>
            <input 
                class="login-form-champ"
                type="text" 
                name="nickname" 
                id="nickname" 
                placeholder="Entrez votre pseudo">
        </div>

        <div class="login-form-element2">
            <label for="password">Mot de passe :</label>
            <input 
                class="login-form-champ"
                type="password"
                name="password"
                id="password"
                placeholder="Entrez votre mot de passe">
        </div>

        <div class="login-form-element3">
            <input class="login-form-input"
                type="submit" name="send" value="Connexion">
        </div>
    </form>

</body>
</html>