<?php 
require_once("../../includes/initialize.php");




if (!$session->is_logged_in()) { 
	//echo "hello world";
	redirect_to("login.php"); 
	}

?>

<?php include_layout_template('admin_header.php'); ?>

	<?php
	//$user = new User();
//	$user->username = "laju005";
//	$user->password = "rooney";
//	$user->first_name = "laju";
//	$user->last_name = "sobotie";
//	$user->create();

	//$user = User::find_by_id(1);
//	$user->password = "illmatic897";
//	$user->save();
	
	 $user = User::find_by_id(1);
	 $user->delete();
	 echo $user->first_name . " was deleted";
	
	?>
	
<?php include_layout_template('admin_footer.php'); ?>


