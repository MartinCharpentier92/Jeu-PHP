<?php

    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    if (isset($_SESSION['fight'])){
        unset($_SESSION['fight']);
    }

    $bdd = connect();

    $sql= "SELECT * FROM `rooms` WHERE donjon_id = :donjon_id ORDER BY RAND() LIMIT 1;";

    $sth = $bdd->prepare($sql);

    $sth->execute([
        'donjon_id' => $_GET['id']
    ]);

    $room = $sth->fetch();
    //dd($room);

    require_once('./classes/Room.php');
    $roomObject = new Room($room);
    $roomObject->makeAction();
    
?>

<?php require_once('_header.php'); ?>

    <div>
        <div>
            <h1>Devanture du temple</h1>
            <p>
                Voici le temple de plus près. Sa taille me saisit, 
                comment un tel temple peut-il être encore en si parfait état après tout ce temps, 
                ces guerres, ces cataclysmes.
            </p>
            <img src="img/temple-zeus-front">
        </div>     
        
    </div>