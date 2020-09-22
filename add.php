<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<body>
    <?php 
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            require 'connection.php';
            // Creating / selecting database
            $db=$conn->todo;

            // Create / select collection
            $collection=$db->mytodo;

            // include 'header.php';

            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            if ($category=="") {
                $category="No Category";
            }
            // Insert document in collection
            $collection->insertOne(["title"=>$title, "description"=>$description, "category"=>$category, "completed"=>0]);

            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
            // Reference : https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working/21226707
        }
    ?>
</body>
</html>