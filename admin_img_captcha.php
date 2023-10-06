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
                <h2>Changer les photos du captcha</h2>
            </div>
        </div>
        <?php include('includes/message.php');?>

        <div class="row mb-5">

            <div class="row mb-1">
                <div class="col-lg-1"></div>
                <div class="col-lg-2">
                    <img src="captcha/images/1.jpg" style="width: 230px;" class="align-item-center"><br>
                    <p style="text-align:center;">Image 1</p>
                </div>
                <div class="col-lg-2">
                    <img src="captcha/images/2.jpg" style="width: 230px;" class="align-item-center"><br>
                    <p style="text-align:center;">Image 2</p>
                </div>
                <div class="col-lg-2">
                    <img src="captcha/images/3.jpg" style="width: 230px;" class="align-item-center"><br>
                    <p style="text-align:center;">Image 3</p>
                </div>
                <div class="col-lg-2">
                    <img src="captcha/images/4.jpg" style="width: 230px;" class="align-item-center"><br>
                    <p style="text-align:center;">Image 4</p>
                </div>
                <div class="col-lg-2">
                    <img src="captcha/images/5.jpg" style="width: 230px;" class="align-item-center"><br>
                    <p style="text-align:center;">Image 5</p>
                </div>
            </div>

            
            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_captcha_img.php?img=1" class="color-mode" style="border:none;">
                        <p><b>- Changer l'image 1 -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img1" name="image1">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
           
            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_captcha_img.php?img=2" class="color-mode" style="border:none;">
                        <p><b>- Changer l'image 2 -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img2" name="image2">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_captcha_img.php?img=3" class="color-mode" style="border:none;">
                        <p><b>- Changer l'image 3 -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img3" name="image3">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_captcha_img.php?img=4" class="color-mode" style="border:none;">
                        <p><b>- Changer l'image 4 -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img4" name="image4">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form enctype="multipart/form-data" method="POST" action="verif_captcha_img.php?img=5" class="color-mode" style="border:none;">
                        <p><b>- Changer l'image 5 -</b></p>
                        <div style="display:flex; align-items:center;">
                            <input class="form-control" type="file" id="img5" name="image5">&nbsp;
                            <button type="submit" class="btn btn-outline-secondary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
    </main>
    <?php include('includes/footer.php'); ?>
    </body>
</html>

