@extends('admin.layout.app')

@section('title')
    <title>分类编辑</title>
@endsection

@section('content')


        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">栏目编辑</strong> /
                <small>Edit Category</small>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">

                <form class="am-form" action="{{ route('admin.category.update',$category->id) }}" method="post">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            分类名称
                        </div>
                        <div class="am-u-sm-8 am-u-md-4">
                            <input type="text" class="am-input-sm" name="name" value="{{$category->name}}">
                        </div>
                        <div class="am-hide-sm-only am-u-md-6"></div>
                    </div>
                    <div class="am-margin">
                        <button type="submit" class="am-btn am-btn-primary am-radius">提交保存</button>
                    </div>
                </form>
            </div>
        </div>

@endsection


@section('js')


@endsection