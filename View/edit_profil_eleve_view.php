<?php
  	if(!isset($_COOKIE["eleve"]))
    {
        $msg ="unauthorized_user";
        header("location:./../../../login?error=" .$msg);
    }
?>
<?php
require_once("./../Model/BD_connexion.php");
require_once("./../Model/proposer_model.php");

$bd=connexion();
?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> Helpy </title>

     <link rel="stylesheet" href="./../../../View/assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="./../../../View/assets/css/normalize.css">
     <link rel="stylesheet" href="./../../../View/assets/css/header.css">
     <link rel="stylesheet" href="./../../../View/assets/css/connexion.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
   </head>
   <body>
     <header role = "header">
       <?php include("./../View/navBarEleve.php"); ?>
     </header>

     <?php if (isset($_GET["account"])){ ?>
       <div class="alert alert-danger">
       <strong> la date </strong> n'est pas autorisée.
       </div>
      <?php }?>

    <!-- edit  profil -->
    <div class="col-lg-8 col-sm-8 col-12 login-page">
        <div class="modal-content">

        <b><h3> Modifier profil élève:</h3></b>
        <form method="post" action="./../../Controller/edit_profil_eleve_Controller.php">
          <input name="mail" value="<?php echo $_POST["mail"]; ?>" hidden/>
          <label class="col-md-6 col-lg-6 control-label" for="blood_group"></label>
          <class="col-lg-6 col-md-6 form">
              <b>nom :</b>
              <input type="text" name="nom" class="form-control" value= "<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" required>
              <b>prénom :</b>
              <input type="text" name="prenom" class="form-control" value= "<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>" required>
              <b>téléphone :</b>
              <input type="number" name="tel" class="form-control" value= "<?php if (isset($_POST['tel'])){echo("0");echo $_POST['tel'];} ?>" required>
              <b>rue :</b>
              <input type="text" name="rue" class="form-control" value= "<?php if (isset($_POST['rue'])){echo $_POST['rue'];} ?>" required>
              <b>ville :</b>
              <input type="text" name="ville" class="form-control" value= "<?php if (isset($_POST['ville'])){echo $_POST['ville'];} ?>" required>
              <b>code postal :</b>
              <input type="number" name="CP" class="form-control" value= "<?php if (isset($_POST['CP'])){echo $_POST['CP'];} ?>" required>
            </class="col-lg-6 col-md-6 form">
              <div class="text-center">
                     <button type="submit" class="btn btn-labeled btn-success">
                     <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Valider</button>
              </div>
            </blockquote>
          </form>
        </div>
    </div>

      <!-- fin edit profil -->
    <script src="./View/assets/js/app.js" charset="utf-8"></script>
  </body>
</html>
