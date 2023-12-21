<?php
	$id=$_GET["id"];
	include("connect.php");
	$query="DELETE FROM bookings WHERE booking_id=".$id."";
	$n=mysqli_query($con,$query);
	if($n==1)//since delete id should be atmost one
	{
		echo "<script>alert('This booking is deleted')</script>";
		echo "<script>window.location.href='show_userId.php'</script>";
	}
?>