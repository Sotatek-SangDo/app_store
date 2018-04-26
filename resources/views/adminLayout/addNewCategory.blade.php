@extends('adminLayout.layout')

@section('title', 'Thêm danh mục mới')

@section('header-title', 'Thêm mới')

@section('script')
<style type="text/css">
    .mdl-textfield {
        width: 50% !important;
    }
    .form-group {
        margin: 2% 0;
    }
</style>
@endsection

@section('content')
    <div class="container" style="width: 100%">
        <div class="row">
            @if(!isset($category))
            <div class="upload-exel col-md-12" style="margin: 3% 0">
                <form method="post" action="{{ route('add-category') }}" id="math">
                    {{ csrf_field() }}
                    <label class="col-xs-2 col-md-2" style="padding: 28px 0; font-weight: bolder; font-size: 2.4em"> Thêm mới danh mục : </label>
                    <div class="form-group">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="num" name="name" placeholder="Tên danh mục">
                            <label class="mdl-textfield__label" for="num"></label>
                        </div>
                    </div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">Thêm</button>
                </form>
            </div>
            @else
            <div class="upload-exel col-md-12" style="margin: 3% 0">
                <form method="post" action="{{ route('cat-update', $category->id) }}" id="math">
                    {{ csrf_field() }}
                    <label class="col-xs-2 col-md-2" style="padding: 28px 0; font-weight: bolder; font-size: 2.4em"> Cập nhập danh mục : </label>
                    <div class="form-group">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="num" name="name" value="{{ $category->name }}" placeholder="Tên danh mục">
                            <label class="mdl-textfield__label" for="num"></label>
                        </div>
                    </div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">Cập nhập</button>
                </form>
            </div>
            @endif
        </div>
    </div>
@endsection
