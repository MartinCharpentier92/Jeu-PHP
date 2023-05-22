<?php

    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    $bdd = connect();

    $sql = "SELECT * FROM donjons";

    $sth = $bdd->prepare($sql);
        
    $sth->execute();

    $donjons = $sth->fetchAll();
?>

<?php require_once('_header.php'); ?>

    <div class="donjons-perso">
        
        <div>
            <?php echo $_SESSION['perso']['name']; ?>
        </div>

        <div>
            <a href="persos.php">Changer</a>
        </div>

    </div>

    <div>
        <h1>Choississez une aventure</h1>

        <div>
            <?php foreach ($donjons as $donjon) {?>
                <a href="donjons_play.php?id=<?php echo $donjon['id']?>">
                    <div>
                        <?php echo $donjon['name'];?>
                    </div>
                    <div>
                        <img src="img/<?php echo $donjon['picture'] ? $donjon['picture']:""?>" alt="">
                    </div>
                    <div>
                        <?php echo $donjon['description'];?>
                    </div>
                </a>
                

            <?php } ?>
        </div>
        
    </div>