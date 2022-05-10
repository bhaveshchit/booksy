<?php
require_once('connectvars.php');
require_once('startsession.php');
//require_once('nav.php');
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="bootstrap/css/jumbotron.css" rel="stylesheet">



    </head>

    <body>


        <br><br><br>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <fieldset>
                        <legend>Contact</legend>
                        <p class="lead"> EDIT your profile.</p>
                        <div class="form-group">


                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 control-label">NAME</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputName" name="name" placeholder="fullname">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">STATE</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="state" id="inputEmail" placeholder="STATE">

                                </div>
                            </div>



                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">PINCODE</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail" placeholder="PINCODE" name="pincode">
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 control-label">City</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputName" name="city" placeholder="CITY">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 control-label">Address</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputName" name="address" placeholder="Complete address">
                                </div>
                            </div>















                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">PHONE-NUMBER</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="number" id="inputEmail" placeholder="NUMBER" required>

                                </div>
                            </div>





                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-default" name="remove">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>


    <?php


    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Connect to the database

    if (isset($_POST['submit'])) {
        // Grab the profile data from the POST
        $fname = mysqli_real_escape_string($dbc, trim($_POST['name']));
        $add = mysqli_real_escape_string($dbc, trim($_POST['address']));
        $city = mysqli_real_escape_string($dbc, trim($_POST['city']));
        $pincode = mysqli_real_escape_string($dbc, trim($_POST['pincode']));
        $phone = mysqli_real_escape_string($dbc, trim($_POST['number']));
        $state = mysqli_real_escape_string($dbc, trim($_POST['state']));










        // The username is unique, so insert the data into the database
        /*  $query = "INSERT INTO user_info (username, full_name, pincode,address,city,state,number) VALUES ('$username', '$fname', '$pincode','$add','$city','$state','$phone')";
*/




$query = "UPDATE user_info SET full_name = '$fname', pincode = '$pincode', address = '$add', " .
" city = '$city', state = '$state', number = '$phone' WHERE username = '" . $_SESSION['username'] . "'";
mysqli_query($dbc, $query);






        // Confirm success with the user
        header('location:index.php');
    }


    if (isset($_POST['remove'])) {

        header('location:index.php');
    }
}


    ?>