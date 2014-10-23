<?php

// actually checks the data the user typed in has the right stuff in it
// CHARGE THEIR CREDIT CARDS!
// Returns errors usefully

if($_POST){
	
	$con = new PDO('mysql:host=scornally.fatcowmysql.com;dbname=hsjf',"hsjf_user","gowhalephants");
	$s = $con->prepare("INSERT INTO Listings (Biz_Name, Job_Title, Wage, Duties, Hours, Address, Phone, Email, CC, Bid, Date, Live, Type_Wage) VALUES (:Biz_Name, :Job_Title, :Wage, :Duties, :Hours, :Address, :Phone, :Email, :CC, :Bid, CURDATE(), 1, '$_POST[Type_Wage]') ");
	$s->bindParam(':Biz_Name', $_POST[Biz_Name], PDO::PARAM_INT);
	$s->bindParam(':Job_Title', $_POST[Job_Title], PDO::PARAM_INT);
	$s->bindParam(':Wage', $_POST[Wage], PDO::PARAM_INT);
	$s->bindParam(':Duties', $_POST[Duties], PDO::PARAM_INT);
	$s->bindParam(':Hours', $_POST[Hours], PDO::PARAM_INT);
	$s->bindParam(':Address', $_POST[Address], PDO::PARAM_INT);
	$s->bindParam(':Phone', $_POST[Phone], PDO::PARAM_INT);
	$s->bindParam(':Email', $_POST[Email], PDO::PARAM_INT);
	$s->bindParam(':CC', $_POST[CC], PDO::PARAM_INT);
	$s->bindParam(':Bid', $_POST[Bid], PDO::PARAM_INT);
	$s->execute();
	$results = $s->fetchAll();
	$con = null;
	header('location: index.php');

}
else{
	header('location: index.php'); //sends people back to homepage that tried to cheat by going directly to handler.php without using form.html first!
}

?>
