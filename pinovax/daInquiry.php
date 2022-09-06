<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nosivac</title>
	<link rel="stylesheet" type="text/css"href="inquiryCSS.css?v=<?php echo time(); ?>">
	<link rel="icon" type="image/x-icon" href="images/logo.png">

</head>
<body>
<center>
	<div class="navBar">
		<a href="index.php">Home</a>
		<a href="daRegistration.php">Registration</a>
		<a href="daInfo.php">Our Info</a>
		<a href="">Inquiries</a>
	</div>

	<?php

		$daErrors = array('daFirstName'=> '', 'daLastName'=> '', 'daEmail'=> '', 'daInquiry'=> '');

		$daFirstName = $daLastName = $daEmail = $daInquiry = '';

		if (isset($_POST['submit'])) {

			$daFirstName = $_POST['daFirstName'];
			$daLastName = $_POST['daLastName'];
			$daEmail = $_POST['daEmail'];
			$daInquiry = $_POST['daInquiry'];

			if(empty($daFirstName)){
				$daErrors['daFirstName'] = '*First name is required.*';
			}else{
				if (!preg_match('/^[a-zA-Z\s]{3,}$/', $daFirstName)) {
					$daErrors['daFirstName'] = 'First name must be letters with spaces only.';
				}
			}

			if(empty($daLastName)){
				$daErrors['daLastName'] = '*Last name is required.*';
			}else{
				if (!preg_match('/^[a-zA-Z\s]{3,}$/', $daLastName)) {
					$daErrors['daLastName'] = "Last name must be letters with spaces only.";
				}
			}

			if(empty($daEmail)){
				$daErrors['daEmail'] = '*Email Address is required.*';
			}else{
				if (!filter_var($daEmail, FILTER_VALIDATE_EMAIL)) {
					$daErrors['daEmail'] = 'Must enter a valid email address.';
				}
			}

			if (empty($daInquiry)) {
				$daErrors['daInquiry'] = '*Please, leave your inquiry in here.*';
			}
		}
	?>

	<form action="daInquiry.php" method="post">
		<table>
			<tr>
				<th colspan="4">Fill up the form for inquiries.</th>
			</tr>
			<td colspan="4"><div class="just_a_line"></div></td>
			<tr>
				<td colspan="4">
				<div class="gridAlign">
					<label>First Name: </label>
					<input type="text" name="daFirstName" value="<?php echo htmlspecialchars($daFirstName); ?>">
					<span></span>
					<div class="daErrors"><?php echo $daErrors['daFirstName'];?></div>
				</div>
				</td>
			</tr>
			<tr>
				<td colspan="4">
				<div class="gridAlign">
					<label>Last Name: </label>
					<input type="text" name="daLastName" value="<?php echo htmlspecialchars($daLastName); ?>">
					<span></span>
					<div class="daErrors"><?php echo $daErrors['daLastName'];?></div>
				</div>
				</td>
			</tr>
			<tr>
				<td colspan="4">
				<div class="gridAlign">
					<label>Email Address: </label>
					<input type="email" name="daEmail" placeholder="ex. emailaddress@email.com" value="<?php echo htmlspecialchars($daEmail); ?>">
					<span></span>
					<div class="daErrors"><?php echo $daErrors['daEmail'];?></div>
				</div>
				</td>
			</tr>
			<tr>
				<td colspan="4">
				<div class="gridAlign">
					<label>Inquiry: </label>
					<textarea name="daInquiry" placeholder="Leave your inquiries in here..." value="<?php echo htmlspecialchars($daInquiry); ?>"></textarea>
					<span></span>
					<div class="daErrors"><?php echo $daErrors['daInquiry'];?></div>
				</div>
				</td>
			</tr>
			<tr>
				<td colspan="1"><input type="reset" value="Clear Everything"></td>
				<td colspan="3"><div class="sbContainer"><input type="submit" name="submit" value="Submit Form"></div></td>
			</tr>
		</table>
	</form>
	
	<center>
	<div class="formSub">
	<?php
		if (isset($_POST['submit'])) {
			if(array_filter($daErrors)){
			}else{
				echo "Form has been submitted.";
			}
		}
	?>
	</div>
	</center>

</center>
</body>
</html>