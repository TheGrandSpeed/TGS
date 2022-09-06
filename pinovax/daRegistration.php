<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nosivac</title>
	<link rel="stylesheet" type="text/css"href="regCSS.css?v=<?php echo time(); ?>">
	<link rel="icon" type="image/x-icon" href="images/logo.png">
</head>
<body>
<center>

	<div class="navBar">
		<a href="index.php">Home</a> 
		<a href="">Registration</a>
		<a href="daInfo.php">Our Info</a>
		<a href="daInquiry.php">Inquiries</a>
	</div>

	<h1> Nosivac Registration </h1>
	<?php

		$daErrors = array('daFirstName'=> '', 'daSurname'=> '',
			'daBirthday'=> '', 'daAge'=> '',
			'daAddress'=> '', 'daEmailAddress'=> '',
			'daContactNumber'=> '', 'daNationality'=> '',
			'diagnosedWCovid'=> '', 'daSymptoms' => ''
			);

		$daFirstName = $daSurname = $daBirthday = $daAge = $daAddress = $daEmailAddress = $daContactNumber = $daNationality = $diagnosedWCovid = '';

		if (isset($_POST['submit'])){

			$daFirstName = $_POST['daFirstName']; $daSurname = $_POST['daSurname'];
			$daBirthday = $_POST['daBirthday']; $daAge = $_POST['daAge'];
			$daAddress = $_POST['daAddress']; $daEmailAddress = $_POST['daEmailAddress']; 
			$daContactNumber = $_POST['daContactNumber']; $daNationality = $_POST['daNationality'];

			if(empty($daFirstName)){
				$daErrors['daFirstName'] = '*First name is required.*';
			}else{
				if (!preg_match('/^[a-zA-Z\s]{3,}$/', $daFirstName)) {
					$daErrors['daFirstName'] = 'First name must be letters with spaces only.';
				}
			}

			if(empty($daSurname)){
				$daErrors['daSurname'] = '*Surname is required.*';
			}else{
				if (!preg_match('/^[a-zA-Z\s]{3,}$/', $daSurname)) {
					$daErrors['daSurname'] = "Surname must be letters with spaces only.";
				}
			}

			if(empty($daBirthday)){
				$daErrors['daBirthday'] = '*Day of birth is required.*';
			}

			if(empty($daAge)){
				$daErrors['daAge'] = '*Age is required.*';
			}

			if(empty($daAddress)){
				$daErrors['daAddress'] = '*Address is required.*';
			}

			if(empty($daEmailAddress)){
				$daErrors['daEmailAddress'] = '*Email Address is required.*';
			}else{
				if (!filter_var($daEmailAddress, FILTER_VALIDATE_EMAIL)) {
					$daErrors['daEmailAddress'] = 'Must enter a valid email address.';
				}
			}

			if(empty($daContactNumber)){
				$daErrors['daContactNumber'] = '*Mobile number is required.*';
			}else{
				if(!preg_match("/^09[0-9]{9}$/", $daContactNumber)) {
						$daErrors['daContactNumber'] = 'Must enter a valid mobile phone number.';
				}
			}

			if(empty($daNationality)){
				$daErrors['daNationality'] = '*Nationality is required.*';
			}else{
				if (!preg_match('/^[a-zA-Z]+$/', $daNationality)) {
					$daErrors['daNationality'] = 'Nationality must be letters only.';
				}
			}

			//The radio and checkbox

			if(empty($_POST['diagnosedWCovid'])){
				$daErrors['diagnosedWCovid'] = '*Select one of these options.*';
			}else{
				$diagnosedWCovid = $_POST['diagnosedWCovid'];
			}

			if (empty($_POST['daSymptoms'])){
				if ($diagnosedWCovid == 'No') {
					$_POST['daSymptoms'] = 'N/A';
				}else{
					$daErrors['daSymptoms'] = "*If yes, check one or more symptoms.*";
				}
			}
		}
	?>

	<form action="daRegistration.php" method="post">
		<table>
			<tr>
				<th colspan="4">Kindly fill up the form</th>
			</tr>
			<tr>
				<td colspan="4">
					<div class="gridAlign">
						<label>First Name : </label>
						<input type="text" name="daFirstName" value="<?php echo htmlspecialchars($daFirstName); ?>">
						<label>Surname : </label>
						<input type="text" name="daSurname" value="<?php echo htmlspecialchars($daSurname); ?>">

						<span></span>
						<div class="daErrors"><?php echo $daErrors['daFirstName']; ?></div>
						<span></span>
						<div class="daErrors"><?php echo $daErrors['daSurname']; ?></div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<div class="gridAlign">
						<label>Date of birth : </label>
						<input type="date" name="daBirthday" min="1922-01-01" max="2003-12-31" placeholder="DD/MM/YYYY" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo htmlspecialchars($daBirthday); ?>">
						<label>Age : </label>
						<input type="number" name="daAge" min="18" max="100" value="<?php echo htmlspecialchars($daAge); ?>">

						<span></span>
						<div class="daErrors"><?php echo $daErrors['daBirthday'];?></div>
						<span></span>
						<div class="daErrors"><?php echo $daErrors['daAge'];?></div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<div class="gridAlign">
						<label>Address : </label>
						<input type="text" name="daAddress" value="<?php echo htmlspecialchars($daAddress); ?>">
						<label>Email Address : </label>
						<input type="email" name="daEmailAddress"placeholder="ex. example@email.com" value="<?php echo htmlspecialchars($daEmailAddress); ?>">

						<span></span>
						<div class="daErrors"><?php echo $daErrors['daAddress'];?></div>
						<span></span>
						<div class="daErrors"><?php echo $daErrors['daEmailAddress'];?></div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<div class="gridAlign">
						<label>Mobile No. : </label>
						<input type="text" name="daContactNumber" placeholder="ex. 09XXXXXXXXX" value="<?php echo $daContactNumber; ?>">
						<label>Nationality : </label>
						<input type="text" name="daNationality" placeholder="ex. Filipino" value="<?php echo $daNationality; ?>">

						<span></span>
						<div class="daErrors"><?php echo $daErrors['daContactNumber'];?></div>
						<span></span>
						<div class="daErrors"><?php echo $daErrors['daNationality'];?></div>
					</div>
				</td>
			</tr>
			<tr>
				<th colspan="4">Medical History</th>
			</tr>
			<tr>
				<td colspan="2"><label>Have you been diagnosed with Covid-19?</label></td>
				<td colspan="2">
					<div class="properAlignGrid">
					<label><input type="radio" name="diagnosedWCovid" value="Yes" <?php if (isset($_POST['diagnosedWCovid']) && $_POST['diagnosedWCovid'] == 'Yes') echo 'checked="checked"'; ?> >Yes</label>
					<label><input type="radio" name="diagnosedWCovid" value="No" <?php if (isset($_POST['diagnosedWCovid']) && $_POST['diagnosedWCovid'] == 'No') echo 'checked="checked"'; ?> >No</label>
					</div>
				</td>
			</tr>

			<td colspan="2"></td><td colspan="2"><div class="daErrors"><?php echo $daErrors['diagnosedWCovid'];?></div></td>

			<tr><td colspan="4"><div class="just_a_line"></div></td></tr>

			<tr>
				<td colspan="2"><label>Please check all symptoms that apply, otherwise leave it:</label></td>
				<td colspan="2"><div class="daErrors"><?php echo $daErrors['daSymptoms'];?></div></td>
			</tr>
			<tr>
				<td colspan="4">
					<div class="properAlignGrid">
					<label><input type="checkbox" name="daSymptoms[]" value="Loss of taste/smell">Loss of taste/smell</label>
					<label><input type="checkbox" name="daSymptoms[]" value="Difficulty breathing">Difficulty breathing</label>
					<label><input type="checkbox" name="daSymptoms[]" value="Coughing">Coughing</label>
					<label><input type="checkbox" name="daSymptoms[]" value="Runny Nose">Runny Nose</label>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<div class="properAlignGrid">
					<label><input type="checkbox" name="daSymptoms[]" value="Body Aches">Body Aches</label>
					<label><input type="checkbox" name="daSymptoms[]" value="Sore Throat">Sore Throat</label>
					<div></div><div></div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4"><div class="just_a_line"></div></td>
			</tr>
			<tr>
				<td colspan="1"><input type="reset" value="Clear Everything"></td>
				<td colspan="3"><div class="sbContainer"><input type="submit" name="submit" value="Submit Form"></div></td>
			</tr>
		</table>
	</form>

</center>

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

</body>
</html>