@extends('layouts.panel')
@section('content')

<div class="w3-container w3-padding-32 w3-large">
    <h1 class="w3-jumbo">edit Category</h1>
    
    <form action="{{ route('admin.categories.update',$category) }}" method="POST" enctype="multipart/form-data">
        
        @csrf

        <p>
            <label for="image">image Section</label>
            <input id="image" name="image" class="w3-input" type="file" accept="image/*">
            @error('image')
                <ul class="w3-ul w3-border w3-text-red">
                    <li><h3>You have made one or more of the following errors:</h3></li>
                    <li>field is empty.</li>
                    <li>The entry is not an image</li>
                </ul>
            @enderror
        </p>

        <p>
            <label for="title">title | <span class="cnsb-txt-darkgrey">the input 3-25 characters.</span></label>
            <input value="{{$category->title}}" id="title" name="title" class="w3-input" type="text" class="slug-input" 
            oninput="$('#slug').val($('#title').val().replace(/\s+/g, '-').toLowerCase())">
            @error('title')
                <ul class="w3-ul w3-border w3-text-red">
                    <li><h3>You have made one or more of the following errors:</h3></li>
                    <li>field is empty.</li>
                    <li>The entry is more than 25 characters or less 3 characters.</li>
                </ul>
            @enderror
        </p>

        <p>
            <input id="slug"  name="slug" class="w3-input" type="hidden" class="slug-output">            
            {{--@error('slug')<p class="cnsb-txt-red">The field is required.</p>@enderror--}}
        </p>

        <p>
            <input type="submit" name="" class="w3-button w3-bar-item w3-green" value="submit">
        </p>

    </form>
</div>

@endsection