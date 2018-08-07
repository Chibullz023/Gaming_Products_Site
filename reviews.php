<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("includes/header.inc");?>

<?php include("includes/nav.inc");?>

<div id="wrapper">


<?php include("includes/aside.inc");?>


	<section>
		<h2>Reviews</h2>
		<table width="100%" cellpadding="5">
			<tr><th>Product ID</th><th>Name</th><th>Review</th><th>Review Date</th></tr>
			<?php
				include('includes/dbc.php');
				
				//$query = "SELECT * FROM reviews ORDER BY product_id";
				$query = "SELECT * FROM reviews WHERE product_id='".$_GET['id']."' ORDER BY product_id";
				$result = mysqli_query($con, $query);
				if($result == false){
					$error_message = mysqli_error();
					echo "<p>There has been a query error: $error_message</p>";
				}
				if(mysqli_num_rows($result)==0){
					echo "There Are No Reviews Yet." ;
					echo "<br>";
					echo '<a href="add_review.php?id='.$_GET['id'].'">Review Here</a>';
					echo "<br>";
				}
				while($row=mysqli_fetch_assoc($result)){
					echo '<tr><td align="center">'.$row['product_id'].'</td>';
					echo '<td align="center">'.$row['name'].'</td>';
					echo '<td align="center">'.$row['comment'].'</td>';
					echo '<td align="center">'.$row['review_date'].'</td></tr>';
				}
			?>
		</table>
	</section>

</div>

<?php include("includes/footer.inc");?>

</body>
</html>
