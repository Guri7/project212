<?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.html");
}
$res=mysqli_query($con, "SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_assoc($res);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donatoin </title>
<link rel="stylesheet" href="style.css" type="text/css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div id="header">
	<div id="left">
    <label>Donation</label>
    </div>
    <div id="right">
    	<div id="content">
        	Welcome <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>  <div class="container">
           
            <div class="clear"></div>
		<form method="POST" action="user_registration.php" style= "margin-left: 250px;">
			<table width="500" border="1" align="center">
				<tr>	
					<th bgcolor="black
					" colspan="4" ><h1 style= "color: white;">Donation  Form</h1></th>
				</tr>
				<tr>
					<td align="right">Name</td>
					<td><input type="text" name="user_name"><font color="red"><?php echo @$_GET['name']; ?></font></td>
				</tr>
				<tr>
					<td align="right">Address</td>
					<td><input type="text" name="father_name"><font color="red"><?php echo @$_GET['father']; ?></font></td>
				</tr>
				<tr>
					<td align="right">City</td>
					<td><input type="text" name="school_name"><font color="red"><?php echo @$_GET['school']; ?></font></td>
				</tr>
				<tr>
					<td align="right">Phone No</td>
					<td><input type="text" name="roll_no"><font color="red"><?php echo @$_GET['roll']; ?></font></td>
				</tr>
				<tr>
					<td align="right">ITems REquires </td>
					<td><select name="class_name">
						<option>items</option>
                        <option>1</option>
						<option>2</option>
                        <option>3</option>
						<option>4</option>
                        <option>5</option>
						<option>6</option>
                        <option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
					</select><font color="red"><?php echo @$_GET['class']; ?></font></td>
				</tr>
				<tr>
					<td colspan="5" align="center"><input type="submit" value="Submit" name="submit" href="view.php"></td>
				</tr>
			</table>
			
		</form>
            </div>
	</body>
</html>
<?php
/*$conn=mysql_connect("localhost","root","");
$db= mysql_select_db("students",$conn);*/

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"test");
 
 if (isset($_POST['submit']))
 {
 $student_name=$_POST['user_name'];
 $student_father=$_POST['father_name'];
 $student_school=$_POST['school_name'];
 $student_roll=$_POST['roll_no'];
 $student_class=$_POST['class_name'];
 
 if($student_name=='')
 {
	echo "<script>window.open('view.php?name=name is required','_self');</script>";
	exit();
 }
 if($student_father=='')
 {
	echo "<script>window.open('view.php?father=father's name is required','_self');</script>";
	exit();
 }
if($student_school=='')
 {
	echo "<script>window.open('view.php?school= school name is required','_self');</script>";
	exit();
 }
if($student_roll=='')
 {
	echo "<script>window.open('view.php?roll=roll no. is required','_self');</script>";
	exit();
 }
 if($student_class=='')
 {
	echo "<script>window.open('view.php?class=class is required','_self');</script>";
	exit();
 }

$que="insert into u_reg (user_name,father_name,school_name,roll_no,class)values('$student_name','$student_father','$student_school','$student_roll','$student_class')";

if($conn->query($que)=== true)
{
	echo "inserted data into database successfull";
}


}


?>