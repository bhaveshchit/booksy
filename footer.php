<!DOCTYPE html>
<html lang="en">

<head>
    <title>Read More Popup Box</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            line-height: 1.5;
        }

        * {
            box-sizing: border-box;
            margin: 0;
        }

        .container {
            max-width: 1170px;
            margin: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .section-title {
            flex: 0 0 100%;
            max-width: 100%;
            margin-bottom: 60px;
        }

        .section-title h1 {
            text-align: center;
            font-size: 36px;
            color: #000000;
        }

        .services {
            min-height: 100vh;
            padding: 80px 0;
        }

        .services .service-items {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .services .service-items .item {
            flex: 0 0 33.33%;
            max-width: 33.33%;
            padding: 15px;
        }

        .services .service-items .item-inner {
            border: 1px solid #dddddd;
            padding: 30px;
        }

        .services .service-items .read-more-cont {
            display: none;
        }

        .services .service-items .item-inner h3 {
            font-size: 20px;
            color: #000000;
            margin-bottom: 30px;
            position: relative;
        }

        .services .service-items .item-inner h3::before {
            content: '';
            height: 1px;
            width: 80px;
            background-color: #000000;
            position: absolute;
            left: 0;
            bottom: -10px;
        }

        .services .service-items .item-inner p {
            color: #555555;
            font-size: 16px;
            margin: 0 0 30px;
        }

        .services .service-items .item-inner .btn {
            font-size: 16px;
            background-color: transparent;
            border: 1px solid #555555;
            color: #555555;
            padding: 8px 15px;
            cursor: pointer;
        }

        .popup-box {
            position: fixed;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 500;
            visibility: hidden;
            opacity: 0;
            transition: all 0.5s ease-in-out;
        }

        .popup-box.open {
            visibility: visible;
            opacity: 1;
        }

        .popup-box .popup-content {
            background-color: #ffffff;
            width: 600px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border-radius: 8px;
        }

        .popup-box .popup-header {
            padding: 15px 40px 15px 15px;
            border-bottom: 1px solid #dddddd;
        }

        .popup-box .popup-header h3 {
            margin: 0;
            color: #E91E63;
            font-size: 20px;
        }

        .popup-box .popup-header .popup-close-icon {
            position: absolute;
            height: 30px;
            width: 30px;
            text-align: center;
            color: #555555;
            font-size: 28px;
            line-height: 30px;
            right: 5px;
            top: 5px;
            cursor: pointer;
        }

        .popup-box .popup-body {
            padding: 15px;
            max-height: 300px;
            overflow-y: auto;
        }

        .popup-box .popup-body img {
            width: 100%;
            display: block;
            margin-top: 15px;
        }

        .popup-box .popup-body p {
            font-size: 16px;
            color: #555555;
            margin: 0 0 15px;
        }

        .popup-box .popup-footer {
            padding: 15px;
            border-top: 1px solid #dddddd;
            text-align: right;
        }

        .popup-box .popup-footer .btn {
            padding: 8px 15px;
            border: 1px solid #555555;
            color: #555555;
            font-size: 16px;
            background-color: transparent;
            cursor: pointer;
            border-radius: 4px;
        }

        .popup-box .popup-footer .btn:focus {
            outline: none;
        }


        /*responsive*/

        @media(max-width: 767px) {
            .services .service-items .item {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .popup-box .popup-content {
                width: calc(100% - 30px);
            }
        }
    </style>
</head>

<body>

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h1>Services</h1>
                </div>
            </div>
            <div class="row">
                <div class="service-items">
                    <div class="row">
                        <!-- item start -->
                        <div class="item">
                            <div class="item-inner">
                                <h3>ABOUT US</h3>
                                <p> In this cvoid pandemic situation we all are facing same problem.</p>
                                <div class="read-more-cont">
                                    In this cvoid pandemic situation we all are facing same problem we have no booksfor studies for our exams as we all know that our exams is going on in offline mode, so we came to an trustable
                                    website of RTU/BTU books in minimum rates you can also take update for your order at any time 24X7 by emails & whatsapp and you can also order your books
                                    through whatsapp and you going to get your book in really good conditon and at minimum time.








                                </div>
                                <button class="btn" type="button">Read More</button>
                            </div>
                        </div>
                        <!-- item end -->
                        <!-- item start -->
                        <div class="item">
                            <div class="item-inner">
                                <h3>Retun Policy</h3>
                                <p>Books will be only return if..</p>
                                <div class="read-more-cont">
                                    <p>Books will be only return if their are misprints in the books
                                        after the shipmet. if customer wants to cancel the order than shipping charges will not be refund.</p>
                                </div>
                                <button class="btn" type="button">Read More</button>
                            </div>
                        </div>
                        <!-- item end -->
                        <!-- item start -->
                        <div class="item">
                            <div class="item-inner">
                                <h3>Contact Us</h3>
                                <p>you can ask your...</p>
                                <div class="read-more-cont">
                                    <p>you can ask your query at any time on whatsapp and email, if you need any book related to engineering you can ask us.</p>
                                </div>
                                <button class="btn" type="button">Read More</button>
                            </div>
                        </div>
                        <!-- item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- read more popup box start -->
    <div class="popup-box">
        <div class="popup-content">
            <div class="popup-header">
                <h3></h3>
                <span class="popup-close-icon">&times;</span>
            </div>
            <div class="popup-body">

            </div>
            <div class="popup-footer">
                <button class="btn popup-close-btn">Close</button>
            </div>
        </div>
    </div>
    <!-- read more popup box end -->


    <script>
        const serviceItems = document.querySelector(".service-items");
        const popup = document.querySelector(".popup-box")
        const popupCloseBtn = popup.querySelector(".popup-close-btn");
        const popupCloseIcon = popup.querySelector(".popup-close-icon");

        serviceItems.addEventListener("click", function(event) {
            if (event.target.tagName.toLowerCase() == "button") {
                const item = event.target.parentElement;
                const h3 = item.querySelector("h3").innerHTML;
                const readMoreCont = item.querySelector(".read-more-cont").innerHTML;
                popup.querySelector("h3").innerHTML = h3;
                popup.querySelector(".popup-body").innerHTML = readMoreCont;
                popupBox();
            }

        })

        popupCloseBtn.addEventListener("click", popupBox);
        popupCloseIcon.addEventListener("click", popupBox);

        popup.addEventListener("click", function(event) {
            if (event.target == popup) {
                popupBox();
            }
        })

        function popupBox() {
            popup.classList.toggle("open");
        }
    </script>
</body>

</html>