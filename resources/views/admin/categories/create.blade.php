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
            <form class="form-horizontal" role="form" action="{{route('admin.category.store')}}" method="post">
                {!! csrf_field() !!}
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">分类名称</label>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">上级分类</label>

                        <div class="col-md-4">

                            <select id="select2-single-input-sm" name="parent_id"
                                    class="form-control input-sm select2-multiple select2-hidden-accessible"
                                    tabindex="-1" aria-hidden="true">

                                <option value="0">顶级栏目</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{ blank_to_category($category->count) }}{{$category->name}}</option>
                                @endforeach

                            </select>
                            <span class="select2 select2-container select2-container--bootstrap select2-container--below"
                                  dir="ltr">
                                <span class="selection">
                                    <span class="select2-selection select2-selection--single" role="combobox"
                                          aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"
                                          tabindex="0"
                                          aria-labelledby="select2-select2-single-input-sm-container">
                                        <span class="select2-selection__rendered"
                                              id="select2-select2-single-input-sm-container"
                                              title="Alaska">
                                        </span>
                                        <span class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b>
                                        </span>
                                    </span>
                                </span>
                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类代表图片 </label>

                        <div class="col-sm-9">

                            <img id="img_show" class="editable img-responsive" src=""
                                 style="width:160px; height:140px;display: none">

                            <input type="text" style="display: none;" placeholder="品牌Logo" class="col-xs-10 col-sm-5"
                                   name="thumb" id="img">
                            <input type="file" style="display: none;" id="thumb">


                            <button class="btn btn-app btn green-meadow" id="thumb_upload">
                                <i class="fa fa-file fileinput-exists" id="loading">选择要上传的图片</i>
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
                        <label class="col-md-3 control-label">是否显示</label>

                        <div class="radio-list">
                            <label class="radio-inline">
                                <div class="radio" id="uniform-optionsRadios4">
                                        <input type="radio" name="is_show" id="optionsRadios4"
                                               value="1" checked=""></div>
                                是 </label>
                            <label class="radio-inline">
                                <div class="radio" id="uniform-optionsRadios5">
                                        <input type="radio" name="is_show" id="optionsRadios5"
                                               value="0"></div>
                                否 </label>
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