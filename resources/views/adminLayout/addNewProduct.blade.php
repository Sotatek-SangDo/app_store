@extends('adminLayout.layout')

@section('title', 'Thêm sản phẩm mới')

@section('header-title', 'Thêm mới')

@section('script')
<style type="text/css">
        .mdl-button--file input {
            cursor: pointer;
            height: 100%;
            right: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 300px;
            z-index: 4;
        }
        .mdl-textfield--file .mdl-textfield__input {
            box-sizing: border-box;
            width: calc(100% - 32px);
        }
        .mdl-textfield--file .mdl-button--file {
            right: 0;
        }
        .class {
            margin-right: 30px;
        }
        span.add-on {
            width: 30px !important;
            height: 30px !important;
            text-align: center !important;
            vertical-align: middle !important;
            padding: 6px 0 0 7px !important;
        }
        .col-md-4.img {
            display: inline-block;
            max-width: 30%;
            margin-right: 30px;
        }
        .mdl-textfield {
            width: 60% !important;
        }
        .form-group {
            margin: 2% 0;
        }
        .mdl-menu__outline,
        .is-upgraded.is-visible {
            width: 100% !important
        }
    </style>
    <script type="text/javascript">
       function changeUpload(event, idInput, idShowImg) {
            var input = $(idInput);
            if(typeof input[0].files[0].name != undefined) {
                input.parent().parent().find('.upload').val(input[0].files[0].name);
            }

            var files = event.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var html = '';
            filesArr.forEach(function(f) {
                html += '<div class="col-md-4 img"><img src="'+ URL.createObjectURL(f) +'" width="320" height="250"></div>';
            });
            var output = document.getElementById(idShowImg);
            output.innerHTML = html;
       }

    </script>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/froala_editor.pkgd.min.css">
    <script type="text/javascript" src="/js/froala_editor.pkgd.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/froala_style.min.css"/>
    <script>
        $(function() {
            $('textarea#froala-editor').froalaEditor({
                height: '500px'
            });
        });
    </script>
@endsection

@section('content')
     <div class="container" style="width: 100%;">
        <div class="row">
            <div class="upload-exel col-md-12" style="margin: 3% 0">
                <form method="post" action="{{ route('add-product') }}" id="math" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label class="col-xs-2 col-md-2" style="padding: 28px 0; font-weight: bolder; font-size: 2.4em"> Thêm mới sản phẩm : </label>
                    <div class="form-group">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="num" name="pro_name" placeholder="Tên sản phẩm">
                            <label class="mdl-textfield__label" for="num"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth class">
                            <input class="mdl-textfield__input query-form" type="text" name="cat_name" id="time" readonly tabIndex="-1">
                            <label for="time" class="mdl-textfield__label">Danh mục sản phẩm</label>
                            <ul for="time" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                @if(count($categories))
                                    @foreach($categories as $cat)
                                        <li class="mdl-menu__item">{{ $cat->name }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="price" name="pro_price" placeholder="Giá sản phẩm">
                            <label class="mdl-textfield__label" for="price"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="sub" name="pro_sub_desc" placeholder="Mô tả ngắn ngọn">
                            <label class="mdl-textfield__label" for="sub"></label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-2">
                            <label>Chi tiết sản phẩm: </label>
                        </div>
                        <div class="col-md-8">
                            <textarea id="froala-editor" name="pro_desc"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                            <input class="mdl-textfield__input upload" placeholder="upload ảnh đại diện cho sản phẩm" type="text" id="uploadFile" readonly/>
                            <div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file">
                                <i class="material-icons">attach_file</i>
                                <input type="file" id="uploadBtn" name="pro_thumbnail" accept="image/*" onchange="changeUpload(event, '#uploadBtn', 'show-image')">
                            </div>
                        </div>
                        <div class="col-md-12" id="show-image"></div>
                    </div>
                    <div class="form-group">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                            <input class="mdl-textfield__input upload" placeholder="Upload hỉnh ảnh sản phẩm" type="text" id="uploadFile" readonly/>
                            <div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file">
                                <i class="material-icons">attach_file</i>
                                <input type="file" id="uploadImg" name="pro_imgs[]" multiple accept="image/*" onchange="changeUpload(event, '#uploadImg', 'show-img')">
                            </div>
                        </div>
                        <div class="col-md-12" id="show-img"></div>
                    </div>
                    </div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">Thêm</button>
                </form>
            </div>
        </div>
    </div>

@endsection