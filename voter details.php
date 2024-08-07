<head>
    <title>Voter Details</title>
</head>
<body style="background-image: url('voterdetails.jpg'); background-size: cover">
<?php 
    include "db_connection.php";
	$sql="SELECT * FROM tbl_users WHERE '1'";
	$result=$con->query($sql);
	if($result->num_rows>0)
	{ 
	  echo "<br><br<br><br><br<br><center><h1 style=font-size:40px><u><i>Voters Details</i></u></h1><br>";
	  echo "<table border>";
	  echo "<tr style=color:blue>
	          <th>Full Name</th>
			  <th>Gender</th>
			  <th>Email Id</th>
			  <th>Voter Id</th>
			  <th>Password</th>
              <th>Voted For</th>
		    </tr>";
	  while($row=$result->fetch_assoc())
	  {
		echo "<tr>
		        <td>".$row['fullname']."</td>
				<td>".$row['gender']."</td>
				<td>".$row['email']."</td>
				<td>".$row['voterId']."</td>
				<td>".$row['password']."</td>
                <td>".$row['votedfor']."</td>
			 </tr>";
	  }
	  echo "</table></center>";
	}
	$con->close();
?>

<center><br>
    <h3><strong><a href="edit details.php">Edit Voter Details</a><strong</h3>
    <h3><strong><a href="delete details.php">Delete Voter Details</a><strong</h3>
    <h3><strong><a href="home.php">HOME</a></strong></h3>
</center>
</body>