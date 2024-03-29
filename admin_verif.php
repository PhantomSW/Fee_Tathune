<?php 

function writeLogLine($success, $code){
	$log = fopen('logs/log_admin.txt', 'a+');
	$line = date('Y/m/d - H:i:s') . ' - Tentative de connexion ' . ($success ? 'réussie' : 'échouée') . ' de : ' . $code . "\n";
	fputs($log, $line);
	fclose($log);
}

if(empty($_POST['code']) || empty($_POST['pwd'])){
		$msg = 'Vous devez remplir les 2 champs.';
		header('location: admin_connexion.php?type=warning&message=' . $msg);
		exit();
}

if($_POST['code'] == 'Admin' && $_POST['pwd'] == 'Admin'){
	writeLogLine(true, $_POST['code']);
	session_start();
	$_SESSION['code'] = $_POST['code'];
	header('location: admin_utilisateurs.php');
	exit();
} else {
	if ($_POST['code'] == 'Admin' && $_POST['pwd'] != 'Admin') {
		$msg = 'Mot de passe incorrect.';
		header('location: admin_connexion.php?type=danger&message=' . $msg);
		exit();
	} else {
		$msg = 'Compte inexistant.';
		header('location: admin_connexion.php?type=danger&message=' . $msg);
		exit();
	}
}
?>