
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Blog @yield('title')</title> 
    {{-- change this title for each page --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    {{--asset function generates a URL for an asset, such as a CSS file, JavaScript file, image, or any other file that is stored in the public directory --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
