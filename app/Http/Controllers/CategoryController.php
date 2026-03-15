<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories
     */
    public function index()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        $parentCategories = Category::where('is_delete', 0)
            ->where('is_active', 1)
            ->get();
        return view('category.create', ['parentCategories' => $parentCategories]);
    }

    /**
     * Store a newly created category in database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'boolean',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'is_delete' => 0,
        ]);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được tạo');
    }

    /**
     * Show the form for editing a category
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        
        // Get all categories except this one and its descendants for parent selection
        $parentCategories = Category::where('is_delete', 0)
            ->where('is_active', 1)
            ->where('id', '!=', $id)
            ->get()
            ->filter(function ($cat) use ($id) {
                // Exclude descendants of current category to prevent circular reference
                return !$this->isDescendant($cat->id, $id);
            });

        return view('category.edit', [
            'category' => $category,
            'parentCategories' => $parentCategories
        ]);
    }

    /**
     * Update a category in database
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'boolean',
        ]);

        // Prevent circular reference
        if ($request->parent_id && $this->isDescendant($request->parent_id, $id)) {
            return back()->withErrors(['parent_id' => 'Không thể chọn danh mục con làm danh mục cha']);
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được cập nhật');
    }

    /**
     * Soft delete a category
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->update(['is_delete' => 1]);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được xóa');
    }

    /**
     * Check if a category is a descendant of another
     */
    private function isDescendant($categoryId, $parentId)
    {
        $category = Category::find($categoryId);
        
        if (!$category) {
            return false;
        }

        if ($category->parent_id === $parentId) {
            return true;
        }

        if ($category->parent_id) {
            return $this->isDescendant($category->parent_id, $parentId);
        }

        return false;
    }
}
