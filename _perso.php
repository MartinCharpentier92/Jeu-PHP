<div class="perso-donjons-play">
    <div>
        <h2 class="perso-donjons-play-h2"><?php echo $_SESSION['perso']['name']; ?></h2>
    </div>
    
    <div>
        <a class="perso-donjons-play-button" href="persos.php">Changer</a>
    </div>

    <div class="perso-donjons-play-details">
        <b>Point de vie :</b> <?php echo $_SESSION['perso']['pdv']; ?></h2>
    </div>
    <div class="perso-donjons-play-details">
        <b>Or :</b> <?php echo $_SESSION['perso']['gold']; ?></h2>
    </div>
    <div class="perso-donjons-play-details">
        <b>Xp :</b> <?php echo $_SESSION['perso']['xp']; ?></h2>
    </div>
    <div class="perso-donjons-play-details">
        <b>Force :</b> <?php echo $_SESSION['perso']['for']; ?></h2>
    </div>
    <div class="perso-donjons-play-details">
        <b>Dextérité :</b> <?php echo $_SESSION['perso']['dex']; ?></h2>
    </div>
    <div class="perso-donjons-play-details">
        <b>Intelligence :</b> <?php echo $_SESSION['perso']['int']; ?></h2>
    </div>
    <div class="perso-donjons-play-details">
        <b>Charisme :</b> <?php echo $_SESSION['perso']['char']; ?></h2>
    </div>
    <div class="perso-donjons-play-details">
        <b>Vitesse :</b> <?php echo $_SESSION['perso']['vit']; ?></h2>
    </div>
</div>