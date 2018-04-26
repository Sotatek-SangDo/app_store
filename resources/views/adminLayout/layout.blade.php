@include('adminLayout.header')
@include('adminLayout.menu')
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            @yield('content')
        </div>
    </main>
@include('adminLayout.footer')
