<?php
$title = 'Connexion';
include('includes/head.php');
?>
	<body class="light-mode">
		<?php include('includes/header.php'); ?>
        
  <section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <!--<div class="col-xl-10">-->
        <!--<div class="card rounded-3 text-black">-->
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <!--<img src="images/logo.png"
                    style="width: 185px;" alt="logo">-->
                  <h1 style="color:#c4a112;">Se connecter</h1>
                  <?php include('includes/message.php'); ?>
                </div>
                
                <form method="POST" action="verification.php" style="background-color: #FFFAFA;" class="rounded">
                
                  <div class="form-outline mb-4">
                    <label class="form-label guide" for="email">Email :</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label guide" for="form2Example22">Mot de passe :</label>   
                    <input type="password" id="password" class="form-control" name="pwd"/>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input type="submit" value="Connexion">
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2" style="color:black;">Pas de compte ? S'inscrire !</p>
                    <a href="inscription.php"><button type="button" class="btn btn-outline-danger">S'inscrire</button></a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Le saviez-vous ?</h4>
                <p class="small mb-0">
                <?php include('includes/diduknow.php'); ?>
                </p>
              </div>
            </div>
          <!--</div>-->
        <!--</div>-->
      </div>
    </div>
  </div>
</section>

<?php include('includes/footer.php'); ?>
	</body>
</html>