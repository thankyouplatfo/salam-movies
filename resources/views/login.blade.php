<!DOCTYPE html>
<html>
<title>@yield("title")</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/w3css.css') }}">
<link rel="stylesheet" href="{{ asset('css/cnsb.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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

</style>

<body class="w3-light-grey w3-content">
    <div style="position: relative;height: 50%;margin-top: 15%;">
        <h1>admins login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <p>
                <label class="w3-text-blue"><b>Email</b></label>
                <input name="email" class="w3-input w3-border" type="text" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </p>
            <p>
                <label class="w3-text-blue"><b>Password</b></label>
                <input name="password" class="w3-input w3-border" type="password">
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </p>
            <p>
                <button class="w3-btn w3-blue" type="submit">Register</button>
            </p>
        </form>
    </div>
</body>

</html>
