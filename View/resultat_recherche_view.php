
<?php
  	if(!isset($_COOKIE["eleve"]))
    {
        $msg ="unauthorized_user";
        header("location:./../../../../login?error=" .$msg);
    }
?>
<?php
require_once("../Model/BD_connexion.php");
require_once("../Model/rechercher_model.php");
require_once("../Controller/rechercher_Controller.php");

 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> Helpy </title>

     <link rel="stylesheet" href="./../../../../../View/assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="./../../../../../View/assets/css/normalize.css">
     <link rel="stylesheet" href="./../../../../../View/assets/css/header.css">
     <link rel="stylesheet" href="./../../../../../View/assets/css/connexion.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
   </head>
   <body>
     <header role = "header">
       <?php include("./../View/navBarEleve.php"); ?>
     </header>

    <!-- resultats -->
    <h2> résultat de la recherche :</h2>

    <?php if (isset($_GET["add"]))
    { ?>
    <p class="center-align red"><?php
    echo $_GET["add"];?></p>
     <?php }?>

     <div class="table-responsive">
         <table class="table table-bordered table-condensed table-striped bg-white">
           <thead>
             <tr>
              <th>Matiere</th>
              <th>Prix</th>
              <th>lieu</th>
              <th>ville</th>
              <th>debut</th>
              <th>fin</th>
              <th>action</th>
            </tr>
            <?php  foreach ($cours as $key):?>
             <tr>
                <td><?php echo $key['nomMatiere'] ?></td>
                <td><?php echo $key['prix'] ?></td>
                <td><?php echo $key['lieu'] ?></td>
                <td><?php echo $key['ville'] ?></td>
                <td><?php echo $key['debut'] ?></td>
                <td><?php echo $key['fin'] ?></td>
                <td>
                  <form method="post" action="./../../../../Controller/reserver_cours_Controller.php">
                    <input name="idCours" value="<?php echo $key['idCours'] ?>" hidden>
                    <button type="submit" class="btn btn-labeled btn-success">
                    <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Reserver ce cours</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      <!-- fin resultats -->
    <script src="./View/assets/js/app.js" charset="utf-8"></script>
  </body>
</html>
