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
    <form action="/admin/products/{{ $product->id }}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
   
        <label for="">Item code</label>
        <input type="text" name ="item_code"class="form-control" value="{{$product->item_code}}"><br>

        <label for="">Categories Name</label>
        <input type="text" name ="name"class="form-control" value="{{$product->name}}"><br>

        <label for="">Description</label>
        <input type="text" name ="description"class="form-control" value="{{$product->description}}"><br>

        <label for="">Unit Price</label>
        <input type="text" name ="unit_price"class="form-control" value="{{$product->unit_price}}"><br>

        <label for="">Stock</label>
        <input type="text" name ="stock"class="form-control" value="{{$product->stock}}"><br>

        <label for="">Category</label>
        <select name="category" class="form-control">
            @foreach ($categories as $category)    
              <option value="{{$category->id}}" 
                @if ($product->category->id == $category->id)
                    selected
                @endif
                >{{$category->name}}</option>
            @endforeach   
        </select>

        <label for="">Product Image</label><br>
        <img src="/images/{{$product->item_code}}.png"alt="" width="100px">
        <input type="file" name="productImage" ><br>

        
        <input type="submit" value="Update" class="btn btn-primary btn-block">
    </div>
    </form>
    </div>
</body>
</html>
@endsection