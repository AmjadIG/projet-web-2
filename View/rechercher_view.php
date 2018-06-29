<?php
  	if(!isset($_COOKIE["eleve"]))
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
      <?php include("./../View/navBarEleve.php"); ?>
    </header>

    <!-- Rechercher -->
    <h2>Rechercher un cours : </h2>
        <form action="./rechercher/resultats" method = 'post' >
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
          ville :
          <br>
          <input type="text" name="ville" class="form-control" required>
          <br>
          date du cours :
          <br>
          <input type="date" name="dateCours"  class="form-control" required>
          <br>
    		 <div class="col-md-12">
                <button type="submit" class="btn btn-labeled btn-success">
                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Rechercher</button>
    	   </div>
         </div>
        </form>
      <!-- fin Rechercher -->
    <script src="./View/assets/js/app.js" charset="utf-8"></script>
  </body>
</html>
