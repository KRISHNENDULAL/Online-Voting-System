<!DOCTYPE html>
<html>
<head>
    <title>Voter Login Page</title>
</head>
<style>
 .container {
    width: 300px;
    height: 250px;
    background:  #DFD7D5;
    box-shadow: 0 10px 15px rgba(179, 99, 79, 0.7);
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    padding: 1rem;
}

body {
    background-image: url('voter login.png');
    background-size: cover;
    margin: 10px;
}
</style> 
<body> 
    <center><br><br><br>
        <h1><b><u><font color="brown" size="7px">Voter Login</font></u></b></h1><br><br>
        <div class="container"> 
            <form action="#" method="post">
                <label for="Voter Id">Voter Id</label><br>
                <input style="padding: 15px; margin: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;" type="text" id="voterId" name="voterId" placeholder="Enter voterId" required><br><br>

                <label for="password">Password</label><br>
                <input style="padding: 15px; margin-bottom: 26px; border: 1px solid #ccc; border-radius: 5px;" type="password" id="password" name="password" placeholder="Enter password" required><br>
                <input type="submit" name="login" value="Login">
                <br><br>
            </form>
        </div>
    </center>
</body>
</html>

<?php
session_start(); // Start the session

include "db_connection.php";

if (isset($_POST['login'])) {
    $voterId = $_POST['voterId'];
    $password = $_POST['password'];
    $_SESSION['voter']=$voterId;
    // Security Improvement: Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM tbl_users WHERE voterId = ?");
    $stmt->bind_param("s", $voterId);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            $_SESSION['login'] = true;
            header("Location: userpage.php"); // Redirect to the user's dashboard or home page
            exit;
        } else {
            echo "<script> alert('Wrong Password');</script>";
        }
    } else {
        echo "<script> alert('User not registered');</script>";
    }
    $stmt->close();
    $con->close();
}
?>