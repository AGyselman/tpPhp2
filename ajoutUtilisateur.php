<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Ajout produit</title>
</head>
<body>
    <?php
        include 'menu.php';
        ?>
    <h3>Ajouter un utilisateur :</h3>
    <form action="" method="post">
        <p>Saisir le nom :</p>
        <input type="text" name="nom_util">
        <p>Saisir le prenom :</p>
        <input type="text" name="prenom_util">
        <p>Saisir le mail :</p>
        <input type="text" name="mail_util">
        <p>Saisir le MDP :</p>
        <input type="text" name="mdp_util">
        <p>Saisir img :</p>
        <input type="text" name="img_util">
        <p><input type="submit" value="Ajouter"></p>
    </form>
    <?php
        //fichier de connexion à la BDD
        include 'connectBdd.php';
        //function requête SQL
        include 'function.php';
        //test si les champs existent et sont remplis
        if(isset($_POST['nom_util'])AND isset($_POST['prenom_util'])
        AND isset($_POST['mail_util'])
        AND isset($_POST['mdp_util'])
        AND isset($_POST['img_util']) AND
        $_POST['nom_util'] != "" AND $_POST['prenom_util'] !="" AND $_POST['mail_util'] !=""
        AND $_POST['mail_util'] !="" AND $_POST ['mdp_util'] !="" AND $_POST['img_util'] !=""){
            $nomUtil = $_POST['nom_util'];
            $prenomUtil = $_POST['prenom_util'];
            $mailUtil = $_POST['mail_util'];
            $mdpUtil = $_POST['mdp_util'];
            $imgUtil = $_POST['img_util'];
            insertUtil($bdd,$nomUtil,$prenomUtil,$mailUtil,$mdpUtil);
            echo "$nomUtil à été ajouté en BDD";
        }
        else{
            echo 'Veuillez remplir les champs du  formulaire';
        }
    ?>
</body>
</html>