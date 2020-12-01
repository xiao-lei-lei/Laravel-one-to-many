@extends('layouts.app')

@section('content')


          <div class="container">
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
          
                  @foreach ($shoppingCart->shoppingCartItems as $item) 
              <tr>
                 <td><img src="/images/{{$item->product->item_code}}.png"alt="" width="100px"></td>
                <td>{{$item->product->item_code}}</td>
                <td>{{$item->product->name}}
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->subtotal}}</td>
               
              
                
                <td>

                   <form action="/shoppingCart/{{$item->id}}" method="post" class="d-inline">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE">
                  
                  <!--   <a href="" class="btn btn-danger btn-sm ml-3"></a></td> -->
                  <button type="submit" class="btn btn-danger btn-sm ml-3"><i class="fa fa-trash-o" aria-hidden="true"></i></button>  
            
                </form>
              </td>
                  
              </tr>
             
              @endforeach
              <tr>
                  <td> </td>
                  <td> </td>
                  <td>  </td>
                  <td> </td>
                  <td class="bold"><strong>TOTAL</strong></td>
                  <td>{{$shoppingCart->total}}MMK</td>
                  <td>
                    <form action="/orders" method="post">
                      @csrf
                      <input type="submit" class="btn btn-primary" value="Order Now">
                    </form>
                  </td>
                </tr>
                </table>
              </div>


 
    
    @endsection