@extends('admin.layout.app')

@section('title')
    <title>新增焦点图</title>
@endsection
@section('css')

@endsection
@section('content')

    @include('admin.layout._msg')
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增焦点图</strong> /
            <small>Create A New Picture</small>
        </div>
    </div>


    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-12">
            <form class="am-form" action="{{ route('admin.picture.store') }}" method="post">
                {!! csrf_field() !!}

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">标题</div>
                    <div class="am-u-sm-8 am-u-md-4">
                        <input type="text" class="am-input-sm" name="title">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6"></div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">轮播图</div>
                    <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                        <div class="am-form-group am-form-file new_thumb">
                            <button type="button" class="am-btn am-btn-secondary am-btn-sm">
                                <i class="am-icon-cloud-upload" id="loading"></i> 上传新的轮播图
                            </button>
                            <input type="file" id="thumb_upload">
                            <input type="hidden" name="thumb">
                        </div>
                        <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />
                        <div>
                            <img src="" id="img_show" style="max-height: 200px;">
                        </div>
                    </div>
                </div>



                <div class="am-margin">
                    <button type="submit" class="am-btn am-btn-primary am-radius">提交保存</button>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('js')
    <script src="/assets/upload/jquery.html5-fileupload.js"></script>
    <script src="/assets/upload/upload.js"></script>

@endsection