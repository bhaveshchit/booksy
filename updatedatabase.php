<?php

require_once('connectvars.php');
require_once('appvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_POST['submit'])) {



    $title = mysqli_real_escape_string($dbc, trim($_POST['title']));
    $author = mysqli_real_escape_string($dbc, trim($_POST['author']));
    $mrp = mysqli_real_escape_string($dbc, trim($_POST['mrp']));
    $price = mysqli_real_escape_string($dbc, trim($_POST['price']));
    $discount = mysqli_real_escape_string($dbc, trim($_POST['discount']));
    $available = mysqli_real_escape_string($dbc, trim($_POST['available']));
    $publisher = mysqli_real_escape_string($dbc, trim($_POST['publisher']));
    $edition = mysqli_real_escape_string($dbc, trim($_POST['edition']));
    $category = mysqli_real_escape_string($dbc, trim($_POST['category']));
    $page = mysqli_real_escape_string($dbc, trim($_POST['page']));
    $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    $language = mysqli_real_escape_string($dbc, trim($_POST['language']));
    $weight = mysqli_real_escape_string($dbc, trim($_POST['weight']));

    $image = mysqli_real_escape_string($dbc, trim($_FILES['image']['name']));
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    list($image_width, $image_height) = getimagesize($_FILES['image']['tmp_name']);
    $error = false;

    if (!empty($image)) {
        if ((($image_type == 'image/gif') || ($image_type == 'image/jpeg') || ($image_type == 'image/pjpeg') ||
                ($image_type == 'image/png')) && ($image_size > 0) && ($image_size <= MM_MAXFILESIZE) &&
            ($image_width <= MM_MAXIMGWIDTH) && ($image_height <= MM_MAXIMGHEIGHT)
        ) {
            if ($_FILES['file'] == 0) {
                // Move the file to the target upload folder
                $target = MM_UPLOADPATH . basename($image);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target));
            }
        } else {
            // The new picture file is not valid, so delete the temporary file and set the error flag
            @unlink($_FILES['image']['tmp_name']);
            $error = true;
            echo '<p class="error">Your picture must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024) .
                ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</p>';
        }
    }

    if (!$error) {
        if (!empty($title) && !empty($author) && !empty($mrp)  && !empty($price) && !empty($discount) && !empty($available) && !empty($publisher) && !empty($edition) && !empty($description) && !empty($category) && !empty($language) && !empty($page)  && !empty($weight)) {
            // Only set the picture column if there is a new picture

            if (!empty($image)) {
                $query = "INSERT INTO products (PID,Title,Author,MRP,Price,Discount,Available,Publisher,Edition,Category,Description,Language,page,weight)  VALUES('$image','$title','$author','$mrp','$price','$discount','$available','$publisher','$edition','$category','$description','$language','$page','$weight')";
            }

            mysqli_query($dbc, $query);

            // Confirm success with the user
            header('location:updatedatabase.php');

            mysqli_close($dbc);
            exit();
        } else {
            echo '<p class="error">You must enter all of the profile data (the picture is optional).</p>';
        }
    }
}

?>



















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color:burlywood; color:black; ">










    <h1>UPDATE DATABASE</h1>

    <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>update database only for admins access</legend>
            <label for="username">TITLE:</label>
            <input type="text" name="title" /><br />

            <label for="username">AUTHOR:</label>
            <input type="text" name="author" /><br />

            <label for="username">MRP:</label>
            <input type="text" name="mrp" /><br />

            <label for="username">PRICE:</label>
            <input type="text" name="price" /><br />

            <label for="username">DISCOUNT:</label>
            <input type="text" name="discount" /><br />

            <label for="username">AVAILABLE:</label>
            <input type="text" name="available" /><br />

            <label for="username">PUBLISHER:</label>
            <input type="text" name="publisher" /><br />

            <label for="username">EDITION:</label>
            <input type="text" name="edition" /><br />

            <label for="username">CATEGORY:</label>
            <input type="text" name="category" /><br />


            <label for="username">DESCRIPTION:</label>
            <input type="text" name="description" /><br />

            <label for="username">LANGUAGE:</label>
            <input type="text" name="language" /><br />

            <label for="username">PAGE:</label>
            <input type="text" name="page" /><br />

            <label for="username">WEIGHT:</label>
            <input type="text" name="weight" /><br />

            <label for="image">image:</label>
            <input type="file" id="image" name="image" />
        </fieldset>
        <input type="submit" value="UPLOAD DATA" name="submit" />
    </form>

</body>

</html>