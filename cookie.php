<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>PureCookie Example</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        .cookieConsentContainer {
            z-index: 999;
            width: 350px;
            min-height: 20px;
            box-sizing: border-box;
            padding: 30px 30px 30px 30px;
            background: #232323;
            overflow: hidden;
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: none;
        }

        .cookieConsentContainer .cookieTitle a {
            font-family: OpenSans, arial, "sans-serif";
            color: #FFFFFF;
            font-size: 22px;
            line-height: 20px;
            display: block;
        }

        .cookieConsentContainer .cookieDesc p {
            margin: 0;
            padding: 0;
            font-family: OpenSans, arial, "sans-serif";
            color: #FFFFFF;
            font-size: 13px;
            line-height: 20px;
            display: block;
            margin-top: 10px;
        }

        .cookieConsentContainer .cookieDesc a {
            font-family: OpenSans, arial, "sans-serif";
            color: #FFFFFF;
            text-decoration: underline;
        }

        .cookieConsentContainer .cookieButton a {
            display: inline-block;
            font-family: OpenSans, arial, "sans-serif";
            color: #FFFFFF;
            font-size: 14px;
            font-weight: bold;
            margin-top: 14px;
            background: #000000;
            box-sizing: border-box;
            padding: 15px 24px;
            text-align: center;
            transition: background 0.3s;
        }

        .cookieConsentContainer .cookieButton a:hover {
            cursor: pointer;
            background: #3E9B67;
        }

        @media (max-width: 980px) {
            .cookieConsentContainer {
                bottom: 0px !important;
                left: 0px !important;
                width: 100% !important;
            }
        }
    </style>
    <!-- PureCookie -->
</head>

<body>





    <script>
        // --- Config --- //
        var purecookieTitle = "Cookies."; // Title
        var purecookieDesc = "By using this website, you automatically accept that we use cookies."; // Description
        var purecookieLink = '<a href="cookie-policy.html" target="_blank">What for?</a>'; // Cookiepolicy link
        var purecookieButton = "Understood"; // Button text
        // ---        --- //


        function pureFadeIn(elem, display) {
            var el = document.getElementById(elem);
            el.style.opacity = 0;
            el.style.display = display || "block";

            (function fade() {
                var val = parseFloat(el.style.opacity);
                if (!((val += .02) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        };

        function pureFadeOut(elem) {
            var el = document.getElementById(elem);
            el.style.opacity = 1;

            (function fade() {
                if ((el.style.opacity -= .02) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        };

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Max-Age=-99999999;';
        }

        function cookieConsent() {
            if (!getCookie('purecookieDismiss')) {
                document.body.innerHTML += '<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>' + purecookieTitle + '</a></div><div class="cookieDesc"><p>' + purecookieDesc + ' ' + purecookieLink + '</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">' + purecookieButton + '</a></div></div>';
                pureFadeIn("cookieConsentContainer");
            }
        }

        function purecookieDismiss() {
            setCookie('purecookieDismiss', '1', 7);
            pureFadeOut("cookieConsentContainer");
        }

        window.onload = function() {
            cookieConsent();
        };
    </script>

</body>

</html>