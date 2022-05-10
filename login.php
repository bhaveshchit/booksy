<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <?php require_once('header.php');  ?>


</head>

<body>


    <br><br><br>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
            <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <fieldset>
                    <legend>Login</legend>
                    <p class="lead">I’d love to hear from you! Complete the form to login in the website.</p>
                    <div class="form-group">
                        <label for="inputName" class="col-lg-2 control-label">Username:</label>
                        <div class="col-lg-10">
                            <input type="text" name="username" class="form-control" id="inputName" placeholder="Username">
                        </div>
                    </div>





                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Password:</label>
                        <div class="col-lg-10">
                            <input type="password" name="password" class="form-control" id="inputEmail" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
    <?php
    require_once('connectvars.php');

    // Start the session

    session_start();
    // Clear the error message


    // If the user isn't logged in, try to log them in
    if (!isset($_SESSION['id'])) {
        if (isset($_POST['submit'])) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Grab the user-entered log-in data
            $username = mysqli_real_escape_string($dbc, trim($_POST['username']));

            $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

            if (!empty($username) && !empty($password)) {
                // Look up the username and password in the database
                $query = "SELECT id, username,email FROM booksy_user WHERE username = '$username' AND password = SHA('$password')";
                $data = mysqli_query($dbc, $query);

                if (mysqli_num_rows($data) == 1) {
                    // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                    $row = mysqli_fetch_array($data);
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];

                    setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30 * 30));    // expires in 30 days
                    setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30 * 30));  // expires in 30 days

                    header('Location: userform.php');
                } else {
                    // The username/password are incorrect so set an error message
                    $error_msg = 'Sorry, you must enter a valid username and password to log in.';
                }
            } else {
                // The username/password weren't entered so set an error message
                $error_msg = 'Sorry, you must enter your username and password to log in.';
            }
        }
    }

    // Insert the page header


    // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
    if (empty($_SESSION['id'])) {

    ?>
        <div class="bg-success text-white px-4">
            <p>
                <?php //echo $_SESSION['msg']; 
                ?>
                <? php // echo $_SESSION['j']; 
                ?>
            </p>
        </div>

    <?php
    } else {
        // Confirm the successful log-in
        echo ('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
    }


    ?>