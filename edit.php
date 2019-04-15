<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"test");
 
$edit_record=$_GET['edit'];
$que1="select * from u_reg where u_id='$edit_record'";
$run1=$conn->query($que1);
if($row=mysqli_fetch_array($run1)){

    $edit_id=$row[0];
    $s_name=$row[1];
    $s_age=$row[2];
    $s_phone=$row[3];
    $s_address=$row[4];
    $s_image=$row[5];
}
?>      
<html>
	<head>
		<title>Registration Form</title>
	</head>
	
	<body>
		<form method="POST" action="edit.php?edit_form=<?php echo $edit_id;?>">
            
			<table width="500" border="1" align="center">
				<tr>	
					<th bgcolor="yellow" colspan="4"><h1>Updatation Form</h1></th>
				</tr>
				<tr >
					<td align="right">Name</td>
					<td><input type="text"value="<?php echo $s_name?>" name="user_name1"></td>
				</tr>
				<tr >
					<td align="right">Age</td>
					<td><input type="text" value="<?php echo $s_father?>"name="father_name1"></td>
				</tr >
				<tr>
					<td align="right">Phone No.</td>
					<td><input type="text"value="<?php echo $s_school?>" name="school_name1"></td>
				</tr>
				<tr >
					<td align="right">Address</td>
					<td><input type="text"value="<?php echo $s_roll?>" name="roll_no1"></td>
				</tr>
				<tr>
					<td align="right">Image</td>
					<td><select name="class_name1"value="<?php echo $s_class?>"><?php echo $s_class?>
						<option >Class</option>
						<option>9th</option>
						<option>10th</option>
					</select></td>
				</tr>
				<tr>
					<td colspan="5" align="center"><input type="submit" value="update" name="update"></td>
				</tr>
			</table>
			
		</form>
	</body>
</html>
<?php
if(isset($_POST['update']))
{
    $edit_record1=$_GET['edit_form'];
    
    $user_name1=$_POST['user_name1'];
     $user_age1=$_POST['father_name1'];
     $user_phone1=$_POST['school_name1'];
     $user_address1=$_POST['roll_no1'];
      $user_image1=$_POST['class_name1'];
    
    $query1="update u_reg set u_name='$user_name1',u_age='$user_age1',u_phone='$user_phone1',u_address='$user_address1',u_image='$user_image1' where u_id='$edit_record1'";
    
    if($conn->query($query1))
    {
        echo "<script>window.open('listCitizens.php?updated=record has been updated!','_self')</script>"; 
    }
    
}


?>