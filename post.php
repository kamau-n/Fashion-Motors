<?php


// Include the database configuration file 
include_once 'connection.php';

session_start();

if (isset($_POST['submit'])) {

    // File upload configuration 
    $targetDir = "uploads/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $make = $_POST['make'];
    $model = $_POST['model'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    //first insert the data into a database;
    $last_id = '';




    if (!empty($fileNames)) {
        $user_id = $_SESSION['id'];
        // echo $user_id;
        $sql = "INSERT INTO Listings (UserID,Title,Description,Make,Model,Year,Price)  VALUES('$user_id' , '$name' , '$description' , '$make' , ' $model' , '$year' , '$price')";
        $insert1 = $conn->query($sql);
        if ($insert1) {
            $last_id = mysqli_insert_id($conn);

            $statusMsg = "Files are uploaded successfully." . $errorMsg;
            // echo "successfully uploaded to database";

            foreach ($_FILES['files']['name'] as $key => $val) {
                // File upload path 
                $fileName = basename($_FILES['files']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;
                // echo $fileName;

                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                        // Image db insert sql 
                        $insertValuesSQL .= "('" . $fileName . "," . $last_id . "', NOW()), ";

                        $sql2 = ("INSERT INTO images (file_name,postID) VALUES ('$fileName','$last_id')");
                        $insert = $conn->query($sql2);
                        //echo $last_id;
                        if ($insert) {
                            $statusMsg = "Files are uploaded successfully." . $errorMsg;
                        } else {
                            $statusMsg = "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
                }
            }

            echo "
            <script>
            alert('post made successfully')
            </script>
            
            ";
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
            "echo there was an error in uploading the images";
        }




        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
    } else {
        echo "
        <script>
        alert('No images have been selected')

        </script>
        
        ";
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
    <title>post</title>
</head>

<body>


    <form action="" method="post" enctype="multipart/form-data" class="list">
        <div>
            <h3>Fill in the form</h3>
        </div>
        <div class="labels">Enter the name of the car</div>
        <div> <input type="text" name="name"> </div>
        <div class="labels">Enter the make of the car</div>

        <div> <input type="text" name="make"> </div>
        <div class="labels">Enter the model of the car</div>
        <div> <input type="text" name="model"> </div>
        <div class="labels">Enter the make year of the car</div>
        <div> <input type="year" name="year"> </div>
        <div class="labels">Enter a brief description of the car</div>
        <div> <textarea name="description"></textarea></div>
        <div class="labels">Enter the price of the car</div>
        <div> <input type="number" name="price" id="price" row='10' columns="100"> </div>

        <div> Select Image Files to Upload:</div>
        <input type="file" name="files[]" multiple>
        <div> <input type="submit" name="submit" value="UPLOAD"> </div>
    </form>

    <div class="links">
        <a href="portal.php">Back Home</a>
    </div>
</body>

</html>
