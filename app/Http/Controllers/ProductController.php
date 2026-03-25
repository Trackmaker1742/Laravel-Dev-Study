<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Middleware\CheckTimeAccess;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckTimeAccess::class);
    }

    /**
     * Danh sách sản phẩm
     */
    public function index()
    {
        $title = "Danh sách sản phẩm";
        $products = Product::where('is_delete', false)->paginate(10);
        return view('product.index', compact('title', 'products'));
    }

    /**
     * Form tạo sản phẩm mới
     */
    public function create(Request $request)
    {
        $categories = Category::where('is_delete', false)->get();
        return view('product.add', compact('categories'));
    }

    /**
     * Lưu sản phẩm vào database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_delete'] = false;
        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được thêm thành công');
    }

    /**
     * Chi tiết sản phẩm
     */
    public function getDetail(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.detail', compact('product'));
    }

    /**
     * Form chỉnh sửa sản phẩm
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('is_delete', false)->get();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Cập nhật sản phẩm
     */
    public function update(string $id, Request $request)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku,' . $id,
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được cập nhật thành công');
    }

    /**
     * Xóa sản phẩm (soft delete)
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->update(['is_delete' => true]);

        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được xóa');
    }

    public function show(string $id)
    {
        return $this->getDetail($id);
    }
}