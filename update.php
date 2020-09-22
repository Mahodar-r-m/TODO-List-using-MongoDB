<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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

            $id = $_POST['id'];
            $oldTitle = $_POST['oldTitle'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];

            $checking = $collection->find();
            // var_dump($checking);
            foreach ($checking as $c) {
                if ($c['_id']==$id) {
                    $updateResult = $collection->updateOne(["title"=>$oldTitle], ['$set'=>["title"=>$title, "description"=>$description, "category"=>$category]]);
                    $count = $updateResult->getModifiedCount();
                }
            }

            // Insert document in collection
            // $collection->updateOne(["title"=>$title, "description"=>$description, "category"=>$category, "completed"=>0]);
            // $collection->updateOne(["title"=>$c['title']], ['$set'=>["completed"=>1]]);
        ?>
            <script type='text/javascript'> document.location ='index.php?update=<?php echo $count; ?>'</script>
        <?php
            // Reference : https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working/21226707
        }
    ?>
</body>
</html>