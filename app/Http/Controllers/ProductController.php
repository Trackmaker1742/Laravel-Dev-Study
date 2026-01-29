<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function middleware(array $middleware)
    {
        return [
            CheckTimeAccess::class,
        ];
    }
    public function index()
    {
        $title = "Danh sách sản phẩm";
        // Code to list products
        return view('product.index', ['title' => $title,
            'products' => [
                ['id' => 1, 'name' => 'Sản phẩm A', 'price' => 1000],
                ['id' => 2, 'name' => 'Sản phẩm B', 'price' => 2000],
                ['id' => 3, 'name' => 'Sản phẩm C', 'price' => 3000],
            ]
        ]);
    }
    public function get($id = "123"){
        return view("product.detail", ['id' => $id]);
    }
    public function create(Request $request){

        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

        return redirect("product.add");
    }
    public function store(Request $request){
        return $request->all();
    }
    public function show(string $id){
        $product = Product::find($id);
        return view('product.edit', ['product' => $product]);
    }
    public function edit(string $id, Request $request){

        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        
        return redirect('/products');
    }
}