<?php
    spl_autoload_register(function($className) {
        require $className . '.php';
    });
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de personnage</title>
</head>
<body>

    <?php
        require 'PDOFactory.php';
        require 'Manager.php';
        $dataBase = new PDOFactory;
        $dataBase->setBdd();
        $allPersos = $dataBase->getAllPersonnages();
        $manager = new Manager;
    ?>

    <?php
    if(!isset($manager->actualPlayer)){ ?>
        
        <span>Nombre de personnages : <?php echo count($allPersos) ?> </span>
        <form action='personnageManager.php' method='post'>
            <label for=''>Choisissez un nom pour votre personnage :</label>
            <input type='text' name='nom'>
            <div>
                <input type='radio' value='guerrier' name='classe'>
                <label for=''>Guerrier</label>
                <input type='radio' value='magicien' name='classe'>
                <label for=''>Magicien</label>
            </div>
            <button type='submit'>Envoyer</button>
        </form>

        <div>
            <?
                foreach($allPersos as $key => $perso){ ?>
                    <div>
                        <?= $perso['nom'] ?>
                        <?= ucfirst($perso['classe']) ?>
                        <div>
                            <span><?= $perso['pv'] ?></span>
                            <span><?= $perso['attaque'] ?></span>
                            <span><?= $perso['defense'] ?></span>
                        </div>
                        <form method="post">
                            <button id="play" name="<?php echo "play".$key ?>">Jouer</button>
                            <button id="delete" name="<?php echo "delete".$key ?>">Supprimer</button>
                        </form>
                    </div>

                    <?php
                        if(isset($_POST['play'.$key])) {
                            $manager->setActualPlayer($allPersos[$key]);
                        }
                        if(isset($_POST['delete'.$key])) {
                            $dataBase->deletePersonnage($allPersos[$key]);
                        }
                    ?>

            <?php } ?>
        </div>
    <?php
    } else { ?>
        <span>Un perso est selectionné</span>
    <?php } ?>

</body>
</html>