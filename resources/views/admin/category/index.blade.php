@extends('admin.layout.app')

@section('title')
    <title>分类</title>
    @stop

@section('content')
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">分类及栏目</strong> </div>
    </div>
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <a type="button" class="am-btn am-btn-default" href="{{route('admin.category.create')}}">
                        <span class="am-icon-plus"></span> 新增
                    </a>
                </div>
            </div>
        </div>
        <div class="am-u-sm-12">
            <table class="am-table am-table-bd am-table-striped admin-content-table">
                <thead>
                <tr>
                    <th>栏目名</th>
                    <th>内容数</th>
                    <th>管理</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr data-id="{{$category->id}}">
                    <td>{{$category->name}}</td>
                    <td><span class="am-badge am-badge-success">+20</span></td>
                    <td>

                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">
                                <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                   href="{{route('admin.category.edit', $category->id)}}">
                                    <span class="am-icon-pencil-square-o"></span> 编辑
                                </a>

                                <a data-id="{{$category->id}}" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only del"
                                   href="javascript:;" data-method="delete">
                                    <span class="am-icon-trash-o"></span> 删除
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')
<script>

    $(function(){
        $(".del").click(function(){
            var _this = $(this);
            $.ajax({
                type: "delete",
                url: "/admin/category/delete",
                data: {c_id: _this.data('id')},
                success: function () {
                    _this.parent().parent().parent().parent().fadeOut(600);
                }
            });
        })
    })
</script>
@stop