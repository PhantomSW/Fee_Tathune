<?php
$title = 'Connexion';
include('includes/head.php');
?>
	<body class="light-mode">
		<?php include('includes/header.php'); ?>

		<main class="connect">
		<script src="includes/script.js"></script>
			<h1>- Connexion -</h1>
			<?php 
			if(isset($_GET['message']) && !empty($_GET['message'])){
				echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
			}
			?>
			<div>
			<form method="POST" action="verification.php" style="background-color:	#FFFAFA;" class="rounded">
				<label for="email" class="guide">Email :</label>
				<input class="infos" value="<?= isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>" id="email" type="email" name="email"><br><br>
				<label for="password" class="guide">Mot de passe :</label>
				<input class="infos" id="password" type="password" name="pwd"><br>
				<input type="submit" value="Connexion"><br><br>
				<a href="inscription.php">Pas de compte ? S'inscrire !<a><br>
			</form>
		</div>
		</main>
		<p><br><br><br><br><p>
		<?php include('includes/footer.php'); ?>
	</body>
</html>