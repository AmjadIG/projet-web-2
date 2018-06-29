<?php
  	if(!isset($_COOKIE["eleve"]))
        {
            $msg ="unauthorized_user";
  		   		header("location:./../login?error=" .$msg);
        }
?>
<?php


require_once("../Model/BD_connexion.php");
require_once("../Model/proposer_model.php");
$bd=connexion();
$eleve = getEleve($_COOKIE['eleve']);
$id = $eleve["idEleve"];

$req = $bd->prepare('SELECT nomProf,prenomProf,mailProf,telProf,nomMatiere, c.* FROM cours AS c, matiere AS m, prof AS p WHERE c.idMatiere = m.idMatiere AND c.idProf = p.idProf
                                                                                                                            AND c.idEleve =:idEleve
                                                                                                                            ORDER BY debut ASC');
$req->bindParam(':idEleve', $id);
$req->execute();
$cours = $req->fetchAll();
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
      <?php include("./../View/navBarEleve.php"); ?>
    </header>

    <!-- Mescours -->
    <h2>Mes cours réservés :</h2>

    <?php if (isset($_GET["reservation"]))
    { ?>
      <div class="alert alert-success" role="alert">
    <strong> Cours réservé.</strong> vous avez désormais accès aux informations du professeur.
      </div>
     <?php }?>

     <?php if (isset($_GET["delete"]))
     { ?>
       <div class="alert alert-success" role="alert">
     <strong> Cours annulé.</strong> vous avez annulé votre réservation.
       </div>
      <?php }?>

      <div class="table-responsive">
          <table class="table table-bordered table-condensed table-striped bg-white">
          <thead>
              <tr>
                <th>Matiere</th>
                <th>Prix</th>
                <th>lieu</th>
                <th>ville</th>
                <th>date</th>
                <th>debut</th>
                <th>fin</th>
                <th>professeur</th>
                <th>mail</th>
                <th>telephone</th>
              </tr>
            </thead>
              <?php  foreach ($cours as $key):
                $idCours = $key['idCours'];?>
              <tr>
                <td><?php echo $key['nomMatiere'] ?></td>
                <td><?php echo $key['prix'] ?></td>
                <td><?php echo $key['lieu'] ?></td>
                <td><?php echo $key['ville'] ?></td>
                <td><?php echo $key['dateCours'] ?></td>
                <td><?php echo $key['debut'] ?></td>
                <td><?php echo $key['fin'] ?></td>
                <td><?php echo $key['nomProf']; echo(" "); echo $key['prenomProf']; ?></td>
                <td><?php echo $key['mailProf'] ?></td>
                <td><?php echo("0");echo $key['telProf']; ?></td>

                <td>
                  <form method="post" action="./../../Controller/update_reservation_Controller.php">
                    <input name="idCours" value="<?php echo $idCours ?>" hidden>
                    <button type="submit" name="button2id" class="btn btn-danger">Annuler</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
      </table>
     </div>
      <!-- fin MesCours -->
    <script src="./View/assets/js/app.js" charset="utf-8"></script>
  </body>
</html>
