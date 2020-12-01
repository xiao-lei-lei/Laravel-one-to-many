<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 
     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     
</head>
<body>
    <div class="container pt-3">
        <nav class="navbar navbar-expand-lg navbar-light default-color">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Categories</a>
                </li>
                
               
              </ul>
              <form class="form-inline my-2 my-lg-0">
               
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
              </form>
            </div>
          </nav>

          <div class="row md-3 mt-3">
            <div class="col-md-3 ">
                <div class="list-group">
                   
                    <a href="{{route('admin')}}" class="list-group-item list-group-item-action"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a>
                    <a href="{{route('order.index')}}" class="list-group-item list-group-item-action"><i class="fa fa-file-text-o" aria-hidden="true"></i>Orders</a>
                    <a href="{{route('products.index')}}" class="list-group-item list-group-item-action"><i class="fa fa-cubes" aria-hidden="true"></i>Products</a>
                    <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action"><i class="fa fa-tags" aria-hidden="true"></i>Categories</a>
         
                  </div>
              
            </div>
            <div class="col md-9">
              
                @yield('content')
            
            </div>
          </div>
    
  

</div>
</body>
</html>