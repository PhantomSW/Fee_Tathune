<!-- install phpmailer -->

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

    session_start();
    include('includes/bdd.php');
    $q = 'SELECT email FROM UTILISATEUR WHERE ban = 0';
	$req = $bdd->query($q);
	$results = $req->fetchAll(PDO::FETCH_ASSOC);
    $delay = 3600 * 24 * 7;
    
    while(true) {
        foreach($results as $user) {
            $email = $user['email'];
            
            $mail = new PHPMailer;
            
            $mail->isSMTP();
            $mail->SMTPDebug = false;
            $mail->Debugoutput = 'html';
            $mail->Host = 'localhost';
            $mail->Port = 25;
            $mail->SMTPAutoTLS = false;
            $mail->SMTPAuth = false;
            
            $mail->Username = 'conf@fee-tathune.fr';
            $mail->Password = 'password';
            $mail->setFrom('conf@fee-tathune.fr', 'Christophe');
            $mail->addAddress($email);
            $mail->Subject = 'Newsletter';
            $mail->msgHTML('<h3>Deja une semaine de plus chez Fee Tathune !</h3><br><p>Quoi de neuf pour vous ?</p><br><p>Connectez-vous vite a nouveau pour le savoir !</p>');
            $mail->AltBody = '';

            if($mail->send()){
                echo 'Mail envoyé !';
                echo $email;
            }else{
                echo 'Le mail n\'a pas pu être envoyé.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }
        sleep($delay);
	}
?>
