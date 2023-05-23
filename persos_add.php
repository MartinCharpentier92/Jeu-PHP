<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (isset($_POST["send"])) {
        if ($_POST['name'] != "") {
            $bdd = connect();

            $sql = "INSERT INTO persos (`name`, `for`, `dex`, `int`, `char`, `vit`, `pdv`, `user_id`)  
            VALUES (:name, :for, :dex, :int, :char, :vit, :pdv, :user_id);";
            
            $sth = $bdd->prepare($sql);
        
            $sth->execute([
                'name'      => $_POST['name'],
                'for'       => 10,
                'dex'       => 10,
                'int'       => 10,
                'char'      => 10,
                'vit'       => 10,
                'pdv'       => 20,
                'user_id'   => $_SESSION['user']['id']
            ]);

            header('Location: persos.php');
        }
    }

    /*if(isset($_POST['send'])){
        
        $personnage = $_POST['send'];

        $bdd = connect();

        $sql = "SELECT COUNT(*) FROM persos WHERE personnage=? ";

        $sth = $bdd->prepare($sql);
        $sth->execute([$personnage]);
        $persoExist = $sth->fetch();

    }
    */
    
    //J'ai voulu afficher les caractéristiques du personnages
    //uniquement s'il existe

?>

<?php require_once('_header.php'); ?>
    <div class="persosAdd-form">
        <h1 class="persosAdd-form-h1">Créer un personnage</h1>
        <form action="" method="post">

            <div class="persosAdd-form-element1">
                <label for="name">Nom :</label>
                <input 
                    class="persosAdd-form-champ"
                    type="text"
                    id="name"
                    name="name"
                    placeholer="Entrez un nom"
                    required
                />
            </div>

            <div class="persosAdd-form-element2">
                <input type="submit" name="send" value="Créer" />
            </div>

            <div> 
                <a class="persosAdd-form-retour" href="persos.php">Retour</a>
            </div>
            
        </form>
    </div>
</body>
</html>