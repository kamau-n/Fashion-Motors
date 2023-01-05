<?php


session_start();

include("connection.php");





if (!isset($_SESSION['email'])) {
    header("location:index.php");
}


// the process of booking a class in the gym;


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $user_id = $_SESSION['id'];
    $amount = 500;
    $class_id = $_POST["to_book"];


    ///Saving the data into the Database;

    $sql = "INSERT INTO Enrolled (class_id,user_id,amount) VALUES('$class_id','$user_id','$amount')";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
           alert('Class registration sucessful');
           window.location.href='portal.php';



           
          </script>";;
    } else {
        echo "<script>
            alert('class registration unsucessful');

            </script>";;
        echo $conn->error;
    }
}






include("connection.php");
// Quering the classes which are available

$sql1 = 'SELECT * FROM Listings';

$result = $conn->query($sql1);

// output data of each row






?>




<!DOCTYPE html>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">


    <title>Listings</title>
</head>


<body>
    <h4>Available listings</h4>



    <div class="cars">
        <?php


        while ($row = $result->fetch_assoc()) {
            $pid = $row['id'];
            $sql5 = "SELECT * FROM images WHERE postID ='$pid'";
            $result5 = $conn->query($sql5);
            $row2 = $result5->fetch_assoc();
            $image =  $row2['file_name'];


        ?>

            <div class="cars-data">
                <div class="cars-img">
                    <img src="<?php echo './uploads/' . $image ?>" alt="No Image">
                </div>
                <div>
                    <h2>Name: <?php echo $row['Title']  ?></h2>
                    <h4>Make: <?php echo $row['Make']  ?></h4>
                    <h4>Nodel: <?php echo $row['Model']  ?></h4>
                    <h4>YOM: <?php echo $row['Year']  ?></h4>
                    <h4>Price: <?php echo $row['Price']  ?></h4>
                </div>

            </div>


        <?php


        }
        ?>


    </div>
    <div class="links">
        <a href="portal.php">Back Home</a>
    </div>



</body>


</html>