<header>
	<!--<div class="container">
    	<img src="images/feetathunee.png" alt="logo" height="55px">
        <nav class="navbar navbar-expand-lg">
            <ul>
                <li>
                    <a href="index.php" title="Page principale">Accueil</a>
                </li>
                <li>
                    <a href="" title="Espace investisseurs">TRADER</a>
                </li>
                <li>
                    <a href="teacher.php" title="Espace professeurs">TEACHER</a>
                </li>
         
            </ul>
        </nav>
        
    </div>-->

  <nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color:rgb(240, 232, 232);">
    <span class="navbar-toggler-icon"></span>
  </button>
  <img src="images/feetathunee.png" alt="logo" height="55px">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!--<li><p style="color:red"> -------- </p></li>
      <li><img src="images/feetathunee.png" alt="logo" height="55px"></li>-->
      <li><a href="index.php">ACCEUIL</a></li>       
      <li><a href="#">TRADERS</a></li>        
      <li><a href="teacher.php">PROFESSEURS</a></li>         
      <?php 
        if(isset($_SESSION['code'])) {
            echo '<li><a href="admin.php" title="Page d\'administrateur">ADMIN</a></li>';
            echo '<a href="javascript:void(0)" onclick="openNav()">Panel</a>';
            echo '<li><a href="deconnexion.php" title="Se déconnecter">DECONNEXION</a></li>';
        } else {
        if(isset($_SESSION['email'])){
            echo '<li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                PROFIL
                </a>
                <div class="dropdown-menu border border-warning" aria-labelledby="" style="background-color: #181c2e;">
                    <a style="margin-left:25px;" class="" href="#">Portefeuille</a>
                    <a style="margin-left:25px;" class="" href="#">Avatar</a>
                    <a style="margin-left:25px;" class="" href="#">Informations</a>
                    <a style="margin-left:25px;" class="" href="deconnexion.php">Déconnexion</a>
                </div>
                </li>';
        }else{
            echo '<li><a href="connexion.php" title="Se connecter">CONNEXION</a></li>';
            echo '<li><a href="inscription.php" title="S\'inscrire">INSCRIPTION</a></li>';
        }}
        ?>
        
    </ul>
  </div><button onclick="myFunction()"><img src="images/darkmode.png" width="30px"></button>
</nav>
</header>
<?php 
    if(isset($_SESSION['code'])) {
        echo '<div id="sidenav" class="sidenav">
                <h1 style="color: #c4a112;"><br>ADMIN</h1><br>
                <a href="#">Comptes</a>
                <a href="#">Investisseurs</a>
                <a href="#">Professeurs</a>
                <a href="#">Option..</a>
                <br><a href="javascript:void(0)" onclick="closeNav()">Close</a>
            </div>';
    }
?>
