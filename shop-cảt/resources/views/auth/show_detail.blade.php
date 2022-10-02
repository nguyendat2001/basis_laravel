@include('layouts.header')
<style>
    html,
body,
.intro {
  height: 100%;
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}

.card {
  border-radius: .5rem;
}

.mask-custom {
  background: rgba(24, 24, 16, .2);
  border-radius: 2em;
  backdrop-filter: blur(25px);
  border: 2px solid rgba(255, 255, 255, 0.05);
  background-clip: padding-box;
  box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
}
</style>
<div id="layoutSidenav_content">
    <center>
        <main style="left:400px;">
            <div class="container px-5">
                <h1 class="mt-4">Add Product</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        @if(Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                        @endif
                    </li>
                </ol>
                <table>
                    <tr>
                        <!-- <th>Company</th> -->
                        <!-- <th>ID</th> -->
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th></th>
                    </tr>

                    <tr>
                        <!-- <td>{{$detail_product->id}}</td> -->
                        <td>{{$detail_product->name}}</td>
                        <td>{{$detail_product->description}}</td>
                        <td><img src="{{$detail_product->image}}" width="80" height="80"></td>
                        <td>{{$detail_product->quantity}}</td>
                        <td>{{$detail_product->price}}</td>
                        <td>{{$detail_product->brand}}</td>
                        <th><a href="{{ route('auth.show_update_product' , ['id'=>$detail_product->id] ) }}" class="btn btn-success">Edit</a></th>
                        <th><button><a href="{{route('auth.Delete_product',['id'=>$detail_product->id] ) }}" class="btn btn-danger">Delete</a></button></th>
                    </tr>

                </table>
            </div>


        </main>
    </center>

    @include('layouts.footer')
