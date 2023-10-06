<?php 

if(isset($_FILES['image'.$_GET['img']]) && $_FILES['image'.$_GET['img']]['error'] != 4){
	$acceptable = ['image/jpg', 'image/jpeg'];
	if (!in_array($_FILES['image'.$_GET['img']]['type'], $acceptable)){
		$msg = 'L\'image doit être de type jpg ou jpeg !';
		header('location: admin_img_captcha.php?type=danger&message=' . $msg);
		exit();
	}

	$maxSize = 5 * 1024 *1024;
	if ($_FILES['image'.$_GET['img']]['size'] > $maxSize){
		$msg = 'L\'image doit faire moins de 5Mo';
		header('location:  admin_img_captcha.php?type=danger&message=' . $msg);
		exit();
	}

	list($width, $height) = getimagesize($_FILES['image'.$_GET['img']]['tmp_name']);
	if ($width !== $height) {
		$msg = 'L\'image doit être carrée.';
		header('location:  admin_img_captcha.php?type=danger&message=' . $msg);
		exit();
	}

	$id = $_GET['img'];
	$filename = $id . '.jpg';

	$destination = 'captcha/images/'.$filename;
	if(!move_uploaded_file($_FILES['image'.$_GET['img']]['tmp_name'], $destination)){
		$msg = 'Erreur lors de l\'enregistrement du fichier';
		header('location:  admin_img_captcha.php?type=danger&message=' . $msg);
		exit();
	}

	$msg = 'Photo mise à jour.';
	header('location: admin_img_captcha.php?type=success&message=' . $msg);
	exit();

} else {
	$msg = 'Aucune photo n\'a été ajoutée.';
	header('location: admin_img_captcha.php?type=danger&message=' . $msg);
	exit();
}

?>




