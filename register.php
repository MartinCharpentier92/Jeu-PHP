<?php

    require_once('functions.php');

    if (isset($_POST["send"])) {
        $bdd = connect();

        $sql = "INSERT INTO users (`email`, `password`,`nickname`) VALUES (:email, :password, :nickname);";
        $sth = $bdd->prepare($sql);
        $sth->execute([
            'email'     => $_POST['email'],
            'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'nickname'  => $_POST['nickname']
        ]);

        header('Location: login.php');
    }

?>


<?php require_once ('_header.php'); ?>

    <form class="register-form" action="" method="post">
        <h1 class="register-form-h1">Création de votre compte</h1>

        <div class="register-form-element1">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" placeholder="Entrez votre mail">
        </div>

        <div class="register-form-element2">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">
        </div>

        <div class="register-form-element3">
            <label for="nickname">Pseudo :</label>
            <input type="text" name="nickname" id="nickname" placeholder="Entrez votre pseudo">
        </div>


        <div class="register-form-element4">
            <input type="submit" name="send" value="Créer">
        </div>

    </form>

</body>
</html>
