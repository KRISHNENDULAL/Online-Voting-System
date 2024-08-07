<head>
  <title>Delete Voter Details</title>
</head>
<body style="background-image: url('delete.jpg'); background-size: cover">
 <center><br><br><br><br>
  <h1 style=color:#080B4F><u>Voter Details</u></h1>
  <h3 style=color:#383840>Delete Details</h3>
  <form method="POST" action="#">
    <input type="text" id="voterId" name="voterId" placeholder="Enter Voter Id to be deleted" required /><br><br>
	<input type="submit" name="delete" value="Delete" />
  </form>
 </center>
</body>




<?php
    include "db_connection.php";
	if(isset($_POST['delete']))
	{	
      $voter_id=$_POST['voterId'];
	  $sql="DELETE FROM `tbl_users` WHERE voterId='$voter_id'";
	  $result=$con->query($sql);
	  if($result)
	  {
		echo "<center><b>Voter details deleted successfully</b></center>";
	  }
	  else
	  {
		echo $con->error;
	  }
	}
	$con->close();
?>

<center><br>
    <h3><strong><a href="adminpage.php">Admin Panel</a><strong</h3>
    <h3><strong><a href="home.php">HOME</a></strong></h3>
</center>



