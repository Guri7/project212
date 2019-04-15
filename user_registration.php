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
</div> 
		<center><font color='red' size='6'><?php echo @$_GET['delete'];?></font></center>
		<table align="center" width='1000' border='4' style= "margin-left: 250px;">
			<tr>
			
					<th colspan="20" align="center" bgcolor="black"><h1 style= "color: white;">Viewing all the record</h1></th>
				
			</tr>
			<tr align="center">
				<td>Serial No.</td>
				<td>User's Name</td>
				<td>User's Age</td>
				<td>Phone No.</td>
				
				<td>Detail</td>
			</tr>
	
			<?php
				
				$conn=mysqli_connect("localhost","root","");
                $db=mysqli_select_db($conn,"test");
				
				$que = "select * from u_reg order by 1 DESC";
				$run =$conn->query($que);
				$i=1;
				while ($row=mysqli_fetch_array($run)){
					$u_id = $row[0];
					$user_name = $row[1];
					$user_age=$row[2];
					$phone_no=$row[3];
			?>
				<tr align="center">
				<td><?php echo $i;$i++; ?></td>
				<td><?php echo $user_name; ?></td>
				<td><?php echo $user_age; ?></td>
				<td><?php echo $phone_no; ?></td>
					
                    <td><a href='view.php?detail=<?php echo $u_id ?>'>Detail</a></td>
				
			</tr>
			<?php } ?>
		</table>
	</body>
</html>
<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"test");
 

if(isset($_GET['detail']))
{
    $detail_record=$_GET['detail'];
    $que1="select * from u_reg where u_id='$detail_record'";
    $run1=$conn->query($que1);
    
    while($row1=mysqli_fetch_array($run1)){
        $s_user=$row1[1];
        $s_age=$row1[2];
        $s_phone=$row1[3];
        $s_address=$row1[4];
        $s_image=$row1[5];
    ?>
<br><br>
<table border="4">
    <tr>detail</tr>
<tr>
    <th>Name</th>
    <th>Age</th>
    <th>Phone No.</th>
    <th>Address</th>
    <th>Image</th>
</tr>
<tr>
    <td><?php echo $s_user; ?></td>
    <td><?php echo $s_age; ?></td>
    <td><?php echo $s_phone; ?></td>
    <td><?php echo $s_address; ?></td>
    <td><?php echo $s_image; ?></td>
</tr>
</table>  

<?php }} ?>
