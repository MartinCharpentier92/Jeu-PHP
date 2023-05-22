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
    <div class="container">
        <div>
            <div>
                <?php require_once('_perso.php'); ?>
            </div>
            <div>
                <h1><?php echo $roomObject->getName(); ?></h1>
                <p><?php echo $roomObject->getDescription(); ?></p>
                <?php echo $roomObject->getHTML(); ?>
            </div>
        </div>
        
    </div>
    
    
</html>
