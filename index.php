<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        .tdone{
            font-size: 25px;
            color: #26ae60;
            position: relative;
            top: -7px;
            left: 10px;
            font-weight: bolder;
            /* visibility: hidden; */
        }
        .tnotdone{
            font-size: 25px;
            color: red;
            position: relative;
            top: -7px;
            left: 10px;
            font-weight: bolder;
        }
        .regular-checkbox {
            width: 35px;
            height: 35px;
            -webkit-appearance: none;
            background-color: #fafafa;
            border: 1px solid #cacece;
            box-shadow: 0 1px 2px rgba(0,0,0,0.35), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
            padding: 9px;
            border-radius: 30px;
            display: inline-block;
            position: relative;
        }
        .regular-checkbox:active, .regular-checkbox:checked:active {
            box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
        }

        .regular-checkbox:checked {
            background-color: #ce93d8;
            border: 1px solid #adb8c0;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
            color: #019031;
        }
        .regular-checkbox:checked:after {
            content: '\2714';
            font-size: 14px;
            position: absolute;
            top: -13px;
            left: 0px;
            color: #6533cb;
        }
        .big-checkbox {
            padding: 18px;
        }

        .big-checkbox:checked:after {
            font-size: 40px;
            left: 1px;
        }
        /* Reference : https://www.inserthtml.com/2012/06/custom-form-radio-checkbox/ */
        /* Total Reference : https://stackoverflow.com/questions/4148499/how-to-style-a-checkbox-using-css */
        .content{
            font-size: 24px;
        }
        .description{
            table-layout: fixed; 
            text-overflow: ellipsis; 
            overflow: hidden; 
            white-space: nowrap;
            max-width: 900px;
        }
        .title{
            table-layout: fixed;
            white-space: nowrap;
            max-width: 25%;
        }
        .alertU {
        padding: 20px;
        width: 300px;
        background-color: #f0ad4e;
        color: white;
        position: absolute;
        top: -535px;
        left: 77%;
        }

        .alertD {
        padding: 20px;
        width: 300px;
        background-color: #f44336;
        color: white;
        position: absolute;
        top: -530px;
        left: 77%;
        }

        .closebtn {
        margin-left: 5px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

        .closebtn:hover {
        color: black;
        }
        .table-hover:hover{
            background: #F5BCBA;
            transition: all 0.5s;
        }
        .onlyIcon{
            color: #ce93d8;
        }
        .onlyIcon:hover{
            color: #6533cb;
        }
        .icon:hover{
            color: #6533cb;
        }
    </style>
    
    <script src="scripts.js"></script>
</head>
<body>

<?php 
    require 'connection.php';

    // Creating / selecting database
    $db=$conn->todo;

    // Create / select collection
    $collection=$db->mytodo;

    include 'header.php';
    
    // // Creating / selecting database
    // $db=$conn->todo;

    // // Create / select collection
    // $collection=$db->mytodo;

    // Insert document in collection
    // $collection->insertOne(["name"=>"Student1","surname"=>"surname1"]);
    
    // Update document in collection
    // $collection->updateMany(["name"=>"Student1"],['$set'=>["name"=>"Autodice Student"]]);

    // Delete / Remove document in collection
    // $deleteResult = $collection->deleteOne(["name"=>"Autodice Student"]);
    // echo "Deleted ".$deleteResult->getDeletedCount()." documents\n";

    // // Display data from database
    ?>
    
    <?php
    $cursor = $collection->find([],['sort' => ["completed"=>1,"_id"=>-1]]);
    // Reference : https://stackoverflow.com/questions/28247915/how-to-output-a-collection-of-data-from-mongodb-sort-by-date/28248448#:~:text=%24cursor%20%3D%20%24collection%2D%3Efind%20()%2D%3Esort(,to%20use%20the%20aggregation%20framework.&text=You%20can%20use%20the%20_id,print%20the%20latest%2010%20records.
    ?>
    <table style="width: 99%" align="center" class='table' id="table-data">
        <thead class="thead animated shake slow delay-3s" style="background: #9370DB;">
            <tr>
                <td></td>
                <td class="content">TITLE</td>
                <td class="content">DESCRIPTION</td>
            </tr>
        </thead>
    <?php
    foreach ($cursor as $document){
        ?>
        <tbody class="animated bounceInDown slow delay-3s">
        <tr class="table-bordered table-hover">
            <td align="center"><input <?php if($document['completed']==1){echo 'checked';} ?> type="checkbox" onclick="myFunction('<?php echo $document['_id']; ?>')" class="regular-checkbox big-checkbox"></td>
            <td class="icon content title"><a data-toggle="modal" data-target="#modalDetails<?php echo $document['_id']; ?>"><i class="onlyIcon fa fa-info-circle"></i>&nbsp;<?php echo $document["title"]; ?></a></td>
            <td class="content description"><?php echo $document["description"]; ?></td>
        </tr>
        </tbody>
            <!-- Reference : https://stackoverflow.com/questions/34693863/pass-php-variable-to-bootstrap-modal/34695333 -->
            <!-- Reference : https://stackoverflow.com/questions/486563/overflowhidden-dots-at-the-end#:~:text=10%20Answers&text=You%20can%20use%20text%2Doverflow,Here's%20a%20demo%20on%20jsbin.&text=Try%20this%20if%20you%20want,lines%20the%20dots%20will%20appear. -->
            <!-- Reference : https://stackoverflow.com/questions/509711/why-does-overflowhidden-not-work-in-a-td#:~:text=Apply%20CSS%20table%2Dlayout%3Afixed,correct%20cell%20or%20column%20elements. -->
        
    
    <!-- Refer for more offcial docs : https://docs.mongodb.com/php-library/v1.2/reference/method/MongoDBCollection-deleteOne/ -->

        <!-- Detailed information modal -->
        <div class="modal fade" id="modalDetails<?php echo $document['_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background:#fbe4e3;">
        <div class="modal-header text-center" style="background:#9d7ede;">
            <h4 class="modal-title w-100 font-weight-bold text-white">TASK DETAILS</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="update.php" method="post">
        <div class="modal-body mx-3" style="background:#fbe4e3;">
            <div class="md-form mb-5">
            <!-- <label class="text-danger" data-error="wrong" data-success="right" for="defaultForm-req">Required*</label> -->
                <input <?php if($document['completed']==1){echo 'checked';} ?> type='checkbox' onclick="myFunction('<?php echo $document['_id']; ?>')" class="regular-checkbox big-checkbox">
                <?php 
                    if($document['completed']==1){
                        echo "<span class='tdone'>";
                        echo "Task Completed";
                        echo "</span>"; 
                    }else{ 
                        echo "<span class='tnotdone'>"; 
                        echo "Task Incomplete";
                        echo "</span>";
                    }
                ?> 
                <input style="visibility: hidden;" name="id" type="text" value="<?php echo $document['_id']; ?>">
                <input style="visibility: hidden;" name="oldTitle" type="text" value="<?php echo $document['title']; ?>">
            </div>

            <div class="md-form mb-4">
            <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
            <i class="fa fa-check prefix grey-text"></i>
            <input name="title" type="text" id="defaultForm-title" class="form-control validate" required value="<?php echo $document["title"]; ?>">
            <label data-error="wrong" data-success="right" for="defaultForm-title">Title<span class="text-danger">*</span></label>
            </div>

            <div class="md-form mb-3">
            <!-- <i class="fas fa-lock prefix grey-text"></i> -->
            <i class='far fa-comment-alt prefix grey-text'></i>
            
            <!-- <input name="description" type="text" id="defaultForm-desc" class="form-control validate descriptionInfo" value="<?php //echo $document["description"]; ?>"> -->
            <textarea rows="2" cols="50" style="border-top: 1px white;border-left: 1px white;border-right: 1px white;" name="description" type="text" id="defaultForm-desc" class="form-control validate descriptionInfo"><?php echo $document["description"]; ?>
            </textarea>
            <!-- Reference : https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_textarea_form -->
            <label data-error="wrong" data-success="right" for="defaultForm-desc">Description</label>
            </div>

            <div class="md-form mb-2">
            <!-- <i class='far fa-comment-alt prefix grey-  text'></i> -->
            <i class="fa fa-list-alt prefix grey-text"></i>
            <input name="category" type="text" id="defaultForm-catg" class="form-control validate" value="<?php echo $document["category"]; ?>">
            <label data-error="wrong" data-success="right" for="defaultForm-catg">Category</label>
            </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button style="font-size:17px;" class="btn btn-warning submit mr-5"><b>UPDATE</b></button></form> 
            <button style="font-size:17px;" data-toggle="modal" data-target="#myDeleteModal<?php echo $document['_id']; ?>" class="btn btn-danger submit ml-5"><b>DELETE</b></button>
        </div>
           
        </div>
    </div>
    </div>

    <!-- Delete alert Modal -->
    <div id="myDeleteModal<?php echo $document['_id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="background:#fbe4e3;">
        <div class="modal-header bg-danger">
            <h4 class="modal-title text-white font-weight-bold">Delete Alert</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="font-size:18px;">
            <p><b>Are you sure, you want to delete this task ?</b></p>
        </div>
        <div class="modal-footer">
            <!-- for passing 2 parameters in function :  -->
            <?php  
                $myId =  $document["_id"];
                $myTitle = $document["title"]; 

                // echo $myId;
                // echo $myTitle;
            ?>
            <!-- <button onclick="myFunction1()">Click me</button> -->
            <button style="font-size:17px;" onclick="myDelete('<?php echo $myId; ?>', '<?php echo $myTitle; ?>')" type="button" class="btn btn-danger mr-5"><b>Confirm Delete</b></button>

            <!-- <button type="button" class="btn btn-danger" onclick="myDelete('<?php //echo $document['_id'] ?>')">Confirm Delete</button> -->
            <button style="font-size:17px;" type="button" class="btn btn-default ml-2 mr-5" data-dismiss="modal"><b>Close</b></button>
            <!-- Reference: https://stackoverflow.com/questions/40827494/how-to-pass-two-php-variables-in-html-button-onclick-function -->
        </div>
        </div>

    </div>
    </div>

    <?php
    }
    ?>
    </table>
    
    
    <?php 
        if (isset($_GET['checkId'])) {
            $saveId = $_GET['checkId'];
            // echo $saveId;

            // $filter = array("_id"=>$saveId);
            $checking = $collection->find();
            // var_dump($checking);
            foreach ($checking as $c) {
                if ($c['_id']==$saveId) {

                    if ($c['completed']==0) {
                        $collection->updateOne(["title"=>$c['title']], ['$set'=>["completed"=>1]]);
                        // echo "Task Completed";
                    }else {
                        $collection->updateOne(["title"=>$c['title']], ['$set'=>["completed"=>0]]);
                        // echo "Task Incompleted";
                    }
                    ?>
                    <script> location.replace("./"); </script>
                    <?php
                }
                
            }

        }

        if (isset($_GET['update'])) {
            $count = $_GET['update'];
            ?>
            <!-- Reference : https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_alert -->
            <div class="animated bounceInRight alert alertU">
                <span id="dialog" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <?php echo $count; ?> Task(s) <strong> updated </strong> successfully.
            </div>

            <script>//window.location.href = "index.php";
            setTimeout(function () {
            // window.location.href = "./";
            }, 4000);
            // Reference : https://stackoverflow.com/questions/9877263/time-delayed-redirect
            </script>
            <?php
        }

        if (isset($_GET['delete'])) {
            $count = $_GET['delete'];
            ?>
            <!-- Reference : https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_alert -->
            <div class="animated bounceInRight alert alertD">
                <span id="dialog" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <?php echo $count; ?> Task(s) <strong> deleted </strong> successfully.
            </div>

            <script>//window.location.href = "index.php";
            setTimeout(function () {
            // window.location.href = "./";
            }, 4000);
            // Reference : https://stackoverflow.com/questions/9877263/time-delayed-redirect
            </script>
            <?php
        }
    ?>
    

    <!-- <p id="delete">Delete</p> -->
    <p id="demo"></p>
    <script>
    function myFunction(x) {
    var check = x;
    var isChecked = document.getElementById(x);

    // document.getElementById("demo").innerHTML = isChecked; // Not working
    // document.getElementById("demo").innerHTML = check; // Working

    window.location.href = "index.php?checkId="+check+"";
    // Reference : https://www.coderslexicon.com/the-basics-of-passing-values-from-javascript-to-php-and-back/#:~:text=On%20the%20JavaScript%20side%20the,through%20the%20array%20%24_POST).
    }
    </script>

    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>
</body>
</html>