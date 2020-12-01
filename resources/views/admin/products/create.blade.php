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
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="">Item code</label>
        <input type="text" name="item_code" id="" class="form-control"><br>
        
        <label for="">Product Name</label>
        <input type="text" name="name" id="" class="form-control"><br>

        <label for="">Product Image</label><br>
        <input type="file" name="productImage" ><br>

        <label for="">Description</label>
        <input type="text" name="description" id="" class="form-control"><br>

        <label for="">Unit Price</label>
        <input type="text" name="unit_price" id="" class="form-control"><br>

        <label for="">Stock</label>
        <input type="text" name="stock" id="" class="form-control"><br>

        <label for="">Category</label>
      <select name="category" class="form-control">
          @foreach ($categories as $category)    
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach   
      </select>
            <br>
        <input type="submit" value="Create" class="btn btn-primary btn-block">
    </div>
    </form>
    </div>
</body>
</html>
@endsection