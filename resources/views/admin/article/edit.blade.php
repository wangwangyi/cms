@extends('admin.layout.app')

@section('title')
    <title>编辑内容</title>
@endsection
@section('css')

@endsection
@section('content')

        @include('admin.layout._msg')
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新编辑内容</strong> /
                <small>Edit Article</small>
            </div>
        </div>


        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">
                <form class="am-form" action="{{ route('admin.article.update',$article->id) }}" method="post">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">所属分类</div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <select data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}" name="category_id">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $article->category_id) selected @endif>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">文章标题</div>
                        <div class="am-u-sm-8 am-u-md-4">
                            <input type="text" class="am-input-sm" name="title" value="{{$article->title}}">
                        </div>
                        <div class="am-hide-sm-only am-u-md-6"></div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">缩略图</div>
                        <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                            <div class="am-form-group am-form-file new_thumb">
                                <button type="button" class="am-btn am-btn-secondary am-btn-sm">
                                    <i class="am-icon-cloud-upload" id="loading"></i> 上传新的缩略图
                                </button>
                                <input type="file" id="thumb_upload">
                                <input type="hidden" name="thumb" value="{{$article->thumb}}">
                            </div>
                            <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />
                            <div>
                                <img src="{{$article->thumb}}" id="img_show" style="max-height: 200px;">
                            </div>
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">摘要</div>
                        <div class="am-u-sm-8 am-u-md-4">
                            <textarea rows="10" name="abstract">{{$article->abstract}}</textarea>
                        </div>
                        <div class="am-hide-sm-only am-u-md-6"></div>
                    </div>

                    <div class="am-g am-margin-top sort">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">介绍</div>
                        <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                            <textarea rows="10" name="desc" id="editor_id">{{$article->desc}}</textarea>
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

    <script src="/assets/kindeditor/kindeditor-min.js"></script>
    <script src="/assets/kindeditor/lang/zh_CN.js"></script>
    <script>
        $(function(){
            KindEditor.ready(function (K) {
                window.editor = K.create('#editor_id');
            });

        })
    </script>
@endsection