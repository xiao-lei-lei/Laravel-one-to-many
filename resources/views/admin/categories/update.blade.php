@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="/admin/categories/{{ $category->id }}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
        <label for="">Categories Name</label>
        <input type="text" name ="name"class="form-control" value="{{$category->name}}"><br>
        
        
        <input type="submit" value="Update" class="btn btn-primary btn-block">
    </div>
    </form>
    </div>
</body>
</html>
@endsection