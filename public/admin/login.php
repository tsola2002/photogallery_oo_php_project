<?php 
require_once("../../includes/initialize.php");



if($session->is_logged_in()) {
  redirect_to("index.php");
}

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
  // Check database to see if username/password exist.
	$found_user = User::authenticate($username, $password);
	
  if ($found_user) {
    $session->login($found_user);
    redirect_to("index.php");
  } else {
    // username/password combo was not found in the database
    $message = "Username/password combination incorrect.";
  }
  
} else { // Form has not been submitted.
  $username = "";
  $password = "";
}

// DATABASE/ USER TEST CODE COMMENTED OUT

//if(isset($database)){ echo "true";} else {echo "false";} echo "</br>";

// echo $database->mysql_prep("it's working?" . "</br>");
 
// $sql  ="INSERT INTO users (id, username, password, first_name, last_name)";
// $sql .="VALUES(1, 'osobotie', 'brov2002', 'omatsola', 'sobotie')";
//$result = $database->query($sql);
 
// $sql = "SELECT * FROM users WHERE id = 1";
// $result_set = $database->query($sql);

 //$found_user = mysql_fetch_array($result_set); 
//echo $found_user['username'];

//$user = new User;
//$found_user = user::find_by_id(1);
//echo $found_user['username'];
//
//$user_set = user::find_all();
//while($user = $database->fetch_array($user_set)){
//	echo "Username: " .$user['username']. "<br/>";	
//	echo "Full Name: " .$user['first_name']. "" .$user['last_name']. "<br/>";
//}

?>

<h2>Staff Login</h2>
		<?php //echo output_message($message); ?>

		<form action="login.php" method="post">
		  <table>
		    <tr>
		      <td>Username:</td>
		      <td>
		        <input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Login" />
		      </td>
		    </tr>
		  </table>
		</form>