<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <?php 

        require 'connection.php';
        // Creating / selecting database
        $db=$conn->todo;

        // Create / select collection
        $collection=$db->mytodo;

        include 'header.php';

        $id = $_GET['deleteId'];
        $title = $_GET['title'];

        $checking = $collection->find();
        // var_dump($checking);
        foreach ($checking as $c) {
            if ($c['_id']==$id) {
                $deleteResult = $collection->deleteOne(["title"=>$title]);
                $count = $deleteResult->getDeletedCount();
                break;
                // $collection->deleteOne(['_id' =>new MongoDB\BSON\ObjectID($id)]); 
            }
        }
        
                // $deleteResult = $collection->deleteOne(["name"=>"Autodice Student"]);
                // echo "Deleted ".$deleteResult->getDeletedCount()." documents\n";
        ?>
        <script type='text/javascript'> document.location ='index.php?delete=<?php echo $count; ?>'</script>
        <?php
        // Reference : https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working/21226707

    ?>
</body>
</html>