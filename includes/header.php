<header style="z-index: 5;">
  <nav class="navbar navbar-expand-lg navbar-dark" style="display: flex;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <img src="images/feetathunee.png" alt="logo" height="55px">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li><a href="index.php" title="Page principale">ACCUEIL</a></li>       
      <li><a href="investisseur.php" title="Nos investisseurs">TRADERS</a></li>        
      <li><a href="teacher.php" title="Nos professeurs">PROFESSEURS</a></li>         
      <?php 
        if(isset($_SESSION['code'])) {
            echo '<li><a href="admin_utilisateurs.php" title="Page d\'administrateur">ADMIN</a></li>';
            echo '<a href="javascript:void(0)" onclick="openNav()">Panel</a>';
            echo '<li><a href="action_deconnexion.php" title="Se déconnecter">DECONNEXION</a></li>';
        } else {
        if(isset($_SESSION['connect'])){
            echo '<li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                PROFIL
                </a>
                <div class="dropdown-menu border border-warning" aria-labelledby="" style="background-color: #181c2e;">
                    <a style="margin-left:25px;" class="" href="user_avatar.php">Avatar</a>
                    <a style="margin-left:25px;" class="" href="user_profil.php">Informations</a>
                    <a style="margin-left:25px;" class="" href="action_deconnexion.php">Déconnexion</a>
                </div>
                </li>';
        }else{
            echo '<li><a href="captcha/captcha.php" title="Se connecter">CONNEXION</a></li>';
            echo '<li><a href="inscription.php" title="S\'inscrire">INSCRIPTION</a></li>';
        }}
        ?>
        
    </ul>
  </div>
  <!-- <button onclick="myFunction()"><img src="images/darkmode.png" width="30px"></button> -->
  <button><a style="margin-left: 0px; padding: 3px;" href="?dark=1"><img src="images/darkmode.png" width="30px"></a></button>
</nav>
</header>

<?php 
    if(isset($_SESSION['code'])) {
        echo '<div id="sidenav" class="sidenav">
                <h1 style="color: #c4a112; font-size: 32px;"><br>ADMIN</h1><br>
                <a href="admin_utilisateurs.php">Utilisateurs</a>
                <a href="admin_intervenants.php">Intervenants</a>
                <a href="admin_banned_users.php">Ban</a>
                <a href="add_avatar.php">Avatar</a>
                <a href="admin_img_captcha.php">Captcha</a>
                <a href="admin_newsletter.php">Newsletter</a>
                <br><a href="javascript:void(0)" onclick="closeNav()">Close</a>
            </div>';
    }
?>
