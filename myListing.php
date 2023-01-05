<?php


session_start();

include("connection.php");





if (!isset($_SESSION['email'])) {
    header("location:index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['id'];
    $post_id = $_POST['to_delete'];

    $sql = "DELETE FROM Listings WHERE id ='$post_id'";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
           alert('Post removed sucessfully');
         



           
          </script>";;
    } else {
        echo "<script>
            alert('post was not removed');

            </script>";;
        echo $conn->error;
    }
}






include("connection.php");
// Quering the classes which are available
$user_id = $_SESSION['id'];

$sql1 = "SELECT * FROM Listings WHERE UserID='$user_id' ";

$result = $conn->query($sql1);

// output data of each row






?>




<!DOCTYPE html>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">


    <title>My Listings</title>
</head>

<body>
    <h4>My Listings</h4>



    <div class="cars">
        <?php
        if ($result->num_rows > 0) {

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
                        <form action="" method="POST">
                            <h2>Name: <?php echo $row['Title']  ?></h2>
                            <h4>Make: <?php echo $row['Make']  ?></h4>
                            <h4>Nodel: <?php echo $row['Model']  ?></h4>
                            <h4>YOM: <?php echo $row['Year']  ?></h4>
                            <h4>Price: <?php echo $row['Price']  ?></h4>
                            <button name="to_delete" value="<?php echo $row['id'] ?>">Delete Post</button>
                        </form>
                    </div>

                </div>





            <?php



            }
            ?>
            <div class="links">
                <a href="portal.php">Back Home</a>
            </div>


        <?php  } else {

        ?>

    </div>

    <div class="links">
        <a href="portal.php">Back Home</a>
    </div>



</body>

<?php {

?>


    <div class="notification">
        <h3>Notification</h3>
        <p>The is No Post which has been Made</p>
    </div>

    <?php
    ?>


    <div class="links">
        <a href="portal.php">Back Home</a>
    </div>

<?php  } ?>

</body>
<?php }
?>

</html>