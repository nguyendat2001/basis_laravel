@include('layouts.header')

<div id="layoutSidenav_content" >
            <center>
                <main style="left:400px;">
                    <div class="container px-5" >
                        <h1 class="mt-4">Add Product</h1>
                        <ol class="breadcrumb mb-4" >
                            <li class="breadcrumb-item active" >Add Product</li>
                        </ol>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                            @if(Session::has('message'))
                                <p class="alert alert-info">{{ Session::get('message') }}</p>
                            @endif
                            </li>
                        </ol>
                        <form action="<?php route('auth.Update_product') ?>" method="post" enctype='multipart/form-data' style="width:50%;">
                        @csrf <!-- {{ csrf_field() }} -->
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" placeholder="Enter email" name="name" value="{{$detail_product->name}}">
                                <label for="email">Product Name</label>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" placeholder="Enter password" name="description" value="{{$detail_product->description}}">
                                <label for="pwd">Product Description</label>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="file" class="form-control" placeholder="Enter password" name="image" >
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" placeholder="Enter password" name="quantity" value="{{$detail_product->quantity}}">
                                <label for="pwd">Quantity</label>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" placeholder="Enter password" name="price" value="{{$detail_product->price}}">
                                <label for="pwd">Price</label>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" placeholder="Enter password" name="brand" value="{{$detail_product->brand}}">
                                <label for="pwd">Brand</label>
                            </div>
                            <button type="submit" class="btnRegister" >submit</button>
                        </form>


                </main>
                </center>

@include('layouts.footer')

