<?php

require_once 'config/framework.php';
require_once 'config/connect.php';

if (!isset($_SESSION['user'])) {
    redirectToRoute();
}


dump($_SESSION['user']);
echo 'bonjour '.$_SESSION['user']['pseudo'];


    /*************************
    *  Page: espace-membre.php
    *  Page encodée en UTF-8
    **************************/
session_start();
if(!isset($_SESSION['pseudo'])){
    header("Refresh: 5; url=login.php");
    echo "Vous devez vous connecter pour accéder à l'espace membre.<br><br><i>Redirection en cours, vers la page de connexion...</i>";
    exit(0);
}
$Pseudo=$_SESSION['pseudo']; 

$mysqli=mysqli_connect('localhost','root','','portfolio');
if(!$mysqli) {
    echo "Erreur connexion à la base de donnée";
    exit(0);
}


$req=mysqli_query($mysqli,"SELECT * FROM users WHERE pseudo='$Pseudo'");
$info=mysqli_fetch_assoc($req);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Espace Membre</title>
    </head>
    <body>
        <h1>Espace membre</h1>
        Pour modifier vos informations, <a href="compte.php?modifier">Cliquez ici</a>
        <br>
        Pour supprimer votre compte, <a href="espace-membre.php?supprimer">Cliquez ici</a>
        <br>
        Pour vous déconnecter, <a href="deConnexion.php">Cliquez ici</a>
        <hr/>
        <?php
       
        if(isset($_GET['supprimer'])){
            if($_GET['supprimer']!="ok"){
                echo "<p>Êtes-vous sûr de vouloir supprimer votre compte définitivement?</p>
                <br>
                <a href='compte.php?supprimer=ok' style='color:red'>OUI</a> - <a href='compte.php' style='color:green'>NON</a>";
            } else {
                
                if(mysqli_query($mysqli,"DELETE FROM users WHERE pseudo='$Pseudo'")){
                    echo "Votre compte vient d'être supprimé définitivement.";
                    unset($_SESSION['pseudo']);
                } else {
                    echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                   
                }
            }
        }
       
        if(isset($_GET['modifier'])){
            ?>
            <h1>Modification du compte</h1>

            Choisissez une option: 
            <p>
                <a href="espace-membre.php?modifier=mail">Modifier l'adresse mail</a>
                <br>
                <a href="espace-membre.php?modifier=mdp">Modifier le mot de passe</a>
            </p>
            <hr/>
            <?php
            if($_GET['modifier']=="email"){
                echo "<p>Renseignez le formulaire ci-dessous pour modifier vos informations:</p>";
                if(isset($_POST['valider'])){
                    if(!isset($_POST['email'])){
                        echo "Le champ mail n'est pas reconnu.";
                    } else {
                        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['email'])){
                           
                            echo "L'adresse mail est incorrecte.";
                           
                        } else {
                            
                            if(mysqli_query($mysqli,"UPDATE users SET mail='".htmlentities($_POST['email'],ENT_QUOTES,"UTF-8")."' WHERE pseudo='$Pseudo'")){
                                echo "Adresse mail {$_POST['email']} modifiée avec succès!";
                                $TraitementFini=true;//pour cacher le formulaire
                            } else {
                                echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                               
                            }
                        }
                    }
                }
                if(!isset($TraitementFini)){
                    ?>
                    <br>
                    <form method="post" action="compte.php?modifier=mail">
                        <input type="email" name="mail" value="<?php echo $info['email']; ?>" required>
                        <input type="submit" name="valider" value="Valider la modification">
                    </form>
                    <?php
                }
            } elseif($_GET['modifier']=="mdp"){
                echo "<p>Renseignez le formulaire ci-dessous pour modifier vos informations:</p>";
                
                if(isset($_POST['valider'])){
                    
                    if(!isset($_POST['nouveau_mdp'],$_POST['confirmer_mdp'],$_POST['mdp'])){
                        echo "Un des champs n'est pas reconnu.";
                    } else {
                        if($_POST['nouveau_mdp']!=$_POST['confirmer_mdp']){
                            echo "Les mots de passe ne correspondent pas.";
                        } else {
                            $Mdp=md5($_POST['mdp']);
                            $NouveauMdp=md5($_POST['nouveau_mdp']);
                            $req=mysqli_query($mysqli,"SELECT * FROM users WHERE pseudo='$Pseudo' AND mdp='$Mdp'");
                            //on regarde si le mot de passe correspond à son compte:
                            if(mysqli_num_rows($req)!=1){
                                echo "Mot de passe actuel incorrect.";
                            } else {
                                //tout est OK, on met à jours son compte dans la base de données:
                                if(mysqli_query($mysqli,"UPDATE users SET mdp='$NouveauMdp' WHERE pseudo='$Pseudo'")){
                                    echo "Mot de passe modifié avec succès!";
                                    $TraitementFini=true;
                                } else {
                                    echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                    
                                }
                            }
                        }
                    }
                }
                if(!isset($TraitementFini)){
                    ?>
                    <br>
                    <form method="post" action="compte.php?modifier=mdp">
                        <input type="password" name="nouveau_mdp" placeholder="Nouveau mot de passe..." required>
                        <input type="password" name="confirmer_mdp" placeholder="Confirmer nouveau passe..." required>
                        <input type="password" name="password1" placeholder="Votre mot de passe actuel..." required>
                        <input type="submit" name="valider" value="Valider la modification">
                    </form>
                    <?php
                }
            }
        }
        ?>
    </body>
</html>


