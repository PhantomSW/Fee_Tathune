<?php
$title = 'Inscription';
include('includes/head.php');
?>
  <body class="light-mode">
  <?php include('includes/header.php'); ?>
  <main class="connect">
    <h1>- Inscription -</h1>

    <?php
    if(isset($_GET['message']) && !empty($_GET['message'])){
        echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
    }
    ?>

    <div>
    <form method="POST" action="verif1.php" style="background-color:	#FFFAFA;" class="rounded">
      <label for="username" class="guide">Pseudo :</label>
      <input class="infos" type="text" id="username" name="username"><br>
      <label for="email" class="guide">Email :</label>
      <input class="infos" type="email" id="email" name="email"><br>
      <label for="password" class="guide">Mot de passe :</label>
      <input class="infos" type="password" id="password" name="password"><br>
      <label for="confirm-password" class="guide">Confirmez le mot de passe :</label>
      <input class="infos" type="password" id="confirm-password" name="confirm-password"><br>
      <input type="submit" value="Suivant"><br><br>
      <a href="connexion.php">Déjà membre ? Se connecter !<a>
    </form>
</div>
</main>
<p><br><br><br><p>
<?php include('includes/footer.php'); ?>
  </body>
</html>
