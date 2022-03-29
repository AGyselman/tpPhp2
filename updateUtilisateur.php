<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Document</title>
</head>
<body>
    <h3>Modifier un utilisateur :</h3>
    <form action="" method="post">
        <p>Saisir le nom :</p>
        <input type="text" name="nom_util">
        <p>Saisir le prenom :</p>
        <input type="text" name="prenom_util">
        <p>Saisir le mail :</p>
        <input type="text" name="mail_util">
        <p>Saisir le MDP :</p>
        <input type="text" name="mdp_util">
        <p><input type="submit" value="Ajouter"></p>
    </form>
    <!--Import-->
    <?php
        //fichier de connexion à la BDD
        include 'connectBdd.php';
        //function requête SQL
        include 'function.php';
        include 'menu.php';
        //test si $_GET['id'] existe
        if(isset($_GET['id']) AND $_GET['id'] !=''){
            //stocke $_GET['id'] dans une variable $value
            $value = $_GET['id'];
            //test le contenu des champs du formulaire
            if(isset($_POST['nom_util'])AND isset($_POST['prenom_util'])
            AND isset($_POST['mail_util'])
            AND isset($_POST['mdp_util'])
            AND $_POST['nom_util'] != "" AND $_POST['prenom_util'] !="" AND $_POST['mail_util'] !=""
            AND $_POST ['mdp_util'] !="" ){
                $nomUtil = $_POST['nom_util'];
                $prenomUtil = $_POST['prenom_util'];
                $mailUtil = $_POST['mail_util'];
                $mdpUtil = $_POST['mdp_util'];
                
                //appele la méthode updateProduit
                updateUtil($bdd,$nomUtil,$prenomUtil,$mailUtil,$mdpUtil,$value);
                //afficher un message de confirmation
                echo "<p>$nomUtil à été modifié en BDD</p>";
            }
            //test si les champs du formulaire ne sont pas remplis
            else{
                echo '<p>Veuillez remplir les champs du  formulaire</p>';
            }
        }
        //test si l'id n'existe pas 
        else{
            header('Location: showUtilisateur.php?error');
        }
    ?>
</body>
</html>