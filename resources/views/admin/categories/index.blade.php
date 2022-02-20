@extends('layouts.panel')
@section('content')
    <style>
        td.image{
            background-size: 100% 100%;
            background-repeat: no-repeat;
            width: 125px;
            height: 125px;
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
        <div style="/*margin-top: 44px;*/">
            <div class="w3-bar w3-black w3-section" style="height: 75px;">
                <div class="w3-bar w3-black w3-xxlarge" style="height: 75px;">
                    <h1 class="w3-bar-item w3-button w3-left w3-hover-none w3-hover-text-white"
                        style="display: inline;margin: 0;">Categories management</h1>
                    <a href="categories/create" style="height: 100%!important" class="w3-bar-item w3-button w3-right w3-mobile"
                        style="height: 100%;">
                        <i class="fa fa-plus" style="position: relative;top: 5px;bottom: 10;"></i>
                    </a>
                </div>
                
            </div>
            <div class="w3-bar w3-black w3-section w3-hide-large w3-hide-medium" style="height: 100vwimportant">
                <a href="categories/create" style="display: block;width:100%;height:100%;" class="w3-bar-item w3-button w3-right w3-mobile"
                    style="height: 100%;">
                    <i class="fa fa-plus" style="position: relative;top: 5px;bottom: 10;"></i>
                </a>
            </div>
            <div class="w3-responsive">
            <table class="w3-table w3-striped w3-border w3-bordered w3-centered w3-hoverable w3-table-all cnsb-hov-eve-aliceblue cnsb-hov-odd-antiquewhite">
                <tr>
                    <th class="w3-hover-amber">id</th>
                    <th class="w3-hover-aqua">image</th>
                    <th class="w3-hover-aqua">Name</th>
                    <th class="w3-hover-blue">slug</th>
                    <th class="w3-hover-light-blue">movies</th>
                    <th class="w3-hover-brown">show</th>
                    <th class="w3-hover-cyan">Edit</th>
                    <th class="w3-hover-blue-grey">Delete</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                    <td>
                        <span style="position: relative;top: 16px;">{{ $category->id }}</span>
                    </td>
                    <td class="image" style="background-image: url({{asset('images/categories/'.$category->image)}})">
                    </td> 
                    <td>
                        <span style="position: relative;top: 16px;">{{$category->title }}</span>
                    </td>
                    <td>
                        <span style="position: relative;top: 16px;">{{ $category->slug }}</span>
                    </td>
                    <td>
                        <span style="position: relative;top: 16px;">{{ $category->movies_count }}</span>
                    </td>
                    <td>
                        <a href="{{ route('category', $category->slug) }}"
                            class="w3-button w3-bar-item w3-hover-none">
                            <i style="position: relative;top: -3px;" class="w3-xxlarge fa fa-book w3-hover-text-green"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category) }}"
                            class="w3-button w3-bar-item w3-hover-none">
                            <i style="position: relative;top: -3px;" class="w3-xxlarge fa fa-edit w3-hover-text-yellow"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                            @csrf
                            <button class="w3-button w3-bar-item w3-hover-none "
                                onclick="return confirm('Are you sure this can\'t be undone')">
                                <i style="position: relative;top: -3px;" class="w3-xxlarge fa fa-trash w3-hover-text-red"></i>
                            </button>
                        </form>
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
