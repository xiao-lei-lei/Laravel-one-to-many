@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Products</li>
    </ol>
  </nav>
  <a href="{{route('products.create')}}" class="btn btn-primary">Add</a>

  <div>
      <table class="table mt-3">
        <tr>
            <th>Image</th>
          <th>Item Code</th>
          <th>Name</th>
          <th>Description</th>
          <th>Unit Price</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>

        @foreach ($products as $product) 
    <tr>
        <td><img src="/images/{{$product->item_code}}.png"alt="" width="100px"></td>
      <td>{{$product->item_code}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->unit_price}}</td>
      <td>{{$product->stock}}</td>
      
      <td><a href="/admin/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <form action="/admin/products/{{ $product->id }}" method="post" class="d-inline">
          @method("DELETE")
          @csrf
        <!--   <a href="" class="btn btn-danger btn-sm ml-3"></a></td> -->
        <button type="submit" class="btn btn-danger btn-sm ml-3"><i class="fa fa-trash-o" aria-hidden="true"></i></button>  
  
      </form>
      </td>
        
    </tr>
    @endforeach
        
      </table>
      </div>
    
@endsection