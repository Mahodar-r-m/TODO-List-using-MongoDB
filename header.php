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
        .heading{
            font-family: Impact, Charcoal, sans-serif;
            font-size: 45px;
            color: #9370DB;
            transition: color 0.6s;
        }
        .heading:hover{
            color: #6533cb;
        }
        .navbar{
            height: 104px;
            width: 100%;
        }
        .add{
            font-family: Impact, Charcoal, sans-serif;
            font-size: 45px;
            color: #6533cb;
        }
        .addt{
            visibility: hidden;
            border-radius: 50px 0 0 50px;
            margin-left: 17px;
        }
        .plus{
            border-radius: 50px;
            padding: 10px;
        }
        .addBg{
            background: #F5BCBA;
        }
        .add:hover > .addt {
            visibility: visible;
            border-radius: 50px 0 0 50px;
            padding: 3px 5px 7px 12px;
            margin-left: 0;
            color: #6533cb;
            transition: 0.2s;
        }
        .add:hover > .plus {
            border-radius: 0 50px 50px 0;
            /* Reference : https://www.bitdegree.org/learn/css-border-radius#:~:text=Syntax%20for%20CSS%20border%2Dradius,-The%20syntax%20for&text=All%20four%20corners%20are%20modified%20in%20the%20same%20manner.&text=border%2Dradius%3A%203px%206px%3B,and%20the%20bottom%20left%20corners. */
            color: #6533cb;
            transition: 0.5s;            
        }
        .required{
            visibility: hidden;
        }
        .active-purple-2 input.form-control[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #6533cb;
        box-shadow: 0 1px 0 0 #6533cb;
        }
        .active-purple input.form-control[type=text] {
        border-bottom: 1px solid #ce93d8;
        box-shadow: 0 1px 0 0 #ce93d8;
        }
        .active-purple .fas, .active-purple-2 .fas {
        color: #6533cb;
        }
        .btnd{
            color: #DAE0E2;
            background: #6f42c1;
            border-radius: 30px;
            font-size: 15px;
            transition: 1s;
        }
        .btnd:hover{
            color: #EAF0F1;
            background: #6533cb;
            border-radius: 30px 30px 3px 3px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <script>
        $( document ).ready(function() {
        new WOW().init();
        });
    </script>
    <div>
        <nav class="navbar">
            <ul class="list-unstyled list-inline">
                <li class="animated flipInX list-inline-item">
                    <img id="logo" src="todo_logo.png" alt="TODO Logo" height="85" width="85">
                </li>
                <li class="animated flipInY slow delay-1s align-middle list-inline-item">
                    <a href="./" class="heading">TODO LIST</a>
                </li>
            </ul>
            
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php 
                require 'connection.php';

                // Creating / selecting database
                $db=$conn->todo;
            
                // Create / select collection
                $collection=$db->mytodo;

                // Calculating unique values of category
                $category = $collection->distinct('category');
                // Reference : https://docs.mongodb.com/php-library/v1.2/reference/method/MongoDBCollection-distinct/
            ?>

            <!-- Category wise filter -->
            <div class="dropdown mb-3">
            <select onchange='category()' class="animated flipInX slow delay-2s btn btnd dropdown-toggle" name="category" id="category">
                <option value="all">All (Category)</option>
                <?php 
                    foreach ($category as $cat) {
                        ?>
                        <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
                        <?php
                    }
                ?>
                
            </select>
            </div>

            <!-- Search form -->
            <div class="animated flipInX slower delay-2s form-inline d-flex flex-row justify-content-center md-form form-sm active-purple active-purple-2 mt-2">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input style="font-size:15;" id="search_text" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
                <!-- <div><a href="./" id="reset"></a></div> -->
            </div>
            <!-- Reference : https://mdbootstrap.com/docs/jquery/forms/search/ -->

            <div class="animated bounceInLeft slow delay-2s align-middle mb-3">
                <a href="" class="add" data-toggle="modal" data-target="#modalLoginForm"><span class="addt addBg">ADD TASK</span><i class="addBg plus fa fa-plus-circle"></i>
                </a>
            </div>
        </nav>
    </div>
    

    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header text-center" style="background:#9d7ede;">
            <h4 class="modal-title w-100 font-weight-bold text-white">NEW TASK</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="add.php" method="post" style="background:#fbe4e3;">
        <div class="modal-body mx-3">
            <div class="md-form mb-5">
            <label class="text-danger" data-error="wrong" data-success="right" for="defaultForm-req">Required*</label>
            <input type="text" class="required">
            </div>

            <div class="md-form mb-4">
            <!-- <i class="fas fa-envelope prefix grey-text"></i> -->
            <i class="fa fa-check prefix grey-text"></i>
            <input name="title" type="text" id="defaultForm-title" class="form-control validate" required>
            <label data-error="wrong" data-success="right" for="defaultForm-title">Title<span class="text-danger">*</span></label>
            </div>

            <div class="md-form mb-3">
            <!-- <i class="fas fa-lock prefix grey-text"></i> -->
            <i class='far fa-comment-alt prefix grey-text'></i>
            <textarea style="border-top: 1px white;border-left: 1px white;border-right: 1px white;" name="description" type="text" id="defaultForm-desc" class="form-control validate"></textarea>
            <label data-error="wrong" data-success="right" for="defaultForm-desc">Description</label>
            </div>

            <div class="md-form mb-2">
            <!-- <i class='far fa-comment-alt prefix grey-  text'></i> -->
            <i class="fa fa-list-alt prefix grey-text"></i>
            <input name="category" type="text" id="defaultForm-catg" class="form-control validate">
            <label data-error="wrong" data-success="right" for="defaultForm-catg">Category</label>
            </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button style="font-size:17px;" class="btn btn-secondary submit">Add Task</button>
        </div>
        </form>    
        </div>
    </div>
    </div>
    


    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript">
        // Reference : https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_onchange
        function category(){
            var search = document.getElementById("category").value;
            // window.alert("Category : "+search);
            $.ajax({
                url:'categorySort.php',
                method:'post',
                data:{query:search},
                success:function(response){
                    $("#table-data").html(response);
                }
            })
        }
    </script>

</body>
</html>