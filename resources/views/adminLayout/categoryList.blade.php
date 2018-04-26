@extends('adminLayout.layout')

@section('title', 'Danh sách danh mục')

@section('header-title', 'Danh mục sản phẩm')

@section('script')

@endsection

@section('content')
    @section('content')
    <div class="container" style="width: 100%">
        <div class="row">
            <h2>Danh mục</h2>
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
                        <th>Tên danh mục</th>
                        <th>Cập nhập</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($categories))
                        @foreach($categories as $key => $cat)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $cat['id'] }}</td>
                                <td>{{ $cat['name'] }}</td>
                                <td>
                                    <a href="{{ route('get-update', $cat->id) }}">
                                        <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                                            <i class="material-icons">mode_edit</i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('remove-cat') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $cat->id }}">
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
            @if(count($categories))
                {{ $categories->links('layouts.pagination') }}
            @endif
        </div>
    </div>
@endsection
@endsection