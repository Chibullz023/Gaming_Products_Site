<?php
session_start();
if(isset($_POST['Submit_Review'])){
	$product_id = $_POST['product_id'];
	$name = $_POST['theName'];
	$comments = $_POST['comments'];
	
	if($product_id==""){
		$product_idMsg = "<br><span style='color:red;'>The Product ID cannot Be Blank.</span>";
	}
	if($name==""){
		$nameMsg = "<br><span style='color:red;'>Your Name cannot be blank.</span>";
	}
	if($comments==""){
		$commentMsg = "<br><span style='color:red;'>Your Review cannot be blank.</span>";
	}
	else{
		include('includes/dbc_admin.php');
		$query = "INSERT INTO reviews(product_id,name,comment) VALUES
	('$product_id','$name','$comments')";
		$success = mysqli_query($con, $query);
		if($success){
			$inserted = "<h2>Success!!!</h2><h3>Your Review for this product was added to the website</h3>";
		}else{
			$error_message = mysqli_error($con);
			$inserted = "There was an error: $error_message";
			exit($inserted);
			}
		}
	}//comment: more code will be added here
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
	function validateForm(){
		var theName = document.form1.theName.value;
		var comments = document.form1.comments.value;
		var product_id = document.form1.product_id.value;
		var nameMsg = document.getElementById('nameMsg');
		var commentMsg = document.getElementById('commentMsg');
		var product_idMsg = document.getElementById('product_idMsg');
		if(theName==""){nameMsg.innerHTML = "Your name cannot be blank."; return false;}
		if(comments==""){commentMsg.innerHTML = "Your Review cannot be blank."; 
	return false;}
		if(product_id==""){product_idMsg.innerHTML = "Cannot Be Blank";
	return false;}
	}
</script>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php include("includes/header.inc");?>

<?php include("includes/nav.inc");?>

<div id="wrapper">


<?php include("includes/aside.inc");?>


	<section>
		<h2>Add A Review</h2>
		<?php if(isset($inserted)){echo $inserted;}
		else{ ?>
		<form method ="post" action="<?php echo $_SERVER['PHP_SELF']?>"
		name = "form1" onSubmit="return validateForm()">
		
		<p>
			<label>Product ID:</label>
			<input type="text" id="product_id" name="product_id" 
			value="<?php echo $_GET['id']; ?>" readonly="readonly">
		</p>
		
		<p>
			<label>Name:</label><br>
			<input type="text" id="theName" name="theName">
			<?php if(isset($nameMsg)){
				echo $nameMsg;
			} ?>
			<br><span id="nameMsg" style="color:red"></span>
		</p>
		
		<p>
			<label>Review:</label><br>
			<input type="text" id="comments" name="comments">
			<?php if(isset($commentMsg)){
				echo $commentMsg;
			} ?>
			<br><span id="commentMsg" style="color:red"></span>
		</p>

		<p>
			<input type="submit" name="Submit_Review" value="Submit">
		</p>
	
		</form>
		<?php } ?>
	</section>

</div>

<?php include("includes/footer.inc");?>

</body>
</html>
