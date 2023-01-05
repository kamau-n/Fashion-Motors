<?php


$errors = array('email' => '', 'password' => '', 'not-exists' => '');
$usernames = $passwords = "";
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST['email']) and empty($_POST['password'])) {



        $errors['email'] = "email is empty";
        $errors['password'] = "password is empty";
    } else {



        $email = $_POST["email"];
        $password = $_POST["password"];




        $sql7 = "
select *
from Users
where Email='$email';

";
        $result = $conn->query($sql7);


        //
        if ($result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                    //comparing the passwords
                ;
                $verification = password_verify($password, $row["Password"]);

                if ($verification) {

                    session_start();
                    //setcookie("username",'$row["username"]',4500000);

                    $_SESSION["fname"] = $row["FirstName"];
                    $_SESSION["lname"] = $row["LastName"];
                    $_SESSION["email"] = $row["Email"];
                    $_SESSION["id"] = $row["id"];

                    header("Location: portal.php");
                } else {

                    $errors['password'] = "passwords is incorrect";
                }
            }
        } else {
            $errors['not-exists'] = "user does not exist";
        }
        $conn->close();
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>


    <div class="form">
        <form method="post" action="">
            <h2>WELCOME TO FASHION MOTORS</h2>
            <h3 class="heading">Login Below</h3>
            <div class="errors">
                <?php echo $errors['not-exists']  ?>
            </div>

            <input type="" name="email" placeholder="Enter Email Here">
            <div class="errors">
                <?php echo $errors['email']  ?>
            </div>


            <input type="password" name="password" placeholder="Enter Password Here">
            <div class="errors">
                <?php echo $errors['password']  ?>
            </div>
            <button type="submit" class="btnn">LOGIN </button>
            <div class="red">
                <a href="register.php">create an account</a>
            </div>


        </form>
    </div>




</body>

</html>