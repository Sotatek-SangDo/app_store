@extends('homeLayouts.layouts')

@section('title', 'Trang chủ')
@section('script')

@endsection

@section('content')

<div class="sliderContainer">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="/images/brand-slider-us.png" alt="Los Angeles">
            </div>

            <div class="item">
              <img src="/images/brand-slider-us.png" alt="Chicago">
            </div>
          </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
    <div class="main-container col1-layout">
        <div class="main">
            <div class="col-main">
                <div class="mainTitleContainer">
                    <h1 class="blocktitle"><p style="text-transform: capitalize;">#đơn giản hóa việc nuôi dạy con</p></h1>
                </div>
                <div class="blockContainer clearfix">
                    <div id="block_homepage_first" class="blockHomepage clearfix">
                        <img src="/images/Nouveaut_s.jpg">
                        <div class="TitleContainer">
                            <p>Created for you.. with you</p>
                            <h3>Sản phẩm mới</h3>
                            <a class="ctaBlock" href="{{ route('new-pro') }}">Xem chi tiết</a>
                        </div>
                    </div>
                    <div id="block_homepage_second" class="blockHomepage clearfix">
                        <img src="/images/REPAS.jpg">
                        <img class="hover" src="/images/fond-rose.png">
                        <div class="TitleContainer">
                            <p>All to Simply </p>
                            <h3>Thông tin thêm</h3>
                            <a class="ctaBlock" href="#">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="categoryContainer">
                    <nav class="tabs-bar">
                        <ul>
                            <li><a class="tab-silder active-links" data-class="tab1">Sản phẩm mới</a></li>
                            <li><a class="tab-silder" data-class="tab2">Sản phẩm bán chạy</a></li>
                        </ul>
                    </nav>
                    <div data-class="tab1" class="tabsSlider active-tabs">
                        <div class="slideContainertab slick-initialized slick-slider">
                            <div aria-live="polite" class="slick-list draggable">
                                <div class="slick-track" role="listbox">
                                    <ul id="flexiselDemo1">
                                        @forelse ($products as $product)
                                            <li>
                                            <div class="slider_cat-product slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 236px;" tabindex="-1" role="option" aria-describedby="slick-slide10">
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
                            </div>
                        </div>
                    </div>
                    <div data-class="tab2" class="tabsSlider">
                        <div class="slideContainertab slick-initialized slick-slider">
                            <div aria-live="polite" class="slick-list draggable">
                                <div class="slick-track" role="listbox">
                                    <ul id="flexiselDemo2">
                                        @forelse ($products as $product)
                                            <li>
                                            <div class="slider_cat-product slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 236px;" tabindex="-1" role="option" aria-describedby="slick-slide10">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection