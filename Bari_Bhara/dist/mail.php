<?php
	if(isset($_POST['submit'])) {
		$msg = $_POST['Mail'];
		$to = "oliullah195@gmail.com";
		$from = "oliullah@baribhara.tk";
		$result = mail($to,"This is for test",$msg,$from);
		if(result == true) {
			echo "Successfull";
		} else {
			echo "Failed!";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mail Me</title>
</head>
<body>
	<form action="#" method="post">
		<input type="text" name="Mail">
		<input type="submit" name="submit">
	</form>
</body>
</html>