<?php

    require_once("functions.php");

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

    if (isset($_POST["send"])) {
        if ($_POST['name'] != "") {

            $sql = "UPDATE persos SET `name` = :name WHERE id = :id AND user_id = :user_id;";
            
            $sth = $bdd->prepare($sql);
        
            $sth->execute([
                'name'      => $_POST['name'],
                'id'        => $_GET['id'],
                'user_id'   => $_SESSION['user']['id']
            ]);

            header('Location: persos.php');
        }
    }


    $sql="SELECT * FROM persos WHERE id = :id AND user_id=:user_id;";

    $sth = $bdd->prepare($sql);
        
    $sth->execute([
        'id'          => $_GET['id'],
        'user_id'     => $_SESSION['user']['id']
    ]);

    $perso = $sth->fetch();
?>

<?php require_once('_header.php'); ?>

    <form action="" method="post" class="persosEdit-form">
    <h1 class="persosEdit-form-h1">Modifier un personnage</h1>
        <div class="persosEdit-form-element1">
            <label for="name">Nom :</label>
            <input 
                class="name-change"
                type="text"
                id="name"
                name="name"
                placeholer="Entrez un nom"
                required
            />
        </div>

        <div class="persosEdit-form-element2">
            <input 
                type="submit"
                name="send"
                value="Modifier">
        </div>
        
        <div class="persosEdit-form-element3">
            <a class="persosEdit-form-retour" href="persos.php">Retour</a>
        </div>
    </form>
</body>
</html>