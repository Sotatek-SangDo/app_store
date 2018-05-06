<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Product;
use Log;
use App\Consts;
use App\Services\UploadService;
use App\Category;
use App\ImageProduct;

class ProductService
{
    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function getCategories()
    {
        return Category::all();
    }
    public function getLimitPro($limit)
    {
        $products = Product::limit($limit)->get();
        return $products;
    }
    public function getAllPro()
    {
        $products = Product::join('categories', 'categories.id', '=', 'products.cat_id')
                            ->select('products.id', 'pro_name', 'pro_price', 'pro_thumbnail', 'pro_sub_desc', 'pro_desc', 'categories.name')
                            ->get();
        return $products;
    }

    public function getAll()
    {
        $products = Product::join('categories', 'categories.id', '=', 'products.cat_id')
                            ->select('products.id', 'pro_name', 'pro_price', 'pro_thumbnail', 'pro_sub_desc', 'pro_desc', 'categories.name')
                            ->paginate(Consts::LIMIT_PRO);
        return $products;
    }

    public function getNew()
    {
        $products = Product::join('categories', 'categories.id', '=', 'products.cat_id')
                            ->select('products.id', 'pro_name', 'pro_price', 'pro_thumbnail', 'pro_sub_desc', 'pro_desc', 'categories.name')
                            ->orderByRaw('id DESC')
                            ->paginate(Consts::LIMIT_PRO);
        return $products;
    }

    public function search($search)
    {
        $products = Product::join('categories', 'categories.id', '=', 'products.cat_id')
                            ->select('products.id', 'pro_name', 'pro_price', 'pro_thumbnail', 'pro_sub_desc', 'pro_desc', 'categories.name')
                            ->where('pro_name', 'LIKE', "%$search%")
                            ->orWhere('pro_sub_desc', 'LIKE', "%$search%")
                            ->orWhere('pro_desc', 'LIKE', "%$search%")
                            ->orderByRaw('id DESC')
                            ->paginate(Consts::LIMIT_PRO);
        return $products;
    }

    public function getSlideProduct()
    {
        $products = Product::limit(Consts::SLIDE_LIMIT)->get();

        return $products;
    }

    public function getLastestProduct()
    {
        $products = Product::join('category_products', 'category_products.id', '=', 'products.cat_id')
                            ->select('products.id', 'title', 'thumbnail', 'description', 'category_products.name')
                            ->limit(Consts::LIMIT)
                            ->orderByRaw('products.id DESC')
                            ->first();
        return $products;
    }

    public function getProByCat($codeId)
    {
        $product = Product::join('category_products', 'category_products.id', '=', 'products.cat_id')
                            ->select('products.id', 'title', 'thumbnail', 'description', 'category_products.name')
                            ->limit(Consts::HOME_LIMIT)
                            ->where('category_products.code_id', $codeId)
                            ->get();
        return $product;
    }

    public function getProById($id)
    {
        $product = Product::join('categories', 'categories.id', '=', 'products.cat_id')
                            ->select('products.id', 'pro_name', 'pro_price', 'pro_desc', 'pro_thumbnail', 'categories.name')
                            ->with('imageProducts')
                            ->where('products.id', $id)
                            ->first();
        Log::info($product);
        return $product;
    }

    public function store($request)
    {
        Log::info($request);
        $pro = new Product();
        $catID = $this->getCatIDByName($request['cat_name']);
        $pro->pro_name = $request['pro_name'];
        $pro->pro_desc = $request['pro_desc'];
        $pro->pro_price = $request['pro_price'];
        $pro->pro_sub_desc = $request['pro_sub_desc'];
        $pro->cat_id = $catID[0];
        $pro->pro_thumbnail = $this->uploadService->uploadImg($request['pro_thumbnail']);
        $pro->save();
        $this->addProImages($pro->id, $request);
        return $pro;
    }
    public function addProImages($proId, Request $request)
    {
        foreach ($request['pro_imgs'] as $img) {
            $proImage = new ImageProduct();
            $proImage->pro_id = $proId;
            Log::info($proImage->pro_id);
            $proImage->pro_img = $this->uploadService->uploadImg($img);
            Log::info($proImage->pro_img);
            $proImage->save();
        }
        return true;
    }
    public function getCatIDByName($name)
    {
        return Category::where('name', $name)->pluck('id');
    }
    public function getList()
    {
        return Product::paginate(Consts::LIMIT);
    }

    public function destroy($proId)
    {
        $product = Product::findOrFail($proId);
        $product->delete();
    }

    public function productSearch($request)
    {
        $query = Product::query();

        if($request['search'])
        {
            $query = $this->searchProductsFulltext($request['search']);
        }
        return $query->paginate(50);
    }

    public function searchProductsFulltext($string)
    {
        return Product::whereRaw('MATCH (title, description) AGAINST ("'.$string.'")');
    }
}
