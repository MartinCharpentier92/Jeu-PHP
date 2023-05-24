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
            
            <div class="donjons-perso-name">
                <b><?php echo $_SESSION['perso']['name']; ?></b>
            </div>

            <div class="donjons-perso-name-button">
                <a class="donjons-perso-link-change"
                href="persos.php">Changer</a>
            </div>

        </div>

        <div class="donjons-choix">
            <h1 class="donjons-choix-h1">Choississez une aventure</h1>

            <div>
                <?php foreach ($donjons as $donjon) {?>
                    <a href="donjons_front.php?id=<?php echo $donjon['id']?>">
                        <div class="donjons-choix-nom">
                            <h2><?php echo $donjon['name'];?></h2>
                        </div>
                        <div class="donjons-choix-img">
                            <img src="img/<?php echo $donjon['picture'] ? $donjon['picture']:""?>" alt="">
                        </div>
                        <div class="donjons-choix-desc">
                            <p><?php echo $donjon['description'];?></p>
                        </div>
                    </a>
                    

                <?php } ?>
            </div>
            
        </div>
    