<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use Illuminate\Http\Request;
use Exception;

class CategoriesController extends Controller
{
    
public function index()
{
    $categories = Category::latest()->get();
    return view('layout', compact('categories'));
}

    
    public function create()
    {
        return view('category.create'); 
    }


    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            Category::create([
                'name' => $request->name,
            ]);

            $notification = [
                'message' => 'Danh mục đã được tạo thành công!',
                'alert-type' => 'success'
            ];

            return redirect()->route('categories.index')->with($notification);

        } catch (Exception $e) {
            $notification = [
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->route('categories.index')->with($notification);
        }
    }

    public function edit(Category $category)
    {
        $data['category'] = $category;
        return view('category.edit', $data);
    }

    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $category->name = $request->name;
            $category->save();

            $notification = [
                'message' => 'Danh mục đã được cập nhật thành công!',
                'alert-type' => 'success'
            ];

            return redirect()->route('categories.index')->with($notification);
        } catch (Exception $e) {
            
            $notification = [
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->route('categories.index')->with($notification);
        }
    }

    public function destroy(Category $category)
{
    try {
        if ($category->products()->exists()) {  
            $notification = [
                'message' => 'Không thể xóa danh mục này vì nó đang được sử dụng trong sản phẩm!',
                'alert-type' => 'error'
            ];
            return redirect()->route('categories.index')->with($notification);
        }


        $category->delete();

        $notification = [
            'message' => 'Danh mục đã bị xóa thành công!',
            'alert-type' => 'success'
        ];

        return redirect()->route('categories.index')->with($notification);
    } catch (Exception $e) {
        $notification = [
            'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
            'alert-type' => 'error'
        ];

        return redirect()->route('categories.index')->with($notification);
    }
}

    
}
