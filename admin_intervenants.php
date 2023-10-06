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
        <h1> Gestion des intervenants </h1>
		<?php include('includes/message.php'); ?>
        <?php include('includes/bdd.php');
		if(isset($_GET['order'])) {
			$order = $_GET['order'];
		} else {
			$order = 'prof_id';
		}
				$q = 'SELECT * FROM INTERVENANT ORDER BY '. $order;
				$req = $bdd->query($q);
				$results = $req->fetchAll(PDO::FETCH_ASSOC);
				?>
				<a class="mt-4 btn btn-sm btn-success" href="action_inter_create.php">Nouvel intervenant</a>
										
				<table class="table table-dark table-striped mt-2">
						<tr>
							<th scope="col">ID<a href="?order=prof_id" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Prénom<a href="?order=firstname" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Nom<a href="?order=name" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Profession<a href="?order=profession" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Actions</th>
						</tr>

						<?php
						foreach ($results as $user)  {
							echo '<tr>
									<td>' .$user['prof_id'] . '</td>
									<td>' .$user['firstname'] . '</td>
									<td>' .$user['name'] . '</td>
									<td>' .$user['profession'] . '</td>
									<td>
										<a class="btn btn-sm btn-secondary" href="action_inter_read.php?prof_id=' .$user['prof_id'] . '">Consulter</a>
										<a class="btn btn-sm btn-primary" href="action_inter_update.php?prof_id=' .$user['prof_id'] . '">Modifier</a>
										<a class="btn btn-sm btn-danger" href="action_inter_delete.php?prof_id=' .$user['prof_id'] . '">Supprimer</a>
									</td>
								</tr>';
						}
            echo '</table>';
            echo '</main>';
            include('includes/footer.php'); ?>
    </body>
</html>

