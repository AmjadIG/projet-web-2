<?php
  	if(!isset($_COOKIE["prof"]))
    {
        $msg ="unauthorized_user";
        header("location:./../login?error=" .$msg);
    }
?>

<?php
require_once("./../Model/BD_connexion.php");
require_once("./../Model/proposer_model.php");

$bd=connexion();
$prof = getProf($_COOKIE['prof']);
$id = $prof["idProf"];
$req = $bd->prepare('SELECT n.niveau, nomMatiere, c.* FROM cours AS c, matiere AS m,niveau as n WHERE c.idMatiere = m.idMatiere and c.idNiveau = n.idNiveau and c.idProf =:idProf
                                                                                                ORDER BY dateCours ASC');
$req->bindParam(':idProf', $id);
$req->execute();
$cours = $req->fetchAll();

$req2 = $bd->prepare('SELECT n.niveau, nomMatiere, c.*,e.* FROM cours AS c, matiere AS m,niveau as n, eleve as e WHERE e.idEleve = c.idEleve and c.idMatiere = m.idMatiere
                                                                                                                      and c.idNiveau = n.idNiveau and c.idProf =:idProf
                                                                                                                      ORDER BY dateCours ASC');
$req2->bindParam(':idProf', $id);
$req2->execute();
$reserv = $req2->fetchAll();
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

    <!-- cours prof -->
    <?php if (isset($_GET["date"])){ ?>
      <div class="alert alert-danger">
      <strong> la date </strong> n'est pas autorisée.
      </div>
     <?php }?>

    <?php if (isset($_GET["edit"]))
    { ?>
      <div class="alert alert-success" role="alert">
    <strong> Modification réussie </strong> le cours est maintenant visible par les élèves.
      </div>
     <?php }?>

     <?php if (isset($_GET["errorsuppr"]))
     { ?>
    <div class="alert alert-danger">
    <strong>Erreur!</strong> Le cours est réservé par un élève vous ne pouvez pas le modifier ou le supprimer.
    </div>
      <?php }?>
    <!-- proposer -->
    <h4><strong>Mes cours proposés :</strong></h4>

    <?php if (isset($_GET["supprcours"]))
    { ?>
      <div class="alert alert-success" role="alert">
    <strong> Suppression réussie </strong> le cours n'est plus disponible pour les élèves.
      </div>
     <?php }?>

    <?php if (isset($_GET["add"]))
    { ?>
      <div class="alert alert-success" role="alert">
    <strong> Ajout réussi </strong> le cours est maintenant visible par les élèves.
      </div>
     <?php }?>

     <?php if (isset($_GET["fail"]))
     { ?>
       <div class="alert alert-danger">
       <strong>Erreur!</strong> Le cours n'a pas pu être ajouté.
       </div>
      <?php }?>


      <div class="table-responsive">
          <table class="table table-bordered table-condensed table-striped bg-white">
             <thead>
                <tr>
                  <th>Matiere</th>
                  <th>Niveau</th>
                  <th>Prix</th>
                  <th>lieu</th>
                  <th>ville</th>
                  <th>date</th>
                  <th>debut</th>
                  <th>fin</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php  foreach ($cours as $key):
                  $idCours = $key['idCours'];
                  $nomMatiere = $key['nomMatiere'];
                  $niveau = $key['niveau'];
                  $prix= $key['prix'];
                  $lieu= $key['lieu'];
                  $ville = $key['ville'];
                  $dateCours = $key['dateCours'];
                  $debut= $key['debut'];
                  $fin =  $key['fin'];
                  ?>
                <tr>
                  <td><?php echo $key['nomMatiere'] ?></td>
                  <td><?php echo $key['niveau'] ?></td>
                  <td><?php echo $key['prix'] ?></td>
                  <td><?php echo $key['lieu'] ?></td>
                  <td><?php echo $key['ville'] ?></td>
                  <td><?php echo $key['dateCours'] ?></td>
                  <td><?php echo $key['debut'] ?></td>
                  <td><?php echo $key['fin'] ?></td>
                  <td>
                    <form method="post" action="./cours/editer">
                      <input name="idCours" value="<?php echo $idCours ?>" hidden/>
                      <input name="nomMatiere" value="<?php echo $nomMatiere ?>"hidden/>
                      <input name="niveau" value="<?php echo $niveau ?>"hidden/>
                      <input name="prix" value="<?php echo $prix ?>"hidden/>
                      <input name="ville" value="<?php echo $ville ?>"hidden/>
                      <input name="lieu" value="<?php echo $lieu ?>"hidden/>
                      <input name="dateCours" value="<?php echo $dateCours ?>"hidden/>
                      <input name="debut" value="<?php echo $debut ?>"hidden/>
                      <input name="fin" value="<?php echo $fin ?>"hidden/>
                      <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                    <form method="post" action="./../../Controller/delete_cours_prof_Controller.php">
                        <input name="idCours" value="<?php echo $idCours ?>" hidden/>
                        <button type="submit" name="button2id" class="btn btn-danger">Supprimer</button>
                    </form>
                  </td>
                </tr>

              <?php endforeach; ?>
            </tbody>
            </table>
          </div>

     <h4><strong> Mes cours réservés par un élève :</strong></h4>

     <div class="table-responsive">
         <table class="table table-bordered  table-condensed table-striped bg-white">
           <thead>
             <tr>
               <th>Matiere</th>
               <th>Niveau</th>
               <th>Prix</th>
               <th>lieu</th>
               <th>ville</th>
               <th>date</th>
               <th>debut</th>
               <th>fin</th>
               <th>eleve</th>
               <th>telephone</th>
               <th>mail</th>
             </tr>
           </thead>
           <tbody>
              <?php  foreach ($reserv as $key):?>
                <tr>
                  <td><?php echo $key['nomMatiere'] ?></td>
                  <td><?php echo $key['niveau'] ?></td>
                  <td><?php echo $key['prix'] ?></td>
                  <td><?php echo $key['lieu'] ?></td>
                  <td><?php echo $key['ville'] ?></td>
                  <td><?php echo $key['dateCours'] ?></td>
                  <td><?php echo $key['debut'] ?></td>
                  <td><?php echo $key['fin'] ?></td>
                  <td><?php echo $key['nomEleve']; echo(" "); echo $key['prenomEleve']; ?></td>
                  <td><?php echo("0");echo $key['telEleve']; ?></td>
                  <td><?php echo $key['mailEleve'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            </table>
          </div>

      <!-- fin cours prof -->
    <script src="./View/assets/js/app.js" charset="utf-8"></script>
  </body>
</html>
