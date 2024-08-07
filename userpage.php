<head>
<title>Voting Page</title>
    <style>
        
        ul {
            list-style-type: none;
            margin: 0;
            padding: 10px;
        }

        li {
            float: right;
            margin-right: 10px;
            font-size:20px;
        }

        li a {
            display: block;
            color: black;
            text-decoration: none;
            padding: 10px;
        }

        body {
            background-image: url('userpage.jpg');
            background-size: cover;
            margin: 0;
        }

        h1 {
            color: brown;
            font-size:60px;
        }
        h2 {
          color: #4A235A ;
          font-size:25px;
        }
        input[type=submit] {
        font-size:20px;
        width: 8%;
        background-color: #000000 ;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }
        input[type=submit]:hover {
        background-color: #959190;
        }

    </style>
</head>

<body>
<ul>
    <li><strong><a href="home.php">Logout</a></strong></li>
</ul>

<center>
<div> 
  <form action="#" method="post">
    <h1 font-size:60px><b><u><i>VOTE HERE</i></u></b></h1>
    <h2>Choose your Candidate</h2><br>

    <!-- <label for="party">Party</label><br> -->
    <input type="radio" id="party" name="party" value="UDF">
    <label for="UDF"><b style="font-size:25px">UDF</b></label><br><br><br>
    <input type="radio" id="party" name="party" value="BJP">
    <label for="BJP"><b style="font-size:25px">BJP</b></label><br><br><br>
    <input type="radio" id="party" name="party" value="CPM">
    <label for="CPM"><b style="font-size:25px">CPM</b></label><br><br><br>

    <input style="background-color: black" type="submit" name="submit" value="Submit">
  </form>
</div>
</center>

<?php
include "db_connection.php";
session_start();
if(isset($_POST['submit'])){
  $party = $_POST['party'];  
  $voter=$_SESSION['voter'];
  $sql = "UPDATE `tbl_users` SET `votedfor`='$party' WHERE `voterId` = '$voter'";
  $res = $con->query($sql);
  header("Location: home.php");
}
  $con->close();
?>

</body>
</html>
