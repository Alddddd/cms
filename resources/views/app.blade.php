<!DOCTYPE html>
<html>
<head>
    <title>My Laravel App</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px; }
        header { background: #333; color: white; padding: 10px; }
        footer { background: #333; color: white; padding: 10px; margin-top: 20px; }
        .content { background: white; padding: 20px; }
        .content1 { background: white; padding: 20px; }
    </style>
</head>
<body>

<header>
    <h1>My Laravel Website</h1>
</header>


@if(count($people))
    <ul>

        @foreach($people as $person)

            <li>{{$person}}</li>

        @endforeach


    </ul>


@endif



<div class="content">
   @yield('content') {{-- this is where the child view content goes --}}
</div>

<div class="content1">
    @yield('content1') {{-- this is where the child view content goes --}}
</div>

<footer>
    <p>&copy; 2025 My Website</p>
</footer>
</body>
</html>
