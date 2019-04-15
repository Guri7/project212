	<?php
				
				$conn=mysqli_connect("localhost","root","");
                $db=mysqli_select_db($conn,"test");

   $delete_record=$_GET['del'];
$query="delete from u_reg where u_id='$delete_record'";

if($conn->query($query)===true)
{
    echo"<script>window.open('listCitizens.php?delete=Record has been delete successfully','_self')</script>";
}

?>