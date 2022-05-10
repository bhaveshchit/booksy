<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ask2210</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
        .modal-header {
            background: black;
            color: #fff;
            font-weight: 800;
        }

        .modal-body {
            font-weight: 800;
        }

        .modal-body ul {
            list-style: none;
        }

        .modal .btn {
            background: black;
            color: #fff;
        }

        .modal a {
            color: #D67B22;
        }

        .modal-backdrop {
            position: inherit !important;
        }

        #login_button,
        #register_button {
            background: none;
            color: #D67B22 !important;
        }

        #query_button {
            position: fixed;
            right: 0px;
            bottom: 2px;
            padding: 8px 60px;
            background-color: white;
            color: black;
            border-color: black;
            border-radius: 40px;
        }

        @media(max-width:767px) {
            #query_button {
                padding: 5px 20px;
            }
        }
    </style>
</head>


<body>
    <div class="container">
        <!-- Trigger the modal with a button -->
        <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query">Ask query</button>
        <!-- Modal -->
        <div class="modal fade" id="query" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ask your query here</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="query.php" class="form" role="form">
                            <div class="form-group">
                                <label class="sr-only" for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Your Name" name="sender" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="email" class="form-control" placeholder="abc@gmail.com" name="senderEmail" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="query">Message</label>
                                <textarea class="form-control" rows="5" cols="30" name="message" placeholder="Your Query" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" value="query" class="btn btn-block">
                                    Send Query
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>