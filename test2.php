<?php
if (mail('antoinefoch@hotmail.fr', $adresse_email.' - '.$prenom, $message))
    echo "C est bon !";
else
    echo "Pas cool";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>Contact</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" media="screen" type="text/css" title="css neutre" href="stylesheets/index.css" />
        <style type="text/css">
            label {
            display:block;
            width:150px;
            float:left;
            }
        </style>
    </head>
    <body>

        <div id="en_tete">
        <!-- Laisser un espace vide, le CSS fait tout le boulot -->
        </div>
 
        <div id="menu">
        <?php include("div/menu_principal.html"); ?>
        </div>
  
        <div id="corps">
        <?php
        if (isset($_POST['mail']) && isset($_POST['prenom']) && isset($_POST['message'])) {
            if (!empty($_POST['mail']) && !empty($_POST['prenom']) && !empty($_POST['message'])) {
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
                $mail = $_POST['mail'];
                $prenom = $_POST['prenom'];
                $message = htmlspecialchars($_POST['message']);
                if(mail('antoinefoch@hotmail.fr', $prenom.' - '.$mail, $message))
                                    echo "<p style='color:green'>Votre message a été envoyé. Merci !</p>";
                                else
                                    echo "<p style='color:red'>Votre message n'a pu être envoyé. Veuillez nous excuser pour la gêne occasionnée.</p>";
            } else {
                echo "<p style='color:red'>L'adresse email saisie n'est pas valide.</p>";
            }
            } else if(empty($_POST['mail']) || empty($_POST['prenom']) || empty($_POST['message'])) {
                echo "<p style='color:red'>Veuillez remplir tous les champs.</p>";
            }
        }
             
            ?>
            <h1>Nous contacter</h1>
            <h4>Remplissez ce formulaire si vous désirez nous contacter.</h4>
            <form method="post">
            <label for="mail">Votre adresse e-mail : </label><input type="text" name="mail" id="mail" /><br />
            <label for="prenom">Votre prénom : </label><input type="text" name="prenom" id="prenom" /><br />
            <label for="message">Votre message : </label><textarea name="message" id="message"></textarea><br />
            <input type="submit" value="Envoyer" />
            </form>
        </div>
  
        <div id="pied_de_page">
        <?php include("div/pied_de_page.html"); ?>
        </div>
    </body>
</html>