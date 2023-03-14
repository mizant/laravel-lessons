<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('main.index')}}">Home<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about.index')}}">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.index')}}">Contacts</a>
                </li>

                @can('view', auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.post.index')}}">Admin</a>
                </li>
                @endcan


            </ul>
        </div>
    </nav>
</div>
    @yield('content')
</div>


</body>
</html>
