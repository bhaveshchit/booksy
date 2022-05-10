<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('header.php');  ?>



</head>

<body>




    <br><br><br>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
            <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <fieldset>
                    <legend>Signup</legend>
                    <p class="lead">I’d love to hear from you! Complete the form to login in the website.</p>
                    <div class="form-group">
                        <label for="inputName" class="col-lg-2 control-label">Username:</label>
                        <div class="col-lg-10">
                            <input type="text" name="username" class="form-control" id="inputName" placeholder="Username">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Email" class="col-lg-2 control-label">Email:</label>
                        <div class="col-lg-10">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Email" class="col-lg-2 control-label">Password:</label>
                        <div class="col-lg-10">
                            <input type="password" name="password1" class="form-control" id="inputEmail" placeholder="Password">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="retype password" class="col-lg-2 control-label">Retype-Password:</label>
                        <div class="col-lg-10">
                            <input type="password" name="password2" class="form-control" id="inputEmail" placeholder="Retype-password">
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
    session_start();
    ?>
    <?php



    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (isset($_POST['submit'])) {
        // Grab the profile data from the POST
        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));


        $token = bin2hex(random_bytes(20));

        if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
            // Make sure someone isn't already registered using this username
            $query1 = "SELECT * FROM booksy_user WHERE email = '$email'";
            $query = "SELECT * FROM booksy_user WHERE username = '$username'";



            $fire = mysqli_query($dbc, $query1);


            $data = mysqli_query($dbc, $query);
            if (mysqli_num_rows($data) == 0) {

                if (mysqli_num_rows($fire) == 0) {
                    // The username is unique, so insert the data into the database
                    $query = "INSERT INTO booksy_user (username, password, email,token,status) VALUES ('$username', SHA('$password1'), '$email','$token','inactive')";
                    mysqli_query($dbc, $query);

                    // Confirm success with the user
                    //header('location:login.php');


                    $subject = "email activation";
                    $body = "Hi, $username.  click here to activate your booksy account so we move futher
       http://localhost/projects/booksy/activate.php?token=$token ";





                    $sender_email = "From: sedvick99@gmail.com";

                    if (mail($email, $subject, $body, $sender_email)) {


                        $_SESSION['j'] = "<script> alert('hello')</script>";

                        $_SESSION['msg'] = "check mail your  <a href='https://mail.google.com/mail/u/0/#inbox'>mail</a>  to activate your account $email";
                        header('location:login.php');
                    } else {

                        $_SESSION['msg'] = "check mail your ";
                        $_SESSION['j'] = "<script> alert('hello')</script>";
                        header('location:login.php');
                    }

                    mysqli_close($dbc);
                    exit();
                } else {
                    echo '<p class="error">an account already exist with this email acccount</p>';
                }
            } else {
                // An account already exists for this username, so display an error message
                echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
                $username = "";
            }
        } else {
            echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
        }
    }

    mysqli_close($dbc);
    ?>