<!DOCTYPE html>
<html>
@foreach ($items as $item)
    <title>{{ $item->title }}</title>
@endforeach
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/w3css.css') }}">
<link rel="stylesheet" href="{{ asset('css/cnsb.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Karma", sans-serif
    }

    .w3-bar-block .w3-bar-item {
        padding: 20px
    }

    * {
        text-transform: capitalize
    }
    #movieImage{
    	width: 100%;
    	height: 333px;
    	max-width: 100%;
    	min-width: 100%;
    	max-height: 333px;
    	min-height: 333px;
    }
    ul.w3-ul.w3-border{
    	border-top: none!important;
    	height: auto;
    	clear: both!important;
     }
    #movieTitle{
    	margin: 0!important;
    	padding: 0px!important;
    	position: relative;
    	top: 5px;
    }
</style>

<body class="w3-black">
    <!-- Sidebar (hidden by default) -->
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left"
        style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-text-black">Close Menu</a>
        @foreach ($items as $item)
            <a href="{{ route('category', $item->slug) }}" class="w3-bar-item w3-button w3-text-black"
                target="_blank">{{ $item->title }}</a>
        @endforeach

    </nav>

    <!-- Top menu -->
    <div class="w3-top">
        <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
            <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
            <div class="w3-center w3-padding-16">{{ $category->title }}</div>
        </div>
    </div>



    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-content" style="max-width:1200px;margin-top:100px">
        <!-- First Photo Grid-->
        <div class="w3-row-padding w3-stretch w3-padding-16 w3-center w3-stretch" id="food">
            @foreach ($movies as $movie)
                <div class="w3-quarter w3-section">
                    <a href="{{$movie->url}}">
                    	<div class="w3-display-container w3-light-grey" style="height:300px;">
                    	 <img src="{{asset('images/movies/'.$movie->image)}}" id="movieImage" class="w3-border cnsb-bor-white" 
                    	     alt="{{$movie->image}}">		
                    	  <div class="w3-display-topleft">
                    	  	
                    	  	<div class="w3-tag w3-large w3-red" style="padding:3px;font-weight: bolder;">
                    	  	  <div class="w3-tag w3-red w3-border w3-border-black">
                    	  	    {{ $movie->rate }}
                    	  	  </div>
                    	  	</div>

                    	  </div>
                    	  <div class="w3-display-topright">
                    	  	
                    	  	<div class="w3-tag w3-yellow" style="padding:3px;font-weight: bolder;">
                    	  	  <div class="w3-tag w3-large w3-yellow w3-border w3-border-black">
                    	  	    {{ $movie->year }}
                    	  	  </div>
                    	  	</div>

                    	  </div>
                    	</div>
                    </a>
                    <ul class="w3-ul w3-border" style="position: relative;top: 25px;">
                        <li>
                            <h2 id="movieTitle">{{ $movie->title }}</h2>
                        </li>
                        <li>
                        <details>
                          <summary>description</summary>
                          <p style="text-align: justify;">{{ $movie->description }}</p>
                        </details>
                    	</li>
                        <li>director: {{ $movie->director }}</li>
                        <li>country: {{ $movie->country }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
        <!-- Pagination -->
        {{ $movies->links('pagination') }}
        <!-- End page content -->
    </div>
    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
</body>
</html>