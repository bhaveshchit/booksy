<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Minimal Responsive Navigation | HTML & CSS</title>


  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="bootstrap/css/jumbotron.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />



  <link rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    nav {

      padding: 8px;
    }

    .logo {
      float: left;
      padding: 8px;
      margin-left: 16px;
      margin-top: 8px;

    }

    .logo a {
      color: black;
      text-transform: uppercase;
      font-weight: 700;
      font-size: 18px;
      letter-spacing: 0px;
      text-decoration: none;
      color: black;
    }

    nav ul {
      float: right;
    }

    nav ul li {
      display: inline-block;
      float: left;
    }

    nav ul li:not(:first-child) {
      margin-left: 48px;
    }

    nav ul li:last-child {
      margin-right: 24px;
    }

    nav ul li a {
      display: inline-block;
      outline: none;
      color: black;
      text-transform: uppercase;
      text-decoration: none;
      font-size: 14px;
      letter-spacing: 1.2px;
      font-weight: 600;
      color: black;
    }

    @media screen and (max-width: 864px) {
      .logo {
        padding-top: 0px;
        padding-left: 36%;
      }

      .nav-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: #fff;
        opacity: 0;
        transition: all 0.2s ease;
      }

      .nav-wrapper ul {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
      }

      .nav-wrapper ul li {
        display: block;
        float: none;
        width: 100%;
        text-align: right;
        margin-bottom: 10px;
      }

      .nav-wrapper ul li:nth-child(1) a {
        transition-delay: 0.2s;
      }

      .nav-wrapper ul li:nth-child(2) a {
        transition-delay: 0.3s;
      }

      .nav-wrapper ul li:nth-child(3) a {
        transition-delay: 0.4s;
      }

      .nav-wrapper ul li:nth-child(4) a {
        transition-delay: 0.5s;
      }

      .nav-wrapper ul li:not(:first-child) {
        margin-left: 0;
      }

      .nav-wrapper ul li a {
        padding: 10px 24px;
        opacity: 0;
        color: #000;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1.2px;
        transform: translateX(-20px);
        transition: all 0.2s ease;
      }

      .nav-btn {
        position: fixed;
        right: 10px;
        top: 10px;
        display: block;
        width: 48px;
        height: 48px;
        cursor: pointer;
        z-index: 9999;
        border-radius: 50%;
      }

      .nav-btn i {
        display: block;
        width: 20px;
        height: 2px;
        background: #000;
        border-radius: 2px;
        margin-left: 14px;
      }

      .nav-btn i:nth-child(1) {
        margin-top: 16px;
      }

      .nav-btn i:nth-child(2) {
        margin-top: 4px;
        opacity: 1;
      }

      .nav-btn i:nth-child(3) {
        margin-top: 4px;
      }
    }

    #nav:checked+.nav-btn {
      transform: rotate(45deg);
    }

    #nav:checked+.nav-btn i {
      background: #000;
      transition: transform 0.2s ease;
    }

    #nav:checked+.nav-btn i:nth-child(1) {
      transform: translateY(6px) rotate(180deg);
    }

    #nav:checked+.nav-btn i:nth-child(2) {
      opacity: 0;
    }

    #nav:checked+.nav-btn i:nth-child(3) {
      transform: translateY(-6px) rotate(90deg);
    }

    #nav:checked~.nav-wrapper {
      z-index: 9990;
      opacity: 1;
    }

    #nav:checked~.nav-wrapper ul li a {
      opacity: 1;
      transform: translateX(0);
    }

    .hidden {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <nav>
      <input type="checkbox" id="nav" class="hidden">
      <label for="nav" class="nav-btn">
        <i></i>
        <i></i>
        <i></i>
      </label>
      <div class="logo animate__animated animate__zoomInDown">
        <a href="index.php">BOOKSY</a>
      </div>
      <div class=" nav-wrapper">
        <ul>

          <?php
          require_once('startsession.php');

          if (isset($_SESSION['id'])) {

            echo ' <li><a href="books.php">books</a></li>';
            echo ' <li><a href="#">Contacts</a></li>';
            echo ' <li><a href="cart.php">Cart</a></li>';
            echo ' <li><a href="profile.php">Profile</a></li>';

            echo ' <li><a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a></li>';
          } else {
            echo ' <li><a href="login.php">Login</a></li>';
            echo ' <li><a href="signup.php">Signup</a></li>';
          }
          ?>
        </ul>
      </div>
    </nav>
  </div>
</body>

</html>