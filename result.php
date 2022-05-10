<?php



require_once('connectvars.php');
require_once('startsession.php');
require_once('nav.php');

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysqli_select_db($con, DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());
if (!isset($_SESSION['id'])) {
    echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
    exit();
}
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/my.css" type="text/css">

<body>
    <style>
        #books .row {
            margin-top: 30px;
            font-weight: 800;
        }

        @media only screen and (max-width: 760px) {
            #books .row {
                margin-top: 10px;
            }
        }

        .book-block {
            margin-top: 20px;
            margin-bottom: 10px;
            padding: 10px 10px 10px 10px;
            border: 1px solid #DEEAEE;
            border-radius: 10px;
            height: 100%;
        }
    </style>

    </head>

    <body>
        <br><br><b><br>


            <div id="top">
                <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%; background:black;">
                    <div>
                        <form role="search" method="POST" action="result.php">
                            <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Search for a Book , Author Or Category">
                        </form>
                    </div>
                </div>
                <?php

                $keyword = $_POST['keyword'];

                $query = "select * from products  where PID like '%{$keyword}%' OR Title like '%{$keyword}%' OR Author like '%{$keyword}%' OR Publisher like '%{$keyword}%' OR Category like '%{$keyword}%'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));;

                $i = 0;
                echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h4 style="color:black;text-transform:uppercase;"> found  ' . mysqli_num_rows($result) . ' records </h4>
           </div>
        </div>';
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $path = "images/" . $row['PID'];
                        $description = "description.php?ID=" . $row["PID"];
                        if ($i % 3 == 0)  $offset = 0;
                        else  $offset = 1;
                        if ($i % 3 == 0)
                            echo '<div class="row">';
                        echo '
               <a href="' . $description . '">
                <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-' . $offset . ' col-lg-3 text-center w3-card-8 w3-dark-grey">
                    <div class="book-block">
                        <img class="book block-center img-responsive" src="' . $path . '">
                        <hr>
                         ' . $row["Title"] . '<br>
                        ' . $row["Price"] . '  &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> ' . $row["MRP"] . ' </span>
                        <span class="label label-warning">' . $row["Discount"] . '%</span>
                    </div>
                </div>
                
               </a> ';
                        $i++;
                        if ($i % 3 == 0)
                            echo '</div>';
                    }
                }
                echo '</div>';

                ?>




    </body>

</html>