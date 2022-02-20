<!DOCTYPE html>
<html>
<title>@yield("title")</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--CSS AND FONT-->
<link rel="stylesheet" href="{{ asset('css/w3css.css') }}">
<link rel="stylesheet" href="{{ asset('css/cnsb.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
  
<!--JS-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/countryList.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>

<style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Raleway", sans-serif
    }

    * {
        text-transform: capitalize !important;
    }

</style>

<body class="w3-light-grey">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey"
            onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;margin:0;padding:0;">
            @csrf
            <button type="submit" class="w3-button w3-bar-item w3-right">logout</button>
        </form>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="{{ asset('images/salam-movies.jpg') }}" class="w3-round w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>Welcome, <strong>salam</strong></span><br>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block w3-large">
            <a href="" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
                onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i></a>

            <a href="{{ route('admin.categories') }}" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                Manage Sections
            </a>
            <a href="{{ route('admin.movies') }}" class="w3-bar-item w3-button w3-padding">
                <i class="fa fa-video-camera" aria-hidden="true"></i>
                movie management
            </a>
        </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        @yield('content')
    </div>

    <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
        $("input#year.year").datepicker({
            changeYear: true,
            changeMonth: false,
            changeDay: false,
            dateFormat: 'yy',
            duration: 'fast',
            stepYear: 0
        });

    </script>

    @stack('script')

</body>

</html>
