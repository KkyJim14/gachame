<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminProductController extends Controller
{
    public function ShowAdminProduct()  {
      $product = Product::all();
      return view('admin.pages.product.product',[
                                                  'product' => $product,
                                                ]);
    }

    public function ShowAdminCreateProduct()  {
      return view('admin.pages.product.create-product');
    }

    public function AdminCreateProductProcess(Request $request) {

      $validatedData = $request->validate([
          'product_name' => 'required',
          'product_price' => 'required',
          'product_img' => 'required|image|max:2048',
      ]);


      $product = new Product;
      $product->product_name = $request->product_name;
      $product->product_price = $request->product_price;

      if ($request->hasFile('product_img')) {
        $image = $request->file('product_img');
        $name = uniqid().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/img/product');
        $image->move($destinationPath, $name);

        $product->product_img = $name;

        }

        $product->save();

      return redirect()->route('product');

    }

    public function ShowAdminEditProduct(Request $request,$id)  {
      $product = Product::find($id);
      return view('admin.pages.product.edit-product',[
                                                      'product' => $product,
                                                     ]);
    }

    public function AdminEditProductProcess(Request $request,$id) {
      $validatedData = $request->validate([
          'product_name' => 'required',
          'product_price' => 'required',
          'product_img' => 'image|max:2048',
      ]);

      $product = Product::find($id);
      $product->product_name = $request->product_name;
      $product->product_price = $request->product_price;

      if ($request->hasFile('product_img')) {
        $image = $request->file('product_img');
        $name = uniqid().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/img/product');
        $image->move($destinationPath, $name);

        $product->product_img = $name;

        }

      $product->save();

      return redirect()->route('product');
    }

    public function AdminDeleteProductProcess($id)  {
      $product = Product::find($id);
      $product->delete();

      return redirect()->route('product');
    }
}
