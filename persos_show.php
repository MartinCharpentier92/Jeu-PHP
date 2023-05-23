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

    <div class="persosShow">
        <h1 class="persosShow-h1">Détails du personnage</h1>

        <div class="persosShow-details">
            <div class="persosShow-d">
                <b>Nom :</b> <?php echo $perso['name']; ?>
            </div>

            <div class="persosShow-d">
                <b>Point de vie :</b> <?php echo $perso['pdv']; ?>
            </div>

            <div class="persosShow-d">
                <b>Expérience:</b> <?php echo $perso['xp']; ?>
            </div>

            <div class="persosShow-d">
                <b>Force :</b> <?php echo $perso['for']; ?>
            </div>

            <div class="persosShow-d">
                <b>Dextérité :</b> <?php echo $perso['dex']; ?>
            </div>

            <div class="persosShow-d">
                <b>Charisme :</b> <?php echo $perso['char']; ?>
            </div>

            <div class="persosShow-d">
                <b>Intelligence :</b> <?php echo $perso['int']; ?>
            </div>

            <div class="persosShow-d">
                <b>Vitesse :</b> <?php echo $perso['vit']; ?>
            </div>

            <div class="persosShow-d">
                <b>Or :</b> <?php echo $perso['gold']; ?>
            </div>

        <div>
            <a class="persosShow-form-retour" href="persos.php">Retour</a>
        </div>

    </div>

        </div>
        
</body>
</html>