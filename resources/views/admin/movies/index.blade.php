@extends('layouts.panel')
@section('content')
    <style type="text/css">
        td.image{
            background-size: 100% 100%;
            background-repeat: no-repeat;
            width: 125px;
            height: 125px;
        }
        #movieDescription p{
            text-align: justify!important;
        }
    </style>
    <div class="w3-container">
        <div class="w3-panel w3-leftbar w3-sand w3-xxlarge w3-serif">
            @if (session()->has('success'))
                <div class="alert alert-success w3-xlarge">
                    <p><i>"{{ session()->get('success') }}"</i></p>
                </div>
            @endif
        </div>
        <div style="margin-top: 44px;">
            <div class="w3-bar w3-black w3-section" style="height: 75px;">
                <div class="w3-bar w3-black w3-xxlarge" style="height: 75px;">
                    <h1 class="w3-bar-item w3-button w3-left w3-hover-none w3-hover-text-white"
                        style="display: inline;margin: 0;">movies management</h1>
                    <a href="movies/create" class="w3-bar-item w3-button w3-right w3-mobile"
                        style="height: 100%;">
                        <i class="fa fa-plus" style="position: relative;top: 10px;bottom: 10;"></i>
                    </a>
                </div>
            </div>
            <div class="w3-bar w3-black w3-section w3-hide-large w3-hide-medium" style="height: 100vwimportant">
                <a href="categories/create" style="display: block;width:100%;height:100%;" class="w3-bar-item w3-button w3-right w3-mobile"
                    style="height: 100%;">
                    <i class="fa fa-plus" style="position: relative;top: 5px;bottom: 10;"></i>
                </a>
            </div>
            <div class="">
                <p>
                    <input class="w3-input w3-large" oninput="w3.filterHTML('#id01', '.item', this.value)"
                        placeholder="Search by  Title | Rate | Year | Description | Director | Country | Section Name | or ID">
                </p>
            </div>

            <div class="w3-responsive">
                <table class="w3-table w3-striped w3-border w3-bordered w3-centered w3-hoverable w3-table-all cnsb-hov-eve-aliceblue cnsb-hov-odd-antiquewhite" id="id01"
                    border="1">
                    <tr>
                        <th class="w3-hover-amber">id</th>
                        <th class="w3-hover-aqua">image</th>
                        <th class="w3-hover-aqua">title</th>
                        <th class="w3-hover-blue">rate</th>
                        <th class="w3-hover-light-blue">year</th>
                        <th class="w3-hover-brown">description</th>
                        <th class="w3-hover-cyan">director</th>
                        <th class="w3-hover-blue-grey">country</th>
                        <th class="w3-hover-green">section ID</th>
                        <th class="w3-hover-light-green">Edit</th>
                        <th class="w3-hover-indigo">Delete </th>
                    </tr>
                    @foreach ($movies as $movie)
                        <tr class="item">
                            <td class=""><span style="position: relative;top: 16px">{{ $movie->id }}</span></td>
                            <td class="image" style="background-image: url({{asset('images/movies/'.$movie->image)}})">
                            <td class=""><span style="position: relative;top: 16px">{{ $movie->title }}</span></td>
                            <td class=""><span style="position: relative;top: 16px">{{ $movie->rate }}</span></td>
                            <td class=""><span style="position: relative;top: 16px">{{ $movie->year }}</span></td>
                            <td id="movieDescription">
                                <span style="position: relative;top: 16px">
                                    <details>
                                        <summary>read the description</summary>
                                        <p>{{ $movie->description }}.</p>
                                      </details>
                                </span></td>
                            <td class=""><span style="position: relative;top: 16px">{{ $movie->director }}</span></td>
                            <td class=""><span style="position: relative;top: 16px">{{ $movie->country }}</span></td>
                            <td class=""><span style="position: relative;top: 16px">{{ $movie->category->title }}</span></td>
                            <td class=""><span style="position: relative;top: 10px"><a href="{{ route('admin.movies.edit', $movie) }}"><i class="w3-xxlarge fa fa-edit w3-hover-text-yellow"></i></a></span></td>
                            <td class="">
                                <span >
                                    <form method="POST" action="{{ route('admin.movies.destroy', $movie) }}">
                                        @csrf
                                        <button class="w3-button w3-hover-none">
                                            <i class="w3-xxlarge fa fa-trash w3-hover-text-red"></i>
                                        </button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <footer class="w3-container w3-padding-16 w3-light-grey">
        <h4>salam-movies</h4>
        <strong>2021 - <?php echo date('Y'); ?></strong>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>
@endsection
