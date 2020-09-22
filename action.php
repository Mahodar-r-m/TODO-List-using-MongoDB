<?php 
    require 'connection.php';

    // Creating / selecting database
    $db=$conn->todo;

    // Create / select collection
    $collection=$db->mytodo;

    if (isset($_POST['query'])) {
        $search=$_POST['query']; // We will get searched text here

        // Reference : https://stackoverflow.com/questions/3305561/how-to-query-mongodb-with-like
        // Reference : https://stackoverflow.com/questions/11250600/regex-mongodb-php-query
        // Reference : https://www.w3resource.com/mongodb/mongodb-regex-operators.php?passed=passed
    $filter = ['$or' =>[ ["title"=>['$regex'=>"^$search", '$options'=>'i'] ],["description"=>['$regex'=>"^$search", '$options'=>'i'] ] ] ];
    // $filter = ["title"=> ['$text'=>['$search'=>"$search"] ] ];
    $documents = $collection->find($filter,['sort' => ["completed"=>1,"_id"=>-1]]); // Reference - https://stackoverflow.com/questions/7451684/mongo-db-or-query-in-php/7451709

    ?>
    <table style="width: 99%" align="center" class='table' id="table-data">
        <thead class="thead" style="background: #9370DB;">
            <tr>
                <td></td>
                <td class="content">TITLE</td>
                <td class="content">DESCRIPTION</td>
            </tr>
        </thead>
    <?php
    if ($collection->count($filter)>0) { // Reference : https://stackoverflow.com/questions/23965996/count-mongodb-in-php#:~:text=First%20you%20need%20to%20tell,can%20call%20count()%20on.&text=You%20can%20simply%20convert%20your,count%20array%20records%20in%20php.
        foreach ($documents as $document){
        ?>
        <tr class="table-bordered table-hover">
            <td align="center"><input <?php if($document['completed']==1){echo 'checked';} ?> type="checkbox" onclick="myFunction('<?php echo $document['_id']; ?>')" class="regular-checkbox big-checkbox"></td>
            <td class="content title"><a data-toggle="modal" data-target="#modalDetails<?php echo $document['_id']; ?>"><i class="text-secondary fa fa-info-circle"></i>&nbsp;<?php echo $document["title"]; ?></a></td>
            <td class="content description"><?php echo $document["description"]; ?></td>
        </tr>
    <?php
        }
    }else{
        // $documents = $collection->find([],['sort' => ["completed"=>1,"_id"=>-1]]);
        echo "<h3 style='margin:10px;' align='center'>No Match Found</h3>";
    }
}

?>