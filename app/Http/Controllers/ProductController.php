<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\CheckTimeAccess;

class ProductController extends Controller implements HasMiddleware
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
    public function get(string $id = "123"){
        return view("product.detail", ['id' => $id]);
    }
    public function create(){
        return view("product.add");
    }
    public function store(Request $request){
        return $request->all();
    }
    public function login(){
        return view("product.login");
    }
}