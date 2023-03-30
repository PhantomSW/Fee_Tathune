<?php
$title = 'Inscription';
include('includes/head.php');
?>
  <body class="light-mode">
  <?php include('includes/header.php'); ?>
  <main class="connect">
    <h1>- Inscription -</h1>

    <?php include('includes/message.php'); ?>

    <div>
    <form method="POST" action="verif2.php" style="background-color:	#FFFAFA;" class="rounded">
    <label for="firstname" class="guide">Prénom :</label>
      <input class="infos" type="text" id="firstname" name="firstname"><br>
      <label for="name" class="guide">Nom :</label>
      <input class="infos" type="text" id="name" name="name"><br>
      <label for="phone" class="guide">Numéro de téléphone :</label>
      <input class="infos" type="number" id="phone" name="phone"><br>
      <label for="address" class="guide">Adresse :</label>
      <input class="infos" type="text" id="address" name="address"><br>
      <label for="gender" class="guide">Genre :</label>
      <input class="infos" type="text" id="gender" name="gender"><br>
      <label for="age" class="guide">Age :</label>
      <input class="infos" type="number" id="age" name="age"><br>
      <input type="submit" value="S'inscrire"><br><br>
    </form>
</div>
</main>
<p><br><br><br><br><p>
<?php include('includes/footer.php'); ?>
  </body>
</html>