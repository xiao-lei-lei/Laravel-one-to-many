@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Orders</li>
    </ol>
  </nav>

  <div>
    <table class="table mt-3">
      <tr>
        <th>User Id</th>
          <th>User Name</th>
        <th>Total Amount</th>
        <th>Detail</th>
        <th></th>
      </tr>

      @foreach ($orders as $order) 
  <tr>
  
    <td>{{$order->id}}</td>
    <td>{{$order->user->name}}</td>
    <td>{{$order->total}}</td>
    <td><a href="/admin/order/{{$order->id}}">Detail</a></td>
    
  </tr>
    </form>
    </td>
      
  </tr>
  @endforeach
      
    </table>
@endsection