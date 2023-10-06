<?php
$title = 'Profil';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 100px;
    }
    
</style>
	<body  class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Votre avatar :</h1>
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
                
                // Change hat
                if(isset($_GET['hat'])) {
                    if($_GET['hat'] == 'next') {
                        $_SESSION['hat'] = ($_SESSION['hat'] + 1) % 3; // 0, 1, 2
                    } else {
                        if($_GET['hat'] == 'prev' && $_SESSION['hat'] > -1) $_SESSION['hat'] = ($_SESSION['hat'] - 1) % 3;
                        if($_GET['hat'] == 'prev' && $_SESSION['hat'] < 0) $_SESSION['hat'] = 2;
                    }
                }

                // Change color
                if(isset($_GET['color'])) {
                    if($_GET['color'] == 'next') {
                        $_SESSION['color'] = ($_SESSION['color'] + 1) % 5; // 0, 1, 2, 3, 4
                    } else {
                        if($_GET['color'] == 'prev' && $_SESSION['color'] > -1) $_SESSION['color'] = ($_SESSION['color'] - 1) % 5;
                        if($_GET['color'] == 'prev' && $_SESSION['color'] < 0) $_SESSION['color'] = 4;
                    }
                }

                // Change eyes
                if(isset($_GET['eyes'])) {
                    if($_GET['eyes'] == 'next') {
                        $_SESSION['eyes'] = ($_SESSION['eyes'] + 1) % 3; // 0, 1, 2
                    } else {
                        if($_GET['eyes'] == 'prev' && $_SESSION['eyes'] > -1) $_SESSION['eyes'] = ($_SESSION['eyes'] - 1) % 3;
                        if($_GET['eyes'] == 'prev' && $_SESSION['eyes'] < 0) $_SESSION['eyes'] = 2;
                    }
                }

                // Change nose
                if(isset($_GET['nose'])) {
                    if($_GET['nose'] == 'next') {
                        $_SESSION['nose'] = ($_SESSION['nose'] + 1) % 3; // 0, 1, 2
                    } else {
                        if($_GET['nose'] == 'prev' && $_SESSION['nose'] > -1) $_SESSION['nose'] = ($_SESSION['nose'] - 1) % 3;
                        if($_GET['nose'] == 'prev' && $_SESSION['nose'] < 0) $_SESSION['nose'] = 2;
                    }
                }

                // Change mouse
                if(isset($_GET['smile'])) {
                    if($_GET['smile'] == 'next') {
                        $_SESSION['smile'] = ($_SESSION['smile'] + 1) % 3; // 0, 1, 2
                    } else {
                        if($_GET['smile'] == 'prev' && $_SESSION['smile'] > -1) $_SESSION['smile'] = ($_SESSION['smile'] - 1) % 3;
                        if($_GET['smile'] == 'prev' && $_SESSION['smile'] < 0) $_SESSION['smile'] = 2;
                    }
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
                    echo '<form enctype="multipart/form-data" method="POST" action="verif_user_avatar.php?user_id='.$result['user_id'].'" class="rounded" style="background-color: #FFFAFA; max-width: 1300px;">';
                    echo '
                    <div class="row mb-3">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2 text-center position: absolute;">
                            <img src="avatar/face'.$_SESSION['color'].'.png" style="width: 200px; position : relative; top: 0px; left: 0px;"><br>
                            <img src="avatar/smile'.$_SESSION['smile'].'.png" style="width: 100px; position : relative; top: -60px; left: 10px;"><br>
                            <img src="avatar/nose'.$_SESSION['nose'].'.png" style="width: 40px; position : relative; top: -155px; left: 10px;"><br>
                            <img src="avatar/eyes'.$_SESSION['eyes'].'.png" style="width: 100px; position : relative; top: -240px; left: 10px;"><br>
                            <img src="avatar/hat'.$_SESSION['hat'].'.png" style="width: 120px; position : relative; top: -370px; left: 10px;">
                        </div>
                    </div>            
                    <div class="row mb-5">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2 text-center">
                            <h6> Couleur de peau : </h6>
                            <a class="btn btn-sm btn-secondary" href="user_avatar.php?color=prev">Précédant</a>
                            <a class="btn btn-sm btn-primary" href="user_avatar.php?color=next">Suivant</a>
                        </div>
                        <div class="col-lg-2 text-center">
                            <h6> Yeux : </h6>
                            <a class="btn btn-sm btn-secondary" href="user_avatar.php?eyes=prev">Précédant</a>
                            <a class="btn btn-sm btn-primary" href="user_avatar.php?eyes=next">Suivant</a>
                        </div>
                        <div class="col-lg-2 text-center">
                            <h6> Nez : </h6>
                            <a class="btn btn-sm btn-secondary" href="user_avatar.php?nose=prev">Précédant</a>
                            <a class="btn btn-sm btn-primary" href="user_avatar.php?nose=next">Suivant</a>
                        </div>
                        <div class="col-lg-2 text-center">
                            <h6> Bouche : </h6>
                            <a class="btn btn-sm btn-secondary" href="user_avatar.php?smile=prev">Précédant</a>
                            <a class="btn btn-sm btn-primary" href="user_avatar.php?smile=next">Suivant</a>
                        </div>
                        <div class="col-lg-2 text-center">
                            <h6> Chapeau : </h6>
                            <a class="btn btn-sm btn-secondary" href="user_avatar.php?hat=prev">Précédant</a>
                            <a class="btn btn-sm btn-primary" href="user_avatar.php?hat=next">Suivant</a>
                        </div>
                        <div class="col-lg-1"></div>      
                    </div>

                        <div class="text-center row mb-3">
                            <div class="col-lg-4"></div>
                                <div class="pt-1 mt-2 pb-1 col-lg-4">
                                    <h3 style="font-size: 20px;">Mot de passe :</h3>
                                    <input type="password" id="password" class="form-control" name="password"/><br>
                                    <input type="submit" value="Mettre à jour">
                                </div>
                        </div>
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