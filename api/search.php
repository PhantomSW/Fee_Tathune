<?php 

ini_set('display_errors', 1); // Affiche les erreurs

if(isset($_GET['name'])) {

    $name = $_GET['name'];
    include('../includes/bdd.php');
    $sql = 'SELECT user_id, pseudo, email FROM UTILISATEUR WHERE pseudo LIKE ?';

    /*
     * Le mot clé 'LIKE' permet de filter une valeur qui match une partie d'un mot
     * Il faudra spécifier une chose
     * TEXT%    -> Matcher toutes les valeurs qui commencent par TEXT
     * %TEXT    -> Matcher toutes les valeurs qui terminent par TEXT
     * %TEXT%   -> Matcher toutes les valeurs qui contiennent TEXT
     */

$stmt = $bdd->prepare($sql);
$success = $stmt->execute([
    '%' . $name . '%'
]);
if($success) {
    $ajax = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<div>
<table class="table table-striped table-dark mt-4">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">ID<a href="?order=user_id" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
      <th scope="col">Pseudo<a href="?order=pseudo" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
      <th scope="col">Email<a href="?order=email" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';

foreach($ajax as $usr) {
    //echo burgerTransform($usr);
    echo '<tr><th scope="row"></th>
    <td>'.$usr["user_id"].'</td>
    <td>'.$usr["pseudo"].'</td>
    <td>'.$usr["email"].'</td>
    <td>
			<a class="btn btn-sm btn-secondary" href="action_read.php?user_id=' .$usr['user_id'] . '">Consulter</a>
			<a class="btn btn-sm btn-primary" href="action_update.php?user_id=' .$usr['user_id'] . '">Modifier</a>
      <a class="btn btn-sm btn-warning" href="action_ban.php?user_id=' .$usr['user_id'] . '">Bannir</a>
			<a class="btn btn-sm btn-danger" href="action_delete.php?user_id=' .$usr['user_id'] . '">Supprimer</a>
		</td>
    </tr>';
}
echo '
</tbody>
</table>
</div>';
}
}







?>