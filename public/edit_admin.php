<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php  confirm_logged_in(); ?>
<?php
	if(isset($_GET["id"])){
		$current_admin = find_admin_by_id($_GET["id"]);
	}			
	if(!isset($current_admin)){
		redirect_to("manage_admins.php");
	}
?>
<?php 
	if(isset($_POST["submit"])){
		//validations
		$required_fields = array("username", "password");		
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("username" => 50, "password" => 60);
		validate_max_lengths($fields_with_max_lengths);
		
		if(empty($errors)){
			//perform Update
		
		
			//Process Form
			$id = $_GET["id"];
			$username = mysql_prep($_POST["username"]);
			$hashed_password = password_encrypt($_POST["password"]);
			
			$query = "UPDATE admins SET ";
			$query .= "username = '{$username}', ";
			$query .= "hashed_password = '{$hashed_password}' ";
			$query .= "WHERE id = {$id} ";	
			$query .= "LIMIT 1";			
			$result = mysqli_query($connection, $query);
			
			if($result && mysqli_affected_rows($connection) >= 0){
				$_SESSION["message"] = "Admin Updated.";
				redirect_to("manage_admins.php");
			} else {	
				$message = "Admin update failed.";	
			}
		}
	}else{
		//probably a get request
	}//end of isset submit
?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
 <div id="main">
	<div id="navigation">
     </div>
     <div id="page"> 
		<?php if(!empty($message)){
			echo "<div class=\"message\">" . htmlentities($message) . "</div>";
		}?>
		<?php echo form_errors($errors);?>
		<h2>Edit Admin: <?php echo htmlentities($current_admin["username"]); ?></h2>
		
		<form action="edit_admin.php?id=<?php echo urlencode($current_admin["id"]); ?>" method="post">
			<p>Username: 
			<input type="text" name="username" value="<?php echo htmlentities($current_admin["username"]); ?>" />
			</p>
			<p>Password: 
			
			 <input type="password" name="password" value="">
			</p>
			<input type="submit" name= "submit" value="Edit Admin" /> 
		</form> 
		<br />
		<a href="manage_admins.php">Cancel</a>
     </div>
	
	
<?php include("../includes/layouts/footer.php"); ?>