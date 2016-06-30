@extends('admin.layout.app')

@section('title')
    <title>内容</title>
@stop

@section('content')
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">内容管理</strong> / <small>Article</small></div>
        </div>

        <hr>

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a type="button" class="am-btn am-btn-default" href="{{route('admin.article.create')}}">
                            <span class="am-icon-plus"></span> 新增
                        </a>
                        <button type="button" id="destroy_checked" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                </div>
            </div>

        </div>
        @include('admin.layout._msg')
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">
                <form class="am-form-inline" role="form" method="get">

                    <div class="am-form-group">
                        <input type="text" name="title" class="am-form-field am-input-sm" placeholder="标题" value="{{ Request::input('title') }}">
                    </div>

                    <div class="am-form-group">
                        <select data-am-selected="{btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                name="category_id">
                            <option value="-1">所有分类</option>
                            @foreach ($categories as $c)
                                <option value="{{$c->id}}" @if($c->id == Request::input('category_id')) selected @endif>
                                    {{$c->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button class="am-btn am-btn-default" type="submit">搜索</button>
                </form>
            </div>
        </div>


        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-check"><input type="checkbox" id="CheckedAll"/></th>
                            <th class="table-title">标题</th>
                            <th class="table-type">类别</th>
                            <th class="table-date am-hide-sm-only">发布日期</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($articles as $article)
                        <tr>
                            <td><input type="checkbox" type="checkbox" value="{{$article->id}}" class="checked_id"
                                       name="checked_id[]"/>
                            </td>
                            <td><a href="#">{{$article->title}}</a></td>
                            <td class="am-hide-sm-only">{{$article->category->name}}</td>
                            <td class="am-hide-sm-only">{{$article->created_at}}</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                           href="{{route('admin.article.edit', $article->id)}}">
                                            <span class="am-icon-pencil-square-o"></span> 编辑
                                        </a>
                                        <button data-id="{{$article->id}}" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only del"><span class="am-icon-trash-o"></span> 删除</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="am-cf">
                        共 {{ \App\Models\Article::count() }} 条记录
                        <div class="am-fr">
                            {!! $articles->appends(Request::all())->links() !!}
                        </div>
                    </div>
                    <hr />
                </form>
            </div>

        </div>
    </div>
    @endsection

@section('js')
   <script>
       $(function(){
           //全选,反选
           $("#CheckedAll").click(function () {
               $(':checkbox').prop("checked", this.checked);
           });

           //删除所选
           $('#destroy_checked').click(function () {
               var length = $(".checked_id:checked").length;
               if (length == 0) {
                   alert("您必须至少选中一条!");
                   return false;
               }

               var checked_id = $(".checked_id:checked").serialize();

               $.ajax({
                   type: "DELETE",
                   url: "/admin/article/destroy_checked",
                   data: checked_id,
                   success: function () {
                       location.href = location.href;
                   }
               });
           });

           $(".del").click(function(){
               var _this = $(this);
               $.ajax({
                   type: "delete",
                   url: "/admin/article/delete",
                   data: {article_id: _this.data('id')},
                   success: function (){
                       _this.parent().parent().parent().parent().fadeOut(600);
                   }
               })
           })
       })
   </script>
    @stop