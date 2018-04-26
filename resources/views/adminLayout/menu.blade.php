<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="/images/user.jpg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            @auth
                <span>{{ Auth::user()->name }}</span>
            @endauth
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">More</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                <li class="mdl-menu__item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="material-icons" >exit_to_app</i>Đăng Xuất
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link {{ Request::is('admin') ? 'is-active-menu' : '' }}" href="{{ route('admin')}}">
                <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>
                Quản lý
            </a>
            <a class="mdl-navigation__link  {{ Request::is('admin/product/list') ? 'is-active-menu' : '' }}" href="{{ route('pro_list') }}">
                <i class="mdl-color-text--blue-grey-400 material-icons">view_list</i>
                Danh sách sản phẩm
            </a>
            <a class="mdl-navigation__link  {{ Request::is('admin/product/add') ? 'is-active-menu' : '' }}" href="{{ route('add-pro') }}">
                <i class="mdl-color-text--blue-grey-400 material-icons">add_circle</i>
                Thêm sản phẩm mới
            </a>
            <a class="mdl-navigation__link  {{ Request::is('admin/category/list') ? 'is-active-menu' : '' }}" href="{{ route('cat_list') }}">
                <i class="mdl-color-text--blue-grey-400 material-icons">view_list</i>
                Danh mục
            </a>
            <a class="mdl-navigation__link  {{ Request::is('admin/category/add') ? 'is-active-menu' : '' }}" href="{{ route('add-cat') }}">
                <i class="mdl-color-text--blue-grey-400 material-icons">add_circle</i>
                Thêm danh mục
            </a>
            <!-- <a class="mdl-navigation__link" href="">
                <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i>
                Spam
            </a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Forums</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Updates</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_offer</i>Promos</a>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Purchases</a> -->
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Social</a>
            <div class="mdl-layout-spacer"></div>
            <!-- <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a> -->
        </nav>
        <div class="mdl-mini-footer__left-section" style="padding: 15px 0px 0px 15px;">
            <img src="/images/logo-footer.png" width="100" height="85" style="float: left;">
            <div class="mdl-logo logo-footer">Product by SH team.</div>
        </div>
        <div class="mdl-mini-footer__right-section" style="padding-top: 3%; padding-left: 15px;">
            <ul class="mdl-mini-footer__link-list">
                <li><a href="#">Liên Hệ: 0962555724</a></li>
            </ul>
        </div>
      </div>