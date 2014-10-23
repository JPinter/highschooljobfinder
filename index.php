<!DOCTYPE html>
<html>
<head>
	<title>High School Job Finder</title>
	<style>
		#container{
		 	width: 450px;
		 	margin: auto;
		}
	</style>
</head>

<body>
	<div id='container'>
<a href="form.html">Submit a job listing!</a><hr>
<?php

	$con = new PDO('mysql:host=scornally.fatcowmysql.com;dbname=hsjf',"hsjf_user","gowhalephants");
	
	$s = $con->prepare("SELECT * FROM Listings WHERE Live=1 ORDER BY Bid DESC");
	$s->execute();
	$results = $s->fetchAll();

	foreach($results as $listing){
		echo "<h1>".$listing[Biz_Name]."</h1>";
		echo "<h2>".$listing[Job_Title]."</h2>";
		echo "<p>".$listing[Phone]."</p>";
		echo "<hr>";
	}

	$con = null;
?>
	</div>
</body>
</html>
