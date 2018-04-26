@extends('homeLayouts.layouts')

@section('title', 'Chi tiết sản phẩm')
@section('script')

@endsection

@section('content')
<div class="main-container col1-layout">
    <div class="main">
        <div class="breadcrumbs">
        </div>
        <div class="col-main">
            <div id="ajaxcart_messages"></div>
            <div id="messages_product_view"></div>
            <div class="product-view">
                <div class="product-essential">
                    <form action="#">
                        <div class="product-img-box">
                            <div id="bbm-media-box">
                                <div class="product-image product-image-zoom">
                                    <div class="product-image-gallery">
                                        <img id="image-main" class="gallery-image visible" src="{{ $pro['imageProducts'][0]->pro_img }}" alt="Babyni" title="Babyni">
                                    </div>
                                </div>
                                <div class="more-views">
                                    <ul class="product-image-thumbs">
                                        @forelse($pro['imageProducts'] as $img)
                                            <li>
                                                <a class="thumb-link" href="#" title="" data-image-index="0">
                                                    <img src="{{ $img->pro_img }}" alt="" width="60" height="60">
                                                </a>
                                            </li>
                                        @empty
                                            <img id="image-main" class="gallery-image visible" src="">
                                            <li>
                                                <a class="thumb-link" href="#" title="" data-image-index="0">
                                                    <img src="" alt="{{ $pro->pro_thumnail }}" width="25" height="25">
                                                </a>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <ul class="product_awards-list">
                            </ul>
                        </div>
                        <div class="product-shop">
                            <div class="product-name">
                                <h1 class="h1">{{ $pro->pro_name}}</h1>
                            </div>
                            <h2 class="short-description">
                                {!! $pro->pro_desc !!}
                            </div>
                            <div class="product_sell-box">
                                <div class="price-info">
                                    <div class="price-box">
                                        <p class="product-price">Danh mục: {{ $pro->name}}</p>
                                        <p class="price-title">Giá</p>
                                        <span class="regular-price" id="product-price">
                                            <span class="price">{{ $pro->pro_price }} VNĐ</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="product_sell-options">
                                    <p class="title-contact">Liên hệ:</p>
                                    <span class="num">0987543312</span>
                                </div>
                            </div>
                        </div>
                        <div class="add-to-cart-wrapper">
                            <div class="add-to-box">
                            </div>
                        </div>
                        <div class="clearer"></div>
                    </form>
                </div>
            </div>
            <!-- Product tabs - Global container -->
            <div id="tabs" class="product-tabs">
                <!-- Control button for tabs system -->
                <div class="product-tabs_control-box" id="tab-menu_list-block">
                    <button class="product-tabs_control-btn active">
                        Mô tả</button>
                </div>
                <!-- Tabs container -->
                <div id="Description" class="tabcontent" style="display: block;">
                    <div class="descriptive_content descriptive_only-txt">
                        {!! $pro->pro_desc !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection