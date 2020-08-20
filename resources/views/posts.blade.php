<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <a href="/posts/create">Create new</a>
    @foreach ($posts as $item) 
        <h1>{{$item->title}}</h1>
        <p>{{$item->body}}</p>
        <a href="/posts/{{ $item->id }}">See more</a>

        <hr>
    @endforeach

</body>
</html>