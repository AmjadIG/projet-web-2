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
    <title> Helpy </title>
    <link rel="stylesheet" href="./../../View/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../View/assets/css/normalize.css">
    <link rel="stylesheet" href="./../../View/assets/css/header.css">
    <link rel="stylesheet" href="./../../View/assets/css/connexion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
    <header role = "header">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/View/navBarProf.php'); ?>
    </header>

    <!-- proposer -->
    <h2>proposer un cours :</h2>
  <form method = 'post' action="./../../Controller/proposer_Controller.php">
    <label class="col-md-4 control-label" for="blood_group"></label>
    <div class="col-md-4">
      <br>
      matiere :
      <select id="blood_group" name="matiere" class="form-control" required>
        <OPTION>mathématique
        <OPTION>physique chimie
        <OPTION>SVT
        <OPTION>français
        <OPTION>anglais
        <OPTION>espagnol
        <OPTION>allemand
        <OPTION>histoire
        <OPTION>musique
    </SELECT>
    <br>
    classe :
      <select id="blood_group" name="niveau" class="form-control" required>
        <OPTION>primaire
        <OPTION>college
        <OPTION>lycée
    </SELECT>
    <br>
    lieu :
    <SELECT id="blood_group" name="lieu" class="form-control" required>
    <OPTION>peu importe
    <OPTION>chez le professeur
    <OPTION>chez l'élève
    </SELECT>
    <br>
    ville :
    <input type="text" name="ville" class="form-control" required>
    <br>
    date du cours :
    <input type="date" name="dateCours"  class="form-control" required>
    <br>
    debut cours :
    <input type="time" name="debut" class="form-control">
    <br>
    fin cours :
    <input type="time" name="fin" class="form-control">
    <br>
    Prix :
    <input type="number" name="prix" class="form-control" required>
    <br>
    <div class="col-md-12">
           <button type="submit" class="btn btn-labeled btn-success">
           <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Proposer</button>
    </div>
  </div>
  </form>

      <!-- fin proposer -->
    <script src="./View/assets/js/app.js" charset="utf-8"></script>
  </body>
</html>
