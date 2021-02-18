<?php
include("dbconnection.php");

if (isset($_POST['sub']))
{
  $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
  $name=$_POST['name'];
  $phone=$_POST['phno'];
 $email=$_POST['email'];
  $password=$_POST['pass'];

 
   if($name == "")
   {
    echo "<script>alert('Enter name')</script>";
   }
   else if(!preg_match ("/^[a-zA-z]*$/", $name))
   {
    echo "<script>alert('Only letters and white spaces are allowed')</script>";
   }
   else if ($phone == "") 
   {
     echo "<script>alert('Enter phone number')</script>";
   }
   //else if($_POST['phno'])
   else if (!preg_match ("/^[0-9]*$/", $phone) )
   {
    echo "<script>alert('Only numeric values are allowed')</script>";
   }
   else if ( $email == "") 
   {
     echo "<script>alert('Enter email')</script>";
   }
  else if (!preg_match ($pattern, $email) )
   {  
        echo "<script>alert('Enter a valid email id')</script>"; 
  }
   else if(  $password == "")
   {
    echo "<script>alert('Enter Password !!')</script>";
   }
  else if (strlen($password) < 8) 
  {
     echo "<script>alert('Your Password Must Contain At Least 8 Characters!')</script>";
 }
  else if(!preg_match("#[0-9]+#",$password))
   {
       echo "<script>alert('Your Password Must Contain At Least 1 Number!')</script>";
   }
 else if(!preg_match("#[A-Z]+#",$password))
  {
      echo "<script>alert('Your Password Must Contain At Least 1 Capital Letter!')</script>";
 }
  else if(!preg_match("#[a-z]+#",$password)) 
  {
      echo "<script>alert('Your Password Must Contain At Least 1 Lowercase Letter!')</script>";
 } 
   else
   {
    echo "<script>alert('Registration successful')</script>";
   }
  
    $sql="insert into registration values('$name','$phone','$email','$password')";
// $sql=mysqli_query(INSERT INTO `registration`(`Name`, `Phone number`, `Email`, `Password`) VALUES ('$name','$phone','$email','$password'));
//  $x= mysqli_query($dbcon,$sql);
  if (mysqli_query($dbcon,$sql))
 {
  echo '<script>alert("New record created successfully");</script>';
 } 
else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($dbcon);
}
mysqli_close($dbcon);
}
?>
<!DOCTYPE html>
<html>

<head>
	<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

	<title>fORM VALIDATION IN PHP</title>
</head>
<body align="center">
	<h2>FORM VALIDATION</h2>
	<form method="POST" action="">
		<table align="center" border="1" style="border-collapse: collapse;"> 
			<tr><td>
		    <input type="text" name="name" placeholder="Name">
     </td></tr>
		<tr><td>
		<input type="text" name="phno" placeholder="Phone number">
		</td></tr>
		<tr><td>
		<input type="text" name="email" placeholder="Email">
		</td></tr>
		<tr><td>
		<input type="password" name="pass" placeholder="Password">
		</td></tr>
<!-- 		<tr><td>
		<input type="password" name="confirm" placeholder="Confirm password">
		</td></tr> -->
		<tr><td>
		<input type="submit" name="sub" value="SUBMIT">
		</td></tr>
      </table>
	</form>

</body>
</html>