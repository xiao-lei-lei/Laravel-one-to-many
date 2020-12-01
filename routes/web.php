<?php
use App\Product;
use App\ShoppingCart;
use App\ShoppingCartItem;
use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products=Product::all();
    return view('welcome',compact("products"));
});

Route::get('/products/{id}/detail', function ($id) {

    $product=Product::find($id);

    return view('admin.products.detail',compact('product'));
});

Route::get('/shoppingCart', function () {

    $shoppingCart =Auth::user()->shoppingCart;
    return view('shoppingcart',compact('shoppingCart'));
});

 Route::delete('/shoppingCart/{id}', function ($id) {

    $shoppingCartItems=ShoppingCartItem::find($id);
    $shoppingCart=Auth::user()->shoppingCart;
    $shoppingCart->total -=$shoppingCartItems->subtotal;
    $shoppingCart->save();
    $shoppingCartItems->delete();

    return redirect('/shoppingCart');
 });

Route::post('/shoppingCart/{id}/add',function($id,Request $request){
    
    $product=Product::find($request->productId);
    $shoppingCart=ShoppingCart::find($id);
    if($request->quantity>$product->stock){
        $stockError="Your quantity is greater than stock";

        return view('admin.products.detail',compact('product','stockError'));
    }

    foreach ($shoppingCart->shoppingCartItems as $item) {
       if($item->product->id==$product->id){
            $item->quantity += $request->quantity;

            if($item->quantity>$product->stock){
                $stockError="Your quantity is greater than stock";
        
                return view('admin.products.detail',compact('product','stockError'));
            }
      
            $item->subtotal = $item->quantity * $product->unit_price;
            $item->save();
            $shoppingCart->total +=$product->unit_price * $request->quantity;
            $shoppingCart->save();

            return redirect('/');
        }
    }

    Route::post('/admin/order/delivered/{id}',function($id){
        $order=Order::find($id);
        $order->is_delivered=TRUE;
        $order->save();
        return redirect('/');
    });

   
    $shoppingCartItem=new ShoppingCartItem();

    $shoppingCartItem->quantity=$request->quantity;
    $shoppingCartItem->price=$product->unit_price;
    $shoppingCartItem->subtotal=$shoppingCartItem->price * $request->quantity;
    $shoppingCart->shoppingCartItems()->save($shoppingCartItem);
    $product->shoppingCartItems()->save($shoppingCartItem);

    $shoppingCart->total +=$product->unit_price * $request->quantity;
    $shoppingCart->save();
    
    return redirect('/');

});

Route::post("/orders",function(){
    $user=Auth::user();
    $shoppingCart=$user->shoppingCart;
    $order =new Order;
    $order->shipping_address="Mandalay";
    $order->total=$shoppingCart->total;
    $order->is_delivered=false;
    $user->orders()->save($order);

    foreach ($shoppingCart->shoppingCartItems as $shoppingCartItem) {
        $orderItem=new OrderItem;
        $orderItem->quantity=$shoppingCartItem->quantity;
        $orderItem->price=$shoppingCartItem->price;
        $orderItem->subtotal=$shoppingCartItem->subtotal;
        $shoppingCartItem->product->orderItems()->save($orderItem);
        $order->orderItems()->save($orderItem);
        $shoppingCartItem->delete();
        $shoppingCart->total=0;
        $shoppingCart->save();
        $shoppingCartItem->product->stock-=$orderItem->quantity;
        $shoppingCartItem->product->save();

    }

    return redirect('/');
});

Route::get("/admin","AdminController@index")->name('admin');
Route::resource("/admin/products","ProductController");
Route::resource("/admin/order","OrderController");
Route::resource("/admin/categories","CategoryController");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
