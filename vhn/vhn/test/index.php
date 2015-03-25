<html>
	<head>
		<title> Update Information </title>
	</head>
<body>

<?php
include 'connectDB.php';

// define variables and set to empty values
$fnameErr = $lnameErr = $mnameErr = $unameErr = $pwdErr = $emailErr = "";
$fname = $lname = $mname = $uname = $pwd = $email = "";

function test_input($data)
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	echo var_dump($_POST);

	if (empty($_POST["fname"]))
		{$fnameErr = "First name is required";}
	else
		{$fname = test_input($_POST["fname"]);}
	
	if (empty($_POST["lname"]))
		{$lnameErr = "Last name is required";}
	else
		{$lname = test_input($_POST["lname"]);}
		
	if (empty($_POST["mname"]))
		{$mnameErr = "Middle name is required";}
	else
		{$mname = test_input($_POST["mname"]);}	
		
	if (empty($_POST["uname"]))
		{$unameErr = "Username is required";}
	else
		{$uname = test_input($_POST["uname"]);}
	
	if (empty($_POST["pwd"]))
		{$pwdErr = "Password is required";}
	else
		{$pwd = test_input($_POST["pwd"]);}
		
	if (empty($_POST["email"]))
		{$emailErr = "Email address is required";}
	else
	{
		$email = test_input($_POST["email"]);
		if (!preg_match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$",$email))
		{
			$emailErr = "Invalid email format"; 
		}
	}
	
	
}
?>

	<table border="0">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<tr>
			<td>First Name:</td> <td><input type="text" name="fname" value="<?php echo $fname;?>"> <span name="required">*<?php echo $fnameErr;?></span></td>
		</tr>
		<tr>
			<td>Middle Name:</td> <td><input type="text" name="mname" value="<?php echo $mname;?>"> <span name="required">*<?php echo $mnameErr;?></span></td>
		</tr>
		<tr>
			<td>Last Name:</td> <td><input type="text" name="lname" value="<?php echo $lname;?>"> <span name="required">*<?php echo $lnameErr;?></span></td>
		</tr>
		<tr>
			<td></br></td>
		</tr>
		<tr>	
			<td>Username:</td> <td><input type="text" name="uname" value="<?php echo $uname;?>"> <span name="required">*<?php echo $unameErr;?></span></td>
		</tr>
		<tr>
			<td>Password:</td> <td><input type="password" name="pwd" value="<?php echo $pwd;?>"> <span name="required">*<?php echo $pwdErr;?></span></td>
		</tr>
		<tr>			
			<td>Email:</td> <td><input type="text" name="email" value="<?php echo $email;?>"> <span name="required">*<?php echo $emailErr;?></span></td>
		</tr>
		<tr>
			<td><input type="submit" value="Update My Information"></td>
		<tr>
		</form>
		
	</table>
 </body>
 </html> 