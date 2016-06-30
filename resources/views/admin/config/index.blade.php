@extends('admin.layout.app')

@section('title')
    <title>站点信息</title>
@endsection
@section('content')


        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">站点信息</strong> /
                <small>Config</small>
            </div>
        </div>

        @include('admin.layout._msg')

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">

                <div class="am-tab-panel">

                    <form class="am-form " action="/admin/setting/config" method="post">
                        {!! csrf_field() !!}
                        {!! method_field('put') !!}

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                网站名称 <span class="am-badge am-badge-success am-round">name</span>
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" class="am-input-sm" name="name" value="{{$system->name}}">
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                关键词 <span class="am-badge am-badge-warning am-round">keyword</span>
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <textarea rows="3" name="keywords">{{$system->keywords}}</textarea>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                描述信息 <span class="am-badge am-badge-primary am-round">content</span>
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <textarea rows="4" name="content">{{$system->content}}</textarea>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                网站图标 <span class="am-badge am-badge-secondary am-round">shortcut icon</span>
                            </div>

                            <div class="am-u-sm-4 am-u-md-3">

                                <div class="am-form-group am-form-file">
                                    <button type="button" class="am-btn am-btn-success am-btn-sm">
                                        <i class="am-icon-cloud-upload" id="loading"></i> 选择要上传的图标
                                    </button>
                                    <input type="file" id="thumb_upload">
                                </div>
                            </div>

                            <div class="am-u-sm-4 am-u-md-6">
                                <img src="/favicon.ico" id="img_show" style="max-height: 200px;">
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                ICP备案号
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" class="am-input-sm" name="icp" value="{{$system->icp}}">
                            </div>
                        </div>



                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                公司名
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" class="am-input-sm" name="company" value="{{$system->company}}">
                            </div>
                        </div>


                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                电子邮件
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" class="am-input-sm" name="email" value="{{$system->email}}">
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                电话
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" class="am-input-sm" name="tel"
                                       value="{{$system->tel}}">
                            </div>
                        </div>


                        <div class="am-margin">
                            <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

@endsection

@section('js')
    <script src="/assets/upload/jquery.html5-fileupload.js"></script>
    <script>
        //文件上传
        var opts = {
            url: "/upload_icon",
            type: "POST",
            beforeSend: function () {
                $("#loading").attr("class", "am-icon-spinner am-icon-pulse");
            },
            success: function (result, status, xhr) {
//                console.log(result);
                if (result.status == "0") {
                    alert(result.info);
                    return false;
                }
                $("#loading").attr("class", "am-icon-cloud-upload");
                var src = '/favicon.ico?' + Math.random();
                $("#img_show").attr('src', src);
            },
            error: function (result, status, errorThrown) {
                alert('文件上传失败');
            }
        }
        $('#thumb_upload').fileUpload(opts);
    </script>
@endsection