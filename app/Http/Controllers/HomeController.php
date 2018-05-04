<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Consts;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductService $productServices)
    {
        $this->productServices = $productServices;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productServices->getLimitPro(Consts::HOME_PRO_LIMIT);
        return view('homeLayouts.index', ["products" => $products]);
    }

    public function getAll()
    {
        $products = $this->productServices->getAll();
        return view('homeLayouts.products', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $search = $request['search'];
        $products = $this->productServices->search($search);
        return view('homeLayouts.search', ['products' => $products, 'search' => $search ]);
    }

    public function getNews()
    {
        $products = $this->productServices->getNew();
        return view('homeLayouts.new_products', ['products' => $products]);
    }

    public function detail(Request $request, $id)
    {
        $pro = $this->productServices->getProById($request['id']);
        return view('homeLayouts.detail', ['pro' => $pro]);
    }
}
