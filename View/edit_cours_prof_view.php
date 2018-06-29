<?php
  	if(!isset($_COOKIE["prof"]))
    {
        $msg ="unauthorized_user";
        header("location:./../../../login?error=" .$msg);
    }
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Helpy </title>
    <link rel="stylesheet" href="./../../../View/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../../View/assets/css/normalize.css">
    <link rel="stylesheet" href="./../../../View/assets/css/header.css">
    <link rel="stylesheet" href="./../../../View/assets/css/connexion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
    <header role = "header">
      <?php include("./../View/navBarProf.php"); ?>
    </header>
    <!-- fin header -->

    <!-- Modifier -->
    <h2> Modifier un cours :</h2>



    <?php if (isset($_GET["edit"]))
        { ?>
        <p class="center-align red"><?php
        // On affiche donc le contenu du message d'erreur sur la page pour avertir l'utilisateur de son erreur
        echo $_GET["edit"];?></p>
     <?php }?>

    <form method="post" action="./../../../Controller/edit_cours_prof_Controller.php">
      <input name="idCours" value="<?php echo $_POST["idCours"]; ?>" hidden/>
      <label class="col-md-4 control-label" for="blood_group"></label>
      <div class="col-md-4">
      <?php
      $nomMatiere = htmlentities($_POST["nomMatiere"]);
      $niveau = htmlentities($_POST["niveau"]);
      $lieu = htmlentities($_POST["lieu"]);
       ?>

        <br>
        matiere :
      <select  id="blood_group" name="matiere" class="form-control" value="<?php if (isset($_POST['nomMatiere'])){echo $_POST['nomMatiere'];}?>"  required>
          <?php //pas besoin pour le premier selectionné de base ?>
          <OPTION>mathématique</OPTION>
          <OPTION <?php if($nomMatiere == 'physique chimie') {echo "selected";} ?>>physique chimie</OPTION>
          <OPTION <?php if($nomMatiere == 'SVT')      {echo "selected";} ?>>SVT</OPTION>
          <OPTION <?php if($nomMatiere == 'français') {echo "selected";} ?>>français</OPTION>
          <OPTION <?php if($nomMatiere == 'anglais')  {echo "selected";} ?>>anglais</OPTION>
          <OPTION <?php if($nomMatiere == 'espagnol') {echo "selected";} ?>>espagnol</OPTION>
          <OPTION <?php if($nomMatiere == 'allemand') {echo "selected";} ?>>allemand</OPTION>
          <OPTION <?php if($nomMatiere == 'histoire') {echo "selected";} ?>>histoire</OPTION>
          <OPTION <?php if($nomMatiere == 'musique')  {echo "selected";} ?>>musique</OPTION>
      </SELECT>
      <br>
      classe :
        <select id="blood_group" name="niveau" class="form-control" value="<?php if (isset($_POST['niveau'])){echo $_POST['niveau'];}?>" required>
          <OPTION>lycée</OPTION>
          <OPTION <?php if($niveau == 'primaire') {echo "selected";} ?>>primaire</OPTION>
          <OPTION <?php if($niveau == 'college') {echo "selected";} ?>>college</OPTION>
      </SELECT>
      <br>
      lieu :
      <SELECT id="blood_group" name="lieu" class="form-control" required>
      <OPTION>chez l'élève </OPTION>
      <OPTION <?php if($lieu == 'chez le professeur') {echo "selected";} ?>>chez le professeur </OPTION>
      <OPTION <?php if($lieu == 'peu importe') {echo "selected";}?>>peu importe</OPTION>

      </SELECT>
      <br>
      ville :
      <input type="text" name="ville" class="form-control" value= "<?php if (isset($_POST['ville'])){echo $_POST['ville'];} ?>" required>
      <br>
      date du cours :
      <input type="date" name="dateCours"  class="form-control" value="<?php if (isset($_POST['dateCours'])){echo $_POST['dateCours'];}?>" required>
      <br>
      debut cours :
      <input type="time" name="debut" class="form-control" value="<?php if (isset($_POST['debut'])){echo $_POST['debut'];}?>" required>
      <br>
      fin cours :
      <input type="time" name="fin" class="form-control" value="<?php if (isset($_POST['fin'])){echo $_POST['fin'];}?>" required>
      <br>
      Prix :
      <input type="number" name="prix" class="form-control" value="<?php if (isset($_POST['prix'])){echo $_POST['prix'];}?>" required>
      <br>
      <div class="col-md-12">
             <button type="submit" class="btn btn-labeled btn-success">
             <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Valider</button>
      </div>
    </div>
    </form>

      <!-- fin Modifier -->
    <script src="./View/assets/js/app.js" charset="utf-8"></script>
  </body>
</html>
