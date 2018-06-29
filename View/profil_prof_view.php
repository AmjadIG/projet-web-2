<?php
  	if(!isset($_COOKIE["prof"]))
    {
        $msg ="unauthorized_user";
        header("location:./../../login?error=" .$msg);
    }
?>
<?php
require_once("../Model/BD_connexion.php");
require_once("../Model/proposer_model.php");
$bd=connexion();
$prof = getProf($_COOKIE['prof']);
$id = $prof["idProf"];
$nom = $prof["nomProf"];
$prenom = $prof["prenomProf"];
$mail = $prof["mailProf"];
$tel = $prof["telProf"];
$rue = $prof["rueProf"];
$CP = $prof["codePostalProf"];
$ville = $prof["villeProf"];

 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> Helpy </title>
     <link rel="stylesheet" href="./../View/assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="./../View/assets/css/normalize.css">
     <link rel="stylesheet" href="./../View/assets/css/header.css">
     <link rel="stylesheet" href="./../View/assets/css/connexion.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
   </head>
   <body>
     <header role = "header">
       <?php include("./../View/navBarProf.php"); ?>
     </header>

    <!-- profil prof -->

    <div class="col-lg-8 col-sm-8 col-12 login-page">
        <div class="modal-content">
        <class="form">
        <b><h3> Mon profil professeur:</h3></b>
        <blockquote class="blockquote text-center">
          <b><p class="mb-0">nom :</b> <?php echo $nom; ?></p>
          <b><p class="mb-0">prénom :</b><?php echo $prenom; ?></p>
          <b><p class="mb-0">mail :</b><?php echo $mail; ?></p>
          <b><p class="mb-0">téléphone :</b> <?php echo("0");echo $tel; ?></p>
          <b><p class="mb-0">rue :</b> <?php echo $rue; ?></p>
          <b><p class="mb-0">ville :</b><?php echo $ville; ?></p>
          <b><p class="mb-0">code postal :</b><?php echo $CP; ?></p>
      </class="form">
        <form method="post" action="./../prof/profil/editer">
                <input name="nom" value="<?php echo $nom ?>" hidden/>
                <input name="prenom" value="<?php echo $prenom ?>"hidden/>
                <input name="mail" value="<?php echo $mail ?>"hidden/>
                <input name="tel" value="<?php echo $tel ?>"hidden/>
                <input name="rue" value="<?php echo $rue ?>"hidden/>
                <input name="ville" value="<?php echo $ville ?>"hidden/>
                <input name="CP" value="<?php echo $CP ?>"hidden/>
                <button type="submit" class="btn btn-warning">Modifier</button>
        </form>
        <br>
        <form method="post" action="./../../Controller/delete_prof_Controller.php">
          <input name="mail" value="<?php echo $mail ?>"hidden/>
          <button type="submit" class="btn btn-danger">supprimer</button>
          </blockquote>
      </div>
    </div>

      <!-- fin profil prof -->
    <script src="./View/assets/js/app.js" charset="utf-8"></script>
  </body>
</html>
