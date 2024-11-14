<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::latest()->get();
        return view('product.index', $data);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        try {
            $product = Product::create($request->all());

            $notification = [
                'message' => 'Sản phẩm đã được lưu thành công!',
                'alert-type' => 'success'
            ];

            return redirect()->route('products.index')->with($notification);

        } catch (Exception $e) {
            $notification = [
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->route('products.index')->with($notification);
        }
    }

    public function edit(Product $product)
    {
        $data['product'] = $product;
        return view('product.edit', $data);
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->image = $request->input('image');
            $product->category_id = $request->input('category_id'); 

            $product->save();

            $notification = [
                'message' => 'Sản phẩm đã được cập nhật thành công!',
                'alert-type' => 'success'
            ];

            return redirect()->route('products.index')->with($notification);
        } catch (Exception $e) {
            // Thông báo lỗi nếu có
            $notification = [
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->route('products.index')->with($notification);
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();

            $notification = [
                'message' => 'Sản phẩm xóa thành công!',
                'alert-type' => 'success'
            ];

            return redirect()->route('products.index')->with($notification);
        } catch (Exception $e) {
            $notification = [
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->route('products.index')->with($notification);
        }
    }
}
