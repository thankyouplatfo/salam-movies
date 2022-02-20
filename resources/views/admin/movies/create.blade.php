@extends('layouts.panel')
@section('content')

    <div class="w3-container">
        <div class="w3-panel w3-leftbar w3-sand w3-xxlarge w3-serif">
            @if (session()->has('success'))
                <div class="alert alert-success w3-xlarge">
                    <p><i>"{{ session()->get('success') }}"</i></p>
                </div>
            @endif
        </div>
        <div class="w3-panel w3-leftbar w3-sand w3-xxlarge w3-serif">
            @if (session()->has('success'))
                <div class="alert alert-success w3-xlarge">
                    <p><i>"{{ session()->get('success') }}"</i></p>
                </div>
            @endif
        </div>
        <h1 class="w3-jumbo">create movies</h1>
        <form class="w3-container w3-large" action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="image">image</label>
                <input type="file" class="image w3-input" name="image" id="image"
                    accept="image/*">
                @error('image')
                <ul class="w3-ul w3-border w3-text-red">
                    <li>
                        <h3>You have made one or more of the following errors:</h3>
                    </li>
                    <li>field is empty.</li>
                    <li>The entry is not an image</li>
                </ul>
            @enderror
            </p>
            <p>
                <label for="title">title</label>
                <input value="{{ old('title') }}" type="text" minlength="3" maxlength="33" class="title w3-input"
                    name="title" id="title">
                @error('title')
                <ul class="w3-ul w3-border w3-text-red">
                    <li>
                        <h3>You have made one or more of the following errors:</h3>
                    </li>
                    <li>field is empty.</li>
                    <li>The entry is more than 33 characters or less 3 characters.</li>
                </ul>
            @enderror
            </p>
            <p>
                <label for="rate">rate | <span class="cnsb-txt-darkgrey"> The highest rating for the movie is 5
                        .</span></label></label>
                <input value="{{ old('rate') }}" max="5.5" min="1.1" step="1.1" type="number" class="rate w3-input" name="rate"
                    id="rate">
                @error('rate')
                <ul class="w3-ul w3-border w3-text-red">
                    <li>
                        <h3>You have made one or more of the following errors:</h3>
                    </li>
                    <li>field is empty.</li>
                    <li>The entry is more than 5.0 characters or less 1.0 characters.</li>
                </ul>
            @enderror
            </p>
            <p>
                <label for="year">year</label>
                <input value="{{ old('year') }}" type="number" class="year w3-input" maxlength="4" minlength="4"
                    name="year" id="year">
                @error('year')
                <ul class="w3-ul w3-border w3-text-red">
                    <li>
                        <h3>You have made one or more of the following errors:</h3>
                    </li>
                    <li>field is empty.</li>
                    <li>The entry is more than 4 number or less 4 number.</li>
                </ul>
            @enderror
            </p>
            <p>
                <label for="description">description | <span class="cnsb-txt-darkgrey"> the length = 255
                        character</span></label>
                <textarea minlength="33" maxlength="443" class="description w3-input" name="description" id="description"
                    cols="30" rows="10">{{old('description')}}</textarea>
                @error('description')
                <ul class="w3-ul w3-border w3-text-red">
                    <li>
                        <h3>You have made one or more of the following errors:</h3>
                    </li>
                    <li>field is empty.</li>
                    <li>The entry is more than 255 characters or less 33 characters.</li>
                </ul>
            @enderror
            </p>
            <p>
                <label for="director">director</label>
                <input value="{{ old('description') }}" type="text" class="director w3-input" name="director" id="director"
                    minlength="3" maxlength="25">
                @error('director')
                <ul class="w3-ul w3-border w3-text-red">
                    <li>
                        <h3>You have made one or more of the following errors:</h3>
                    </li>
                    <li>field is empty.</li>
                    <li>The entry is more than 3 characters or less 25 characters.</li>
                </ul>
            @enderror
            </p>
            <p>
                <label for="country">country</label>
                <select class="country w3-input" name="country" id="country">
                    <script>
                        for (let i = 0; i < countryList.length; i++) {
                            $('#country').append("<option value=" + countryList[i] + ">" + countryList[i] + "</option>");
                        }

                    </script>
                </select>
                @error('country')
                <ul class="w3-ul w3-border w3-text-red">
                    <li>
                        <h3>You have made one or more of the following errors:</h3>
                    </li>
                    <li>field is empty.</li>
                </ul>
            @enderror
            </p>
            <p>
                <label for="url">url</label>
                <input value="{{ old('url') }}" type="url" class="url w3-input" name="url" id="url">
                @error('url')
                <ul class="w3-ul w3-border w3-text-red">
                    <li>
                        <h3>You have made one or more of the following errors:</h3>
                    </li>
                    <li>field is empty.</li>
                    <li>The entry is not a link.</li>
                </ul>
            @enderror
            </p>
            <p>
                <label for="category_id">edit/change category name {{-- $categorys->title --}}</label>
                <select class="category_id w3-input" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <ul class="w3-ul w3-border w3-text-red">
                    <li>
                        <h3>You have made one or more of the following errors:</h3>
                    </li>
                    <li>field is empty.</li>
                </ul>
            @enderror
            </p>
            <p>
                <input type="submit" value="create" class="w3-button w3-theme w3-bar-item w3-block w3-black w3-xlarge">
            </p>
        </form>
    </div>
@endsection
