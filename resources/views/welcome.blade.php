<!DOCTYPE html>
<html>
<title>أفلام سلام</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="{{asset('css/w3-theme-black.css')}}">
<link rel="stylesheet" href="{{asset('css/w3css.css')}}">
<link rel="stylesheet" href="{{asset('css/cnsb.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<body id="myPage">
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-left-align">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2"
                href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>salam-movies</a>
            <a href="#team" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-hover-text-black w3-text-white">Team</a>
            <a href="#movies_sestion" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-hover-text-black w3-text-white">sectios</a>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
            <a href="#team" class="w3-bar-item w3-button">Team</a>
            <a href="#work" class="w3-bar-item w3-button">Work</a>
        </div>
    </div>

    <!-- Image Header -->
    <div class="w3-display-container w3-animate-opacity">
        <img src="{{ asset('images/home-page/salam-movies.jpg') }}" alt="boat"
            style="width:100%;min-height:100vh;max-height:100vh;">
    </div>

    <!-- Team Container -->
    <div class="w3-container w3-padding-64 w3-center" id="team">
        <h2>OUR TEAM</h2>
        <p>Meet the Team - Our Office Personnel:</p>

        <div class="w3-row"><br>

            <div class="w3-col l4">
                <div class="w3-container"></div>
            </div>
            <div class="w3-col l4">
               <div class="w3-container">
                <img src="http://tiny.cc/b2mytz" alt="Boss" width="100%" height="333px" class="w3-round-large w3-hover-opacity">
                <h3>salam</h3>
                <p>site owner</p>
               </div>
            </div>
            <div class="w3-col l4">
                <div class="w3-container"></div>
            </div>
        </div>
    </div>

    <!-- movies_sestion Row -->
    <div class="w3-container w3-padding-64 w3-center w3-row-padding w3-theme-l1" style="height: 120vh;overflow-x: auto;"
        id="movies_sestion">
        <h2 class="w3-padding-16 w3-xxlarge">movies sectios</h2>
        @foreach ($items as $item)
            <div class="w3-quarter w3-section">
                <div class="w3-card w3-white">
                    <a target="_blank" href="{{ route('category', $item->slug) }}">
                        <img src="{{asset('images/categories/'.$item->image)}}" alt="{{asset($item->image)}}" style="width:100%;height: 333px;">    
                    </a>
                    <div class="w3-bar">
                        <a target="_blank" href="{{ route('category', $item->slug) }}"
                            class="w3-bar-item w3-block w3-center w3-large"
                            style="width: 100%;display: block;">{{ $item->title }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-center w3-theme-d2" style="height: 100%">
        <h4>Follow Us</h4>
        <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i
                class="fa fa-facebook"></i></a>
        <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i
                class="fa fa-twitter"></i></a>
        <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i
                class="fa fa-google-plus"></i></a>
        <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i
                class="fa fa-instagram"></i></a>
        <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i
                class="fa fa-linkedin"></i></a>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>

        <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
            <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>
            <a class="w3-button  w3-themeref" id="#myPage"><span class="w3-xlarge">
                    <i class="fa fa-chevron-circle-up"></i></span></a>
        </div>
    </footer>

    <script>
        // Script for side navigation
        function w3_open() {
            var x = document.getElementById("mySidebar");
            x.style.width = "300px";
            x.style.paddingTop = "10%";
            x.style.display = "block";
        }

        // Close side navigation
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }

        // Used to toggle the menu on smaller screens when clicking on the menu button
        function openNav() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

    </script>

</body>

</html>
