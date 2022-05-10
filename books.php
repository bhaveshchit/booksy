 <?php
    require_once('connectvars.php');
    require_once('startsession.php');
    require_once('nav.php');


    if (!isset($_SESSION['id'])) {
        echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
        exit();
    }

    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="Books">
     <meta name="author" content="Shivangi Gupta">
     <title>Online Bookstore</title>
     <!-- Bootstrap -->

     <?php require_once('header.php');  ?>
     <style>
         #category ul li a {
             color: black;
         }
     </style>
 </head>

 <body>
     <br><br><b><br>
         <div id="top">
             <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%; background:black">
                 <div>
                     <form role="search" method="POST" action="result.php">
                         <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Search for a Book , Author Or Category">
                     </form>
                 </div>
             </div>

             <div class="container-fluid" id="header">
                 <div class="row">
                     <div class="col-md-3 col-lg-3" id="category">
                         <div style="background:black;color:#fff;font-weight:800;border:none;padding:15px;"> The Book Shop </div>
                         <ul style="color:black;">
                             <li> <a href="Product.php?value=entrance%20exam"> Entrance Exam </a> </li>
                             <li> <a href="Product.php?value=Rtu%20Year"> Rtu/Btu - year-1 </a> </li>
                             <li> <a href="Product.php?value=Rtu%202%20Year"> Rtu/Btu - year-2 </a> </li>
                             <li> <a href="Product.php?value=Rtu%203%20Year"> Rtu/Btu - year-3 </a> </li>
                             <li> <a href="Product.php?value=Rtu%204%20Year"> Rtu/Btu - year-4 </a> </li>
                             <li> <a href="Product.php?value=Regional%20Books"> Regional Books </a> </li>
                             <li> <a href="Product.php?value=Business%20and%20Management"> Business & Management </a> </li>
                             <li> <a href="Product.php?value=Health%20and%20Cooking"> Health and Cooking </a> </li>

                         </ul>
                     </div>
                     <div class="col-md-6 col-lg-6">
                         <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                             <!-- Indicators -->
                             <ol class="carousel-indicators">
                                 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                 <li data-target="#myCarousel" data-slide-to="1"></li>
                                 <li data-target="#myCarousel" data-slide-to="2"></li>
                                 <li data-target="#myCarousel" data-slide-to="3"></li>
                                 <li data-target="#myCarousel" data-slide-to="4"></li>
                                 <li data-target="#myCarousel" data-slide-to="5"></li>
                             </ol>

                             <!-- Wrapper for slides -->
                             <div class="carousel-inner" role="listbox">
                                 <div class="item active">
                                     <img class="img-responsive" src="img/carousel/1.jpg">
                                 </div>

                                 <div class="item">
                                     <img class="img-responsive " src="img/carousel/2.jpg">
                                 </div>

                                 <div class="item">
                                     <img class="img-responsive" src="img/carousel/3.jpg">
                                 </div>

                                 <div class="item">
                                     <img class="img-responsive" src="img/carousel/4.jpg">
                                 </div>

                                 <div class="item">
                                     <img class="img-responsive" src="img/carousel/5.jpg">
                                 </div>

                                 <div class="item">
                                     <img class="img-responsive" src="img/carousel/6.jpg">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-3 col-lg-3" id="offer">
                         <a href="Product.php?value=Regional%20Books"> <img class="img-responsive center-block" src="img/offers/1.png"></a>
                         <a href="Product.php?value=Health%20and%20Cooking"> <img class="img-responsive center-block" src="img/offers/2.png"></a>
                         <a href="Product.php?value=Academic%20and%20Professional"> <img class="img-responsive center-block" src="img/offers/3.png"></a>
                     </div>
                 </div>
             </div>
         </div>

         <div class="container-fluid text-center" id="new">
             <div class="row">
                 <div class="col-sm-6 col-md-3 col-lg-3">
                     <a href="description.php?ID=NEW-1&category=new">
                         <div class="book-block">
                             <div class="tag">New</div>
                             <div class="tag-side"><img src="img/tag.png"></div>
                             <img class="book block-center img-responsive" src="img/new/1.jpg">
                             <hr>
                             Like A Love Song <br>
                             Rs 113 &nbsp
                             <span style="text-decoration:line-through;color:#828282;"> 175 </span>
                             <span class="label label-warning">35%</span>
                         </div>
                     </a>
                 </div>
                 <div class="col-sm-6 col-md-3 col-lg-3">
                     <a href="description.php?ID=NEW-2&category=new">
                         <div class="book-block">
                             <div class="tag">New</div>
                             <div class="tag-side"><img src="img/tag.png"></div>
                             <img class="block-center img-responsive" src="img/new/2.jpg">
                             <hr>
                             General Knowledge 2017 <br>
                             Rs 68 &nbsp
                             <span style="text-decoration:line-through;color:#828282;"> 120 </span>
                             <span class="label label-warning">43%</span>
                         </div>
                     </a>
                 </div>
                 <div class="col-sm-6 col-md-3 col-lg-3">
                     <a href="description.php?ID=NEW-3&category=new">
                         <div class="book-block">
                             <div class="tag">New</div>
                             <div class="tag-side"><img src="img/tag.png"></div>
                             <img class="block-center img-responsive" src="img/new/3.png">
                             <hr>
                             Indian Family Bussiness Mantras <br>
                             Rs 400 &nbsp
                             <span style="text-decoration:line-through;color:#828282;"> 595 </span>
                             <span class="label label-warning">33%</span>
                         </div>
                     </a>
                 </div>
                 <div class="col-sm-6 col-md-3 col-lg-3">
                     <a href="description.php?ID=NEW-4&category=new">
                         <div class="book-block">
                             <div class="tag">New</div>
                             <div class="tag-side"><img src="img/tag.png"></div>
                             <img class="block-center img-responsive" src="img/new/4.jpg">
                             <hr>
                             Kiran s SSC Mathematics Chapterwise Solutions <br>
                             Rs 289 &nbsp
                             <span style="text-decoration:line-through;color:#828282;"> 435 </span>
                             <span class="label label-warning">33%</span>
                         </div>
                     </a>
                 </div>
             </div>
         </div>



         <?php
            require_once('footer1.php');
            ?>



         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <!-- Include all compiled plugins (below), or include individual files as needed -->
         <script src="js/bootstrap.min.js"></script>
 </body>

 </html>