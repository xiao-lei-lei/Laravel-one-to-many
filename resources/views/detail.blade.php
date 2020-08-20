<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    <a href="/posts/{{ $post->id }}/edit">Update</a>
    <form action="/posts/{{ $post->id }}" method="post">
        @method("DELETE")
        @csrf
        <input type="submit" value="Delete">
    </form>
    <hr>
    
    <h2>Comment</h2>
    <form action="/posts/{{$post->id}}/comment" method="post">
        @csrf
        <textarea name="body" id="body" cols="30" rows="10"></textarea>
        <input type="submit" value="Sent">
    </form>
  
    @foreach ($post->comment as $c)
      <p>{{$c->body}}</p>
      <form action="/comment/{{$c->id}}" method="post">
        @method("DELETE")
        @csrf
        <input type="submit" value="Delete">
    </form>
    <a href="/comment/{{$c->id}}/edit">Update</a>
    @endforeach
</body>
</html>