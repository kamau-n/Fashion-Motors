<?php

session_start();
include("connection.php");
include("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $id = $_SESSION['id'];



    if (check_empty($_POST['fname'])) {
        $fname = $_POST["fname"];
    } else {
        $fname = $_SESSION["fname"];
    }

    if (check_empty($_POST['lname'])) {
        $lname = $_POST["lname"];
    } else {
        $lname = $_SESSION["lname"];
    }

    if (check_empty($_POST['email'])) {
        $email = $_POST["email"];
    } else {
        $email = $_SESSION["email"];
    }

    if (check_empty($_POST['password'])) {
        $password = $_POST["password"];
    } else {
        $password = 1234;
    }
    $h_pass = hashes($password);

    $sql = "UPDATE Users SET FirstName='$fname' , LastName ='$lname' , Email ='$email',  Password ='$h_pass' WHERE id ='$id'";

    if ($conn->query($sql)) {
        echo "
        <script>
               alert('Details upadated Successfully') 
               windows.href('portal.php')
        </script>
        ";
    } else {
        echo $conn->error;
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="" class="list">
        <h2>EDIT PROFILE </h2>
        <div>
            <input type="text" name="fname" placeholder="<?php echo $_SESSION['fname'] ?>">

        </div>


        <div>
            <input type="text" name="lname" placeholder="<?php echo $_SESSION['lname'] ?>">

        </div>

        <div>
            <input type="text" name="email" placeholder="<?php echo $_SESSION['email'] ?>">



        </div>
        <div>
            <input type="text" name="password" placeholder=1234>

        </div>
        <button type="submit" class="btnn">Save Changes </button>
    </form>




</body>

</html>