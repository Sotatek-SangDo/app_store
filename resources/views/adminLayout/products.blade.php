@extends('adminLayout.layout')

@section('title', 'Danh sách sản phẩm')

@section('header-title', 'Danh sách sản phẩm')

@section('script')

@endsection

@section('content')
    @section('content')
    <div class="container" style="width: 100%">
        <div class="row">
            <h2>Danh sách sản phẩm</h2>
            @if(Session::has('success'))
                <div class="message col-md-12">
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                </div>
                @php Session::forget('success') @endphp
            @endif
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá SP</th>
                        <th>Cập nhập</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($products))
                        @foreach($products as $key => $product)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $product['id'] }}</td>
                                <td>{{ $product['pro_name'] }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pro_price }}</td>
                                <td>
                                    <a href="{{ route('pro-g-update', $product->id) }}">
                                        <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                                            <i class="material-icons">mode_edit</i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('remove-pro') }}" method="post">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if(count($products))
                {{ $products->links('layouts.pagination') }}
            @endif
        </div>
    </div>
@endsection
@endsection