<?php 

// Fonction d'écriture dans le fichier log
function writeLogLine($success, $email){
	// Ouverture du fichier (création si besoin)
	$log = fopen('log.txt', 'a+');

	// Concaténation de la ligne à ajouter
	$line = date('Y/m/d - H:i:s') . ' - Tentative de connexion ' . ($success ? 'réussie' : 'échouée') . ' de : ' . $email . "\n";

	// Ajout de la ligne au flux
	fputs($log, $line);

	// Fermeture du flux
	fclose($log);
}


// ajout de l'email envoyé à un cookie
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 3600);
}

// Vérification du formulaire

// Si un des champs vides alors redirection vers le formulaire
if( !isset($_POST['email']) 
	|| !isset($_POST['pwd'])
	|| empty($_POST['email'])
	|| empty($_POST['pwd'])
){
		// redirection avec un message d'erreur
		$msg = 'Vous devez remplir les 2 champs.';
		header('location: connexion.php?message=' . $msg);
		exit();
}


// Si l'email est invalide alors redirection

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	// redirection avec un message d'erreur
	$msg = 'Email invalide.';
	header('location: connexion.php?message=' . $msg);
	exit();
}

// Connexion à la bdd
include('includes/bdd.php');

$q = 'SELECT user_id FROM UTILISATEUR WHERE email = :email AND pwd = :password';
$req = $bdd->prepare($q);
$req->execute([
	'email' => $_POST['email'],
	'password' => hash('sha256', $_POST['pwd'])
]);



// Session admin
if($_POST['email'] == 'admin@site.com' && $_POST['pwd'] == 'Etoile0710'){

	// Ecrire une ligne dans le fichier log
	writeLogLine(true, $_POST['email']);
	
	$_SESSION['email'] = $_POST['email'];
	// redirection vers page admin
	header('location: admin.php');
	exit();
}


// Si on arrive ici, c'est que toutes les vérifications ont fonctionné

// Ouverture de la session utilisateur
session_start();

// Ajout d'un parametre email à la session
$_SESSION['email'] = $_POST['email'];


// Ecrire une ligne dans le fichier log
writeLogLine(true, $_POST['email']);


// Redirection vers la page d'accueil
header('location: index.php');
exit();














?>