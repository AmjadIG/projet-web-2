<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Helpy </title>
    <link rel="stylesheet" href="./View/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./View/assets/css/normalize.css">
    <link rel="stylesheet" href="./View/assets/css/header.css">
    <link rel="stylesheet" href="./View/assets/css/connexion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
    <header role = "header">

  <?php
      include($_SERVER['DOCUMENT_ROOT'].'/View/navBarConnexion.php');
      //include(".projet-web/View/navBarConnexion.php");
      ?>

    </header>
      <!-- login -->
    <div class="col-lg-8 col-sm-8 col-12 login-page">
      <div class="form">

        <!--  l'utilisateur a tenté de se connecter avec un mauvais mail ou mdp-->
        <?php if (isset($_GET["account"])){ ?>
          <div class="alert alert-danger">
          <strong> les informations entrées sont incorrectes. </strong>
          </div>
         <?php }?>

         <!--  l'utilisateur s'est deconnecte-->
         <?php if (isset($_GET["disconnection"])){ ?>
           <div class="alert alert-success" role="alert">
             <strong> déconnexion réussie </strong><br> Nous ésperons vous revoir trés bientot.
             </div>
          <?php }?>

          <!-- l'utilisateur a essayé d'accéder inacessible pour lui -->
         <?php if (isset($_GET["error"])){ ?>
           <div class="alert alert-danger">
           <strong> accès refusé  </strong><br> Veuillez vous identifier pour accéder à la page.
           </div>
          <?php }?>

          <!--  l'utilisateur a supprimé son compte-->
          <?php if (isset($_GET["deleteUser"])){ ?>
            <div class="alert alert-success" role="alert">
              <strong>Compte supprimé. </strong>
              </div>
          <?php }?>

        <form class="register-form" method="post" action="./Controller/inscription_Controller.php">
          <h2> inscrivez-vous : </h2>
          <input type="text" placeholder="Nom" name="nom" required />
          <input type="text" placeholder="Prénom" name="prenom" required/>
          <input type="password" placeholder="mot de passe" name="mdp" required/>
          <input type="text" placeholder="Rue" name="rue" required/>
          <input type="number" placeholder="Code Postal" name="postal" required/>
          <input type="text" placeholder="Ville" name="ville" required/>
          <input type="email" placeholder="email" name="email" required/>
          <input type="number" placeholder="Numéro de téléphone" name="numero" required/>
          <legend> inscription en tant que :</legend>
          professeur :
          <input type="radio" name="gender" value="professeur" checked><br>
          élève :
          <input type="radio" name="gender" value="eleve">
          <button type="submit">create</button>
          <p class="message">Already registered? <a>Sign In</a></p>
        </form>

        <form class="login-form" method="post" action="./Controller/connexion_Controller.php">
          <h2> connectez-vous : </h2>
          <input type="text" placeholder="email" name="email"/>
          <input type="password" placeholder="mot de passe" name="mdp"/>
          <button>login</button>
          <p class="message">Not registered? <a>Create an account</a></p>
        </form>
      </div>
    </div>
      <!-- fin login -->
    <script src="./View/assets/js/app.js" charset="utf-8"></script>
  </body>
</html>
