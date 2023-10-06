<?php
$title = 'Admnistration';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 200px;
    }
    
</style>
<body class="color-mode">
    <?php 
    include('includes/header.php'); 
    if(!isset($_SESSION['code'])){
        $msg = 'Vous n\'êtes pas identifié en tant qu\'administrateur.';
	    header('location: index.php?type=danger&message=' . $msg);
	    exit();
    }
    ?>
  
    <main class="admin_main">
        <h1> Newsletter </h1>
		<?php include('includes/message.php'); ?>
        <?php include('includes/bdd.php'); ?>
		<div class="row mb-3">
            <div class="col-lg-8">
                <h3>Lancer la newsletter :</h3>
				<a href="newsletter.php" target="_blank"><button type="button" class="btn btn-success">Activer la Newsletter</button><a>
            </div>
		</div>
	</main>
        
	<?php include('includes/footer.php'); ?>
    </body>
</html>

