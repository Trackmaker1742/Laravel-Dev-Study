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
                ['id' => 1, 'name' => 'Sản phẩm A', 'price' => 1000, 'description' => 'Sản phẩm chất lượng cao', 'status' => 'Còn hàng'],
                ['id' => 2, 'name' => 'Sản phẩm B', 'price' => 2000, 'description' => 'Sản phẩm bán chạy', 'status' => 'Còn hàng'],
                ['id' => 3, 'name' => 'Sản phẩm C', 'price' => 3000, 'description' => 'Sản phẩm mới', 'status' => 'Hết hàng'],
            ]
        ]);
    }
    public function get($id = "123"){
        return view("product.detail", ['id' => $id]);
    }
    public function create(Request $request){
        return view('product.add');
    }

    public function store(Request $request){
        // Here you would save the product to the database
        // For now, just redirect back
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được thêm');
    }
    public function show(string $id){
        $product = Product::find($id);
        return view('product.edit', ['product' => $product]);
    }
    public function edit(string $id){
        $product = [
            'id' => $id,
            'name' => 'Sample Product ' . $id,
            'price' => 1000,
            'description' => 'Sample description',
            'stock' => 10,
            'status' => 'Còn hàng'
        ];
        return view('product.edit', ['product' => $product]);
    }

    public function update(string $id, Request $request){
        // Here you would update the product in the database
        // For now, just redirect back
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được cập nhật');
    }

    public function destroy(string $id){
        // Here you would delete the product from the database
        // For now, just redirect back
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được xóa');
    }

    public function getDetail(string $id){
        return view("product.detail", ['id' => $id]);
    }
}