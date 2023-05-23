<?php

    require_once('functions.php');

    if (!isset($_SESSION['user'])){
        header('Location: login.php');
    }
    
    $bdd = connect();

    $sql = "SELECT * FROM persos WHERE user_id = :user_id";

    $sth = $bdd -> prepare($sql);

    $sth->execute([
        'user_id'     => $_SESSION['user']['id']
    ]);

    $persos = $sth -> fetchAll();


?>

<?php require_once('_header.php'); ?>

<div class="persos">

    <?php if (isset($_GET['msg'])){
        echo "<div>" . $_GET['msg'] . "</div>";
    }
    ?>

    <h1 class="persos-h1">Vos personnages</h1>
    <a class="btn persos-link-perso-add" href="persos_add.php">
        Créer un personnage</a>


    <table class="persos-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Point de vie</th>
                <th>Expérience</th>
                <th>Force</th>
                <th>Dextérité</th>
                <th>Charisme</th>
                <th>Intelligence</th>
                <th>Vitesse</th>
                <th>Or</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($persos as $perso) {?>
                <tr>
                    <td><?php echo $perso['name']; ?></td>
                    <td><?php echo $perso['pdv']; ?></td>
                    <td><?php echo $perso['xp']; ?></td>
                    <td><?php echo $perso['for']; ?></td>
                    <td><?php echo $perso['dex']; ?></td>
                    <td><?php echo $perso['char']; ?></td>
                    <td><?php echo $perso['int']; ?></td>
                    <td><?php echo $perso['vit']; ?></td>
                    <td><?php echo $perso['gold']; ?></td>
                    <td>
                        <div class="persos-table-td-choice">
                            <?php if ($perso['pdv'] > 0 ){ ?>
                                <a class="persos-link-perso-choose" href="persos_choice.php?id=<?php echo $perso['id']; ?>">Choisir</a>
                            <?php } else { ?>
                                <a class="persos-link-perso-resu" href="persos_respawn.php?id=<?php echo $perso['id']?>">Résussité</a>
                            <?php } ?>

                            <a class="persos-link-perso-details" href="persos_show.php?id=<?php echo $perso['id'];?>">Détails</a>
                            
                            <a class="persos-link-perso-modif" href="persos_edit.php?id=<?php echo $perso['id'];?>">Modifier</a>
                            
                            <a class="persos-link-perso-del"href="persos_del.php?id=<?php echo $perso['id'];?>"
                            onClick="return confirm('Etes-vous sûr ?')";>Supprimer</a>
                        </div>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    
</div>

</body>
</html>
