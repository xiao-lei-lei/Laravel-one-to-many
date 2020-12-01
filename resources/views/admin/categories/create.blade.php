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
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="form-group">
        <label for="">Categories Name</label>
        <input type="text" name="name" id="name" class="form-control"><br>
        
        
        <input type="submit" value="Create" class="btn btn-primary btn-block">
    </div>
    </form>
    </div>
</body>
</html>
@endsection