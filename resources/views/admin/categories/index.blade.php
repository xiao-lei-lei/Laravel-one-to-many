@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </ol>
  </nav>
  <a href="{{route('categories.create')}}" class="btn btn-primary">Add</a>
  
  <div>
  <table class="table mt-3">
    <tr>
      <th>Name</th>
      <th>Action</th>
    </tr>
    @foreach ($categories as $category) 
    <tr>
      <td>{{$category->name}}</td>
      <td><a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <form action="/admin/categories/{{ $category->id }}" method="post" class="d-inline">
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