<footer class="text-center text-lg-start bg-light text-muted">

<!--<div class="text-center p-1" style="background-color: #181c2e;"></div> C'est moyennement beau-->

  <section style="background-color:	#FFFAFA;">
    <div class="container text-center" style="background-color:	#FFFAFA;">
      <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
          <h6 class="text-uppercase fw-bold">Nous écrire</h6>
          <p>contact@fee-tathune.com</p>
          <p>+33 1 43 58 12 96</p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
          <h6 class="text-uppercase fw-bold">Adresse</h6>
          <p>70 Avenue St Antoine</p>
          <p>75011, Paris</p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0">
          <h6 class="text-uppercase fw-bold">Session</h6>

        <?php if(isset($_SESSION['code'])) {
          echo '<a href="admin_utilisateurs.php" style="text-decoration:none; color:#212529BF;">Administrateur</a>';
        } else { if(isset($_SESSION['connect'])) {
          echo '<a href="index.php" style="text-decoration:none; color:#212529BF;">Client</a><br>';
          } else {
            echo '<a href="captcha/captcha.php" style="text-decoration:none; color:#212529BF;">Client</a><br>
            <a href="admin_connexion.php" style="text-decoration:none; color:#212529BF;">Administrateur</a>';
          }
        }
?>

        </div>
      </div>
    </div>
  </section>

  <div class="text-center p-4" style="background-color: #181c2e;">
    <p style="color: rgb(240, 232, 232);">© 2023 Copyright : Fée Tathune & cie</p>
  </div>
</footer>