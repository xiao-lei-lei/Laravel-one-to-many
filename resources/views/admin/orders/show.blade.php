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
        <th>Item Code</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        
        <th></th>
      </tr>


  @foreach ($order->orderItems as $item)
      
  <tr>
    <td>{{$item->product->item_code}}</td>
    <td>{{$item->product->name}}</td>
    <td>{{$item->price}}</td>
    <td>{{$item->quantity}}</td>
    <td>{{$item->subtotal}}</td> 
  </tr>
  @endforeach
  <tr>
      <td></td>
      <td></td>
      <td>Total:</td>
      <td>{{$order->total}}</td>
      <td>
      <form action="/admin/order/{{$order->id}}/edit" method="put">
        @csrf
        <input type="submit" class="btn btn-primary" value="Delivery">
      </form>
    </td>
  </tr>
    </form>
 
      
  </tr>
 
      
    </table>
@endsection