<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

?>


<?php


include("connection.php");
include("functions.php");



//$errors = array('username'=>NULL,'password'=>NULL,'email'=>NULL,'address'=>NULL,'exists'=>NULL);
$errors = array();



//var_dump(isset($errors["password"]));

// to check if a person has clicked the submit button

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $filename = $_FILES["dp"]['name'];
    $tmp_name  = $_FILES['dp']['tmp_name'];
    $folder =  "Uploads/" . $filename;






    if (check_empty($_FILES['dp'])) {
        $dp_link = $filename;
    } else {
        $error["image"] = "The Picture has not been selected";
    }

    if (check_empty($_POST['fname'])) {
        $r_fname = $_POST["fname"];
    } else {
        $errors['fname'] = "firstname is  empty";
    }

    if (check_empty($_POST['lname'])) {
        $r_lname = $_POST["lname"];
    } else {
        $errors['lname'] = "lastname is  empty";
    }



    if (check_empty($_POST['email']) and validate_email($_POST['email'])) {
        $r_email = $_POST["email"];
    } else {
        $errors['email'] = "email is empty/invalid";
    }

    if (check_empty($_POST['password'])) {
        $r_password = $_POST["password"];
    } else {
        $errors['password'] = "password empty/weak";
    }


    //checking if email exists

    $sql2= "SELECT * FROM Users WHERE Email ='$r_email'";
    $exists = $conn->query($sql2);

   
if ($exists->num_rows > 0) {
   $errors['exists'] = "The Email Has already been Registered";
}










    if (empty($errors)) {
        $h_pass = hashes($r_password);

        $sql = "INSERT INTO Users (FirstName,LastName,Email,Password) VALUES('$r_fname','$r_lname','$r_email','$h_pass');";

        if ($conn->query($sql) === TRUE) {

            echo "<script>
               alert('Account  registration sucessful');
               window.location.href='index.php';
              </script>";;
        } else {
            echo "<script>
                alert('account  registration unsucessful');

                </script>";;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="index.css">
    <style>

    </style>
</head>

<body>
    <div class="form">
        <form method="post" action="" enctype="multipart/form-data">
            <h2>REGISTER </h2>
            <div class="errors">
                <?php echo $errors['exists']  ?>
            </div>

            <input type="text" name="fname" placeholder="Enter Firstname Here">
            <div class="errors">
                <?php echo $errors['fname']  ?>
            </div>
            <input type="text" name="lname" placeholder="Enter Lastname Here">
            <div class="errors">
                <?php echo $errors['lname']  ?>
            </div>


            <input type="email" name="email" placeholder="Enter Email Here">
            <div class="errors">
                <?php echo $errors['email']  ?>
            </div>


            <input type="text" name="password" placeholder="Enter your password here">
            <div class="errors">
                <?php echo $errors['password']  ?>
            </div>




            <button type="submit" class="btnn">REGISTER </button>
            <div class="red">
                <a href="index.php">already have an account</a>
            </div>
        </form>
    </div>



</body>

</html>
