<?php
$fullname_error='';
$fullname='';
if(isset($_POST['submit']))
{
if(empty($_POST['fullname']))
{
$fullname_error='Full name is required';
}
else
{
$fullname=test_input($_POST['fullname']);
}
}
$voterId_error='';
$voterId='';
if(isset($_POST['submit']))
{
if(empty($_POST['voterId']))
{
$voterId_error='VoterId is required';
}
else
{
$voterId=test_input($_POST['voterId']);
}
}
$email_error='';
$email='';
if(isset($_POST['submit']))
{
if(empty($_POST['email']))
{
$email_error='Email is required';
}
else
{
$email=test_input($_POST['email']);
}
}
$password_error='';
$password='';
if(isset($_POST['submit']))
{
if(empty($_POST['pspasswordwd']))
{
$password_error='Password required';
}
else
{
$password=test_input($_POST['password']);
}
}
$confirmpassword_error='';
$confirmpassword='';
if(isset($_POST['submit']))
{
if(empty($_POST['confirmpassword']))
{
$confirmpassword_error='Please confirm your password';
}
else
{
$confirmpassword=test_input($_POST['confirmpassword']);
}
}

function test_input($data)
{
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;
}


include "db_connection.php";
if(isset($_POST['submit'])){
  $fullname = $_POST['fullname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $voterId = $_POST['voterId'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];  
  $duplicate = "SELECT * FROM tbl_users WHERE voterId = '$voterId' OR email = '$email'";
  $result = $con->query($duplicate);
  if($result->num_rows>0)
  {
      echo "<script> alert('VoterId or Email has already taken');</script>";

  }
  else{
      if($password == $confirmpassword){
         $sql = "INSERT INTO tbl_users (`fullname`, `gender`,`email`, `voterId`, `password`,`confirmpassword`) VALUES ('$fullname','$gender','$email','$voterId','$password','$confirmpassword')";
         $res = $con->query($sql);   
         echo "<script> alert('Registration successful'); </script>";
         header("Location: home.php");

  }
      else{
          echo "<script> alert('Password does not match');</script>";
      }
  }
  $con->close();
}
?>



<html>
<head>
  <title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<Style>
  .container{
    width: 450px;
    height: 750px;
    background: ofwhite;
    box-shadow: 0 10px 15px rgba(180, 180, 180, 0.8);
    position: absolute;
    top: 16%;
    left: 38%;
    transform: translate(-15%, -15%);
    border-radius: 10px;
    display:flex;
    flex-direction: column;
    justify-content: space-evenly;
    padding:1rem;
            }

            body {
            background-image: url('userregistration.jpg');
            background-size: cover;
            margin: 10px;
          }
</Style> 

<body >
<center><br><h1><b><u><i><font color="black" size="7px">Registration Form</i></u><b></h1></font><br><br><br>
<div class="container"> 
  <form action=" # " method="post">
 

<!-- <label for="fname">Full Name</label><br> -->
<input type="text" id="fullname" name="fullname" placeholder="Enter Full name" value=<?php echo $fullname ?>>
<span class="error"><?php echo $fullname_error; ?></span><br>

<!-- <label for="gender">Gender</label><br> -->
<select id="gender" name="gender">
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  <option value="Other">Other</option>
</select><br>
<br>

<!-- <label for="mail">Email</label><br> -->
<input type="text" id="email" name="email" placeholder="Enter Email" value=<?php echo $email ?>>
<span class="error"><?php echo $email_error; ?></span><br>

<!-- <label for="voterId">Voter Id</label><br> -->
<input type="text" id="voterId" name="voterId" placeholder="Enter Voter id" value=<?php echo $voterId ?>>
<span class="error"><?php echo $voterId_error; ?></span><br>

<!-- <label for="password">Password</label><br> -->
<input type="text" id="password" name="password" placeholder="Enter password" value=<?php echo $password ?>>
<span class="error"><?php echo $password_error; ?></span><br>

<!-- <label for="cPass">Confirm Password</label><br> -->
<input type="text" id="confirmpassword" name="confirmpassword" placeholder="Confirm password" value=<?php echo $confirmpassword ?>>
<span class="error"><?php echo $confirmpassword_error; ?></span><br>

<input type="submit" name="submit" value="Submit">

</form>

</div>
</center>
</body>
</html>