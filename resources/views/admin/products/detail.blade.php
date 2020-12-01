@extends('layouts.app')

@section('content')

          <div class="container">

                <div class="row ">
                  <div class="col-md-4"><img class="img-fluid" src="/images/{{$product->item_code}}.png"alt=""></div>
                  <div class="col-md-8">
                     @isset($stockError)
                     <div class="alert alert-danger" role="alert">
                        {{$stockError}}
                      </div>
                     @endisset
                        
                <h1 class="h2">{{$product->name}}</h1>
                <p class="lead">Item Code: {{$product->item_code}}</p>
                <p class="lead">{{$product->stock}}</p>
                <p class="lead"> Price: {{$product->unit_price}} MMK</p>
                <p>{{$product->description}} </p> 
                <br>
                
                    <form action="/shoppingCart/{{Auth::user()->shoppingCart->id}}/add" method="POST">
                      @csrf
                      <input type="hidden" name="productId" value="{{$product->id}}">
                        <label for="">Quantity</label>
                        <select name="quantity" class="form-select">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>

                        <input type="submit" value="Add to Cart" class="btn btn-primary btn-sm ml-3">
                    </form>

                </div>
                </div>
              </div>

    @endsection