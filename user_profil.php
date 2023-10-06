<?php
$title = 'Profil';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 100px;
    }
    
</style>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Votre profil :</h1>
			<?php include('includes/message.php'); ?>
            <?php include('includes/bdd.php');
				$a = 'SELECT * FROM AVATAR WHERE idCon = :user_id';
				$requ = $bdd->prepare($a);
                $requ->execute([
                    'user_id' => $_SESSION['user_id']
                ]);
                $res = $requ->fetch(PDO::FETCH_ASSOC);

                if(!(isset($_SESSION['color']))) {
                $_SESSION['color'] = $res['color'];
                $_SESSION['hat'] = $res['hat'];
                $_SESSION['eyes'] = $res['eyes'];
                $_SESSION['nose'] = $res['nose'];
                $_SESSION['smile'] = $res['smile'];
                $_SESSION['idCon'] = $res['idCon'];
                }
                

                //var_dump($_SESSION);

                include('includes/bdd.php');
                $q= 'SELECT * FROM UTILISATEUR WHERE email = :connect';
                $req = $bdd->prepare($q);
                $req->execute([
                    'connect' => $_SESSION['connect']
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if($result){
                    echo '<form enctype="multipart/form-data" method="POST" action="verif_user_update.php?user_id='.$result['user_id'].'" class="rounded" style="background-color: #FFFAFA; max-width: 1300px;">';
                    echo '
                    <div class="row mb-3">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2 text-center">
                            <img src="avatar/face'.$res['color'].'.png" style="width: 200px; position : relative; top: 0px; left: 0px;"><br>
                            <img src="avatar/smile'.$res['smile'].'.png" style="width: 100px; position : relative; top: -60px; left: 10px;"><br>
                            <img src="avatar/nose'.$res['nose'].'.png" style="width: 40px; position : relative; top: -155px; left: 10px;"><br>
                            <img src="avatar/eyes'.$res['eyes'].'.png" style="width: 100px; position : relative; top: -240px; left: 10px;"><br>
                            <img src="avatar/hat'.$res['hat'].'.png" style="width: 120px; position : relative; top: -370px; left: 10px;">
                        </div>
                    </div>            
                    
                    <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Prénom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="firstname" value="'.$result['firstname'].'" class="form-control" name="firstname"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Nom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" value="'.$result['name'].'" class="form-control" name="name"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Pseudo :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="pseudo" value="'.$result['pseudo'].'" class="form-control" name="pseudo"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>E-mail :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="email" value="'.$result['email'].'" class="form-control" name="email"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Adresse :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="address" value="'.$result['address'].'" class="form-control" name="address"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Age :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="age" value="'.$result['age'].'" class="form-control" name="age"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Phone :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="phone" value="'.$result['phone'].'" class="form-control" name="phone"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Gender :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="gender" value="'.$result['gender'].'" class="form-control" name="gender"/>
                                    <small id="genderHelp" class="form-text">Femme / Homme</small>
                                </div>
                            </div>
                        </div>

                        <div class="text-center row mb-3">
                            <div class="col-lg-4"></div>
                                <div class="pt-1 mt-2 pb-1 col-lg-4">
                                    <h3 style="font-size: 20px;"> Confirm your password</h3>
                                    <input type="password" id="password" class="form-control" name="password"/><br>
                                    <input type="submit" value="Mettre à jour">
                                </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="user_change_pwd.php?user_id=' .$result['user_id'] . '">Changer le mot de passe</a>
                        </form>';
                } else {
                    echo '<h2 style="color:red;">Impossible d\'afficher les informations</h2>';
                }
            ?>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>