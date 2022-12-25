<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $products, $product, $categories, $brands, $category;

    public function index()
    {
        $this->categories = Category::where('status', 1)->get();
        $this->brands = Brand::where('status', 1)->get();
        return view('admin.product.index', [
            'categories' => $this->categories,
            'brands' => $this->brands,
        ]);
    }

    public function create(Request $request)
    {
        Product::newProduct($request);
        return redirect('/product/add')->with('message', 'Product Create Successfully');
    }

    public function manage()
    {
        return view('admin.product.manage',['products' => Product::orderBy('id', 'desc')->get()]);

    }

    public function detail($id)
    {
        return view('admin.product.detail',['product' => Product::find($id)]);
    }

    public function updateStatus($id)
    {
        return redirect()->back()->with('message', Product::updateProductStatus($id));
    }

    public function edit($id)
    {
        $this->categories = Category::where('status', 1)->get();
        $this->brands = Brand::where('status', 1)->get();
        $this->product = Product::find($id);
        return view('admin.product.edit', [
            'product' => $this->product,
            'categories' => $this->categories,
            'brands' => $this->brands,
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/product/manage')->with('message','Product update Info successfully');
    }

    public function delete($id)
    {
        Product::deleteProduct($id);
        return redirect('/product/manage')->with('message', 'Product info delete successfully');
    }
}
