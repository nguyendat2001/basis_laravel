
@include('layouts.header')

<div id="layoutSidenav_content" >
<section class="intro">

  <div class="bg-image h-100" style="background-color: #6095F0;">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-borderless mb-0">
                    <thead>
                      <tr>
                        <th scope="col">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                          </div>
                        </th>

                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Close</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                      <tr>
                        <th scope="row">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" checked/>
                          </div>
                        </th>
                        <td>{{$product->id}}</td>
                        <td><a href="{{url('/home/collection/'.$product->id)}}">{{$product->name}}</a></td>
                        <td>{{$product->description}}</td>
                        <td><img src="{{$product->image}}" width="80" height="80"></td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->brand}}</td>
                        <td>
                          <button type="button" class="btn btn-success btn-sm px-3">
                            <i class="fas fa-times"></i>
                          </button>
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger btn-sm px-3">
                            <i class="fas fa-times"></i>
                          </button>
                        </td>
                      </tr>
                      @endforeach






                    </tbody>
                  </table>
                  <div class=" row d-flex align-items-center"> 
                    <div class="col-6"></div>
                    <a class ="col" href='{{route("auth.ShowAddProduct")}}'><button type="button" class="btn btn-dark">Light</button></a>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script>
                    $(window).focus(function() {
                        console.log("focus")
                    });

                    $(window).blur(function() {
                        console.log("blur")
                    });
                </script>
@include('layouts.footer')

