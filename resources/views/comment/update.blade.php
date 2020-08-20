<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="/comment/{{$comment->id}}" method="post">
        @csrf
        @method("PUT")
        <textarea name="body" id="" cols="30" rows="3">{{$comment->body}}</textarea>
    <input type="submit" value="submit">
</form>
</body>
</html>