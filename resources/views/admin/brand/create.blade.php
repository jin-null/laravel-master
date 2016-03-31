@extends('admin.layouts.layout')
@section('css')
    <link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet" type="text/css"/>

@endsection()
@section('content')
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>新增商品
            </div>

        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form class="form-horizontal" role="form" action="{{route('admin.brand.store')}}" method="post">
                {!! csrf_field() !!}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">商品品牌</label>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">品牌网址</label>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="url">

                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class="control-label col-md-3">品牌logo</label>--}}

                        {{--<div class="col-md-3">--}}
                            {{--<div class="fileinput fileinput-new" data-provides="fileinput">--}}
                                {{--<div class="input-group input-large">--}}
                                    {{--<div class="form-control uneditable-input input-fixed input-medium"--}}
                                         {{--data-trigger="fileinput">--}}
                                        {{--<i class="fa fa-file fileinput-exists"></i>&nbsp;--}}
                                        {{--<span class="fileinput-filename" name="logo" id="thumb_upload"> </span>--}}
                                    {{--</div>--}}
                                                            {{--<span class="input-group-addon btn default btn-file">--}}
                                                                {{--<span class="fileinput-new" > Select file </span>--}}
                                                                {{--<span class="fileinput-exists"> Change </span>--}}
                                                                {{--<input type="file" name="logo"> </span>--}}
                                    {{--<a href="javascript:;" class="input-group-addon btn red fileinput-exists"--}}
                                       {{--data-dismiss="fileinput"> Remove </a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 品牌Logo </label>

                        <div class="col-sm-9">

                            <img id="img_show" class="editable img-responsive" src="" style="width:160px; height:140px;">

                            <input type="text" style="display: none;" placeholder="品牌Logo" class="col-xs-10 col-sm-5" name="logo" id="img">
                            <input type="file" style="display: none;" id="thumb">

                            <button class="btn btn-app btn-purple btn-xs" id ="thumb_upload">
                                <i class="fa fa-file fileinput-exists" id="loading"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">品牌描述</label>

                        <div class="col-md-6">
                            <textarea class="form-control" rows="3" name="desc"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">是否显示</label>

                        <div class="col-md-9">
                            <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-on"
                                 style="width: 100px;">
                                <div class="bootstrap-switch-container" style="width: 147px; margin-left: 0px;">
                                    <input type="checkbox" class="make-switch" checked="" data-on-color="danger"
                                           data-off-color="default" name="is_show" value="1"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">排序</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control" name="sort_order" value="99">

                        </div>
                    </div>
                </div>
                <div class="form-actions fluid">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
@endsection

@section('js')
    <script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>

    <script src="/assets/xshop/jquery.html5-fileupload.js"></script>
    <script src="/assets/xshop/upload.js"></script>
    <!-- page specific plugin scripts -->
@endsection