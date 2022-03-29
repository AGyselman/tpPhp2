<?php
    //requête ajouter un produit :
    function insertUtil($bdd,$nomUtil,$prenomUtil,$mailUtil,$mdpUtil){
        try{
            $req = $bdd->prepare('INSERT INTO utilisateur(nom_util,prenom_util,mail_util,mdp_util) 
            VALUES(:nom_util, :prenom_util, :mail_util, :mdp_util)');
            $req->execute(array(
                'nom_util' => $nomUtil,
                'prenom_util' =>$prenomUtil,
                'mail_util' =>$mailUtil,
                'mdp_util' =>$mdpUtil
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    function showAllUsers($bdd){
        try{
            $req = $bdd->prepare('SELECT * FROM utilisateur');
            $req->execute();
            while ($data = $req->fetch()){
                $id= $data['id_util'];
                $nameUtil = $data['nom_util'];
                $prenomUtil = $data['prenom_util'];
                $mailUtil = $data['mail_util'];
                $mdpUtil = $data['mdp_util'];
                $imgUtil = $data['img_util'];
                echo '<p><input type="checkbox" name="id_util[]" value="'.$id.'">
                <a href="updateUtilisateur.php?id='.$id.'">'.$nameUtil.' '.$prenomUtil.' </a></p>';
            }
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    function updateUtil($bdd,$nomUtil,$prenomUtil,$mailUtil,$mdpUtil,$value){
        try{
            $req = $bdd->prepare('UPDATE utilisateur SET nom_util = :nom_util,
            prenom_util = :prenom_util, mail_util = :mail_util, mdp_util = :mdp_util
            WHERE id_util = :id_util');
            $req->execute(array(
                'id_util' => $value,
                'nom_util' => $nomUtil,
                'prenom_util' => $prenomUtil,
                'mail_util' => $mailUtil,
                'mdp_util' => $mdpUtil
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
?>