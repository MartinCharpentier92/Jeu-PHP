<?php 

    require_once('functions.php');

    if (!isset($_SESSION['user']))
    {
        header('Location: login.php');
    }

    if (!isset($_GET['id']))
    {
        header('Location: persos.php?msg=id non passé !');
    }
    
    $bdd = connect();

    $sql = "SELECT * FROM persos WHERE id = :id AND user_id=:user_id;";

    $sth = $bdd-> prepare($sql);

    $sth->execute([
        'id'        => $_GET['id'],
        'user_id'   => $_SESSION['user']['id']
    ]);

    $perso = $sth->fetch();

?>

<?php require_once('_header.php'); ?>

    <div>
        <h1>Détails du personnage</h1>

        <div>
            <b>Nom :</b> <?php echo $perso['name']; ?>
        </div>

        <div>
            <b>Point de vie :</b> <?php echo $perso['pdv']; ?>
        </div>

        <div>
            <b>Expérience:</b> <?php echo $perso['xp']; ?>
        </div>

        <div>
            <b>Force :</b> <?php echo $perso['for']; ?>
        </div>

        <div>
            <b>Dextérité :</b> <?php echo $perso['dex']; ?>
        </div>

        <div>
            <b>Charisme :</b> <?php echo $perso['char']; ?>
        </div>

        <div>
            <b>Intelligence :</b> <?php echo $perso['int']; ?>
        </div>

        <div>
            <b>Vitesse :</b> <?php echo $perso['vit']; ?>
        </div>

        <div>
            <b>Or :</b> <?php echo $perso['gold']; ?>
        </div>

        <div>
            <a href="persos.php">Retour</a>
        </div>

    </div>

</body>
</html>