<head>
  <title>Edit Voter Details</title>
</head>
<body style="background-image: url('edit update.avif'); background-size: cover">
 <center><br><br><br>
  <h1 style=color:black><u>Voter Details</u></h1>
  <h3 style=color:#383840>Edit Details</h3>
  <form method="POST" action="#">
    <input type="text" id="voterId" name="voterId" placeholder="Enter Voter Id to edit" required /><br><br>
	<input type="submit" name="select" value="Select" /><br>
  </form>
 </center>
</body>


<?php
    include "db_connection.php";
	if(isset($_POST['select']))
	{	
      $voterId=$_POST['voterId'];
	  $sql="SELECT * FROM tbl_users WHERE voterId='$voterId'";
	  $result=$con->query($sql);
	  if($result->num_rows>0)
	  {
	   echo "<center><h3>Edit Voter Details</h3>";
	   echo "<form method='post' action='#'>";
	   while($row=$result->fetch_assoc())
	    {
		 echo "<input type='text' name='id' value='".$row['id']."'required/><br><br>";	
		 echo "<input type='text' name='voterId' value='".$row['voterId']."'required/><br><br>";
		 echo "<input type='text' name='fullname' value='".$row['fullname']."'required/><br><br>";
		 echo "<input type='text' name='gender' value='".$row['gender']."'required/><br><br>";
		 echo "<input type='text' name='email' value='".$row['email']."'required/><br><br>";
		 echo "<input type='text' name='password' value='".$row['password']."'required/><br><br>";
		 echo "<input type='text' name='confirmpassword' value='".$row['confirmpassword']."'required/><br><br>";
		}
		echo "<input type='submit' name='update' value='Update'/>";
		echo "</form></center>";
	  }
	  else
	  {
	   echo "No voter found";
	  }
	}


	if(isset($_POST['update']))
	{
      $id=$_POST['id'];
	  $voterId=$_POST['voterId'];
	  $fullname=$_POST['fullname'];
	  $gender=$_POST['gender'];
	  $email=$_POST['email'];
	  $password=$_POST['password'];
	  $confirmpassword=$_POST['confirmpassword'];
	 
	  $sql="UPDATE tbl_users SET fullname='$fullname', gender='$gender', email='$email', password='$password', confirmpassword='$confirmpassword' WHERE voterId='$voterId'";
	  $res=$con->query($sql);
	  if($res)
	   {
	    echo "<center><h3>Voter details updated successfully</center>";
	   }
	  else
	   {
	    echo "<center>Error: ".$con->error."</center>";
	   }
	}
	$con->close();	 
?>

<center><br>
    <h3><strong><a href="adminpage.php">Admin Panel</a><strong</h3>
    <h3><strong><a href="home.php">HOME</a></strong></h3>
</center>
