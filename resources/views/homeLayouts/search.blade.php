@extends('homeLayouts.layouts')

@section('title', 'Tìm kiếm')
@section('script')

@endsection

@section('content')
    <div class="main-container col1-layout">
        <div class="main">
            <div class="col-main">
                <h4 class="header"> Tìm kiếm: {{ $search }}</h4>
                <div class="slick-track" role="listbox">
                    <ul id="products">
                        @forelse ($products as $product)
                            <li class="product__item">
                                <div class="slider_cat-product">
                                    <div class="product-content">
                                        <img class="imgProduct" src="{{ $product->pro_thumbnail }}" alt="Duo Meal Station">
                                        <a class="cta-product" href="{{ url('detail/'.$product->id) }}" tabindex="0">Chi tiết...</a>
                                    </div>
                                    <div class="infosproducts">
                                        <h4 class="name_article">{{ $product->pro_name }}</h4>
                                        <p class="shortDescription">{{ str_limit($product->pro_sub_desc, 120) }}</p>
                                        <div class="price-box">
                                            <p class="product_reco-price">Giá</p>
                                            <span class="regular-price" id="product-price-564">
                                                <span class="price">{{ $product->pro_price }} VND</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <p>Ko co san pham</p>
                        @endforelse
                    </ul>
                </div>
                <div class="paginations">
                    @if(count($products))
                        {{ $products->links('layouts.pagination') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection