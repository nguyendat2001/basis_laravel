<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\Validator;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    //
    public function ShowAddProduct(){
        return view('auth.add_product_T');
    }

    public function AddProduct(Request $request){
        if ($request->isMethod('post')){
            $varlidator = Validator::make($request->all(), [

            ]);
            if ($varlidator->fails()) {
                return  redirect()->back()
                    ->withErrors($varlidator)
                    ->withInput();
            }

            $name = $request->input('name');
            $description = $request->input('description');

            // $img = $request->file('pro_img')->getClientOriginalName();

            if ($request->hasFile('image')) {
                $randomize = rand(111111, 999999);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filename = $randomize . '.' . $extension;
                $request->file('image')->move('./image/products', $filename);
                $image = '\image\products\\'.$filename;
            }

            $quantity = $request->input('quantity');
            $price = $request->input('price');
            $brand = $request->input('brand');

            $data = array('name'=> $name,'description'=> $description,'image'=> $image,'quantity'=>$quantity,'price'=>$price,'brand'=>$brand);
            // return $data;

            $user = DB::table('products')->insert($data);

            return redirect()->route('auth.ShowAddProduct')->with('message', 'save thanh cong ');
        }
    }

    public function collect(){
        $products = Product::get();
        return view('auth.show_product')->with('products',$products);
    }

    public function detail_product($id){
        $detail_product = Product::where('id' ,'=', $id)->first();
        return view('auth.show_detail')->with('detail_product',$detail_product);
        // return $name;
    }

    public function Delete_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/home/collection/')->with('status','Data has been delete');
        // return $name;
    }


    public function show_update_product($id){
        $detail_product = Product::where('id' ,'=', $id)->first();
        return view('auth.edit_product')->with('detail_product',$detail_product);
        // return $name;
    }

    public function Update_product(Request $request, $id){
        $product =  Product::find($id);
        $product->name = $request->input('name') ;
        $product->description = $request->input('description') ;

        if ($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $request->file('image')->move('./image/products', $filename);
            $product->image = '\image\products\\'.$filename;
        }

        $product->quantity = $request->input('quantity') ;
        $product->price = $request->input('price') ;
        $product->brand = $request->input('brand') ;

        $product->save();

        return redirect('/home/collection/')->with('status','Data has been modify');
        // return $name;
    }

    // public function showEdit
}
