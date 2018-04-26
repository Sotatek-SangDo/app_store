<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\UploadService;
use App\Category;
use App\Consts;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct(ProductService $productService, UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
        $this->productService = $productService;
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('adminLayout.dashboard');
    }

    public function productList()
    {
        $products = $this->productService->getAll();
        return view('adminLayout.products', ['products' => $products]);
    }

    public function addNewProduct()
    {
        $categories = $this->productService->getCategories();
        return view('adminLayout.addNewProduct', ['categories' => $categories]);
    }

    public function addNewCategory()
    {
        return view('adminLayout.addNewCategory');
    }

    public function catList()
    {
        $categories = Category::orderByRaw('id DESC')->paginate(Consts::LIMIT);
        return view('adminLayout.categoryList', ['categories' => $categories]);
    }

    public function catStore(Request $request)
    {
        $code_id = str_random(10);
        $name = $request['name'];
        $cat = new Category();
        $cat->name = $name;
        $cat->code_id = $code_id;
        $cat->save();
        Session::put('success', 'Thêm thành công danh mục.');
        return redirect()->route('cat_list');
    }

    public function updateCategory($catID)
    {
        $cat = Category::findOrFail($catID);
        return view('adminLayout.addNewCategory', ['category' => $cat]);
    }

    public function updateCat(Request $request, $catID)
    {
        $cat = Category::findOrFail($catID);
        $cat->name = $request['name'];
        $cat->save();
        Session::put('success', 'Update thành công danh mục.');
        return redirect()->route('cat_list');
    }

    public function deleteCat(Request $request)
    {
        $cat = Category::findOrFail($request['id']);
        $cat->delete();
        Session::put('success', 'Xóa thành công danh mục.');
        return redirect()->route('cat_list');
    }

    public function productStore(Request $request)
    {
        $this->productService->store($request);
        Session::put('success', 'Thêm sản phẩm thành công.');
        return redirect()->route('pro_list');
    }

    public function deleteProduct(Request $request)
    {
        $this->productService->destroy($request['id']);
        Session::put('success', 'Xóa sản phẩm thành công.');
        return redirect()->route('pro_list');
    }
}
