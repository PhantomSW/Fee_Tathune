<?php
$title = 'Captcha';
include('includes/head.php');
?>
<body class="color-mode">

    <?php include('includes/header.php'); 
    if(!isset($_SESSION['code'])){
        $msg = 'Vous n\'êtes pas identifié en tant qu\'administrateur.';
	    header('location: index.php?type=danger&message=' . $msg);
	    exit();
    }?>

    <main class="mx-2">
        <div class="row mb-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <h2>Ajouter des éléments pour l'avatar</h2>
            </div>
        </div>
        <?php include('includes/message.php');?>

        <div class="row mb-5">
            
            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_add_avatar.php?type=hat" class="color-mode" style="border:none;">
                        <p><b>- Ajouter un chapeau -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img1" name="imagehat">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
           
            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_add_avatar.php?type=nose" class="color-mode" style="border:none;">
                        <p><b>- Ajouter un nez -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img2" name="imagenose">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_add_avatar.php?type=smile" class="color-mode" style="border:none;">
                        <p><b>- Ajouter une bouche -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img3" name="imagesmile">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_add_avatar.php?type=eyes" class="color-mode" style="border:none;">
                        <p><b>- Ajouter des yeux -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img4" name="imageeyes">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_add_avatar.php?type=color" class="color-mode" style="border:none;">
                        <p><b>- Ajouter une couleur de peau -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img5" name="imagecolor">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
    </main>
    <?php include('includes/footer.php'); ?>
    </body>
</html>

