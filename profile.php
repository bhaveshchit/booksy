<?php


include "startsession.php";
include "nav.php";

include "dbconnect.php";

if (isset($_SESSION['username'])) {
    $customer = $_SESSION['username'];
    $query = "SELECT *from user_info where username = '$customer'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $name = $row['full_name'];
        $add = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $number = $row['number'];
    }







?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

    <body>
        <br><br><br><br><br><br>
        <div class="container">

            <div class="card-columns">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <p class="card-text">

                            <strong style="text-align: center;">PROFILE</strong><br>
                            Name: <?php echo "$name";  ?><br>
                            Contact: <?php echo "$number"; ?><br>
                            Address: <?php echo "$add"; ?><br>
                            City: <?php echo "$city"; ?><br><br><br>
                            <a href='editprofile.php' class="btn btn-sm" style="background:black;color:white;font-weight:10px;">
                                Edit profile
                            </a>

                        </p>
                    </div>
                </div>



                <div class="card bg-light">
                    <div class="card-body text-center">
                        <p class="card-text">
                            <strong>OREDRS</strong><br><br>
                            Hello,<?php echo "$name"; ?> check all your orders.<br><br><br><br><br><br>
                            <a href='orders.php' class="btn btn-sm" style="background:black;color:white;font-weight:10px;">
                                Orders
                            </a>

                        </p>
                    </div>
                </div>

                <div class="card bg-light">
                    <div class="card-body text-center">
                        <p class="card-text"><strong>
                                login and security
                            </strong><br><br><br><br><br><br><br><br><br></p>
                    </div>
                </div>
            </div>
        </div><br> <br><br><br><br><br><br><br>
    <?php
    require_once('footer1.php');
}
    ?>
    </body>

    </html>