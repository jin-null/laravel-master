@extends('admin.layouts.layout')

@section('content')
        <!-- BEGIN PAGE HEADER-->
<!-- BEGIN THEME PANEL -->
<div class="theme-panel hidden-xs hidden-sm">
    <div class="toggler"></div>
    <div class="toggler-close"></div>

</div>
<!-- END THEME PANEL -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dashboard</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body"
             data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Dashboard
    <small>dashboard & statistics</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Editable Table</span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="brand/create">
                                    <button id="sample_editable_1_new" class="btn green"> Add New
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="dataTables_length" id="sample_editable_1_length"><label> <select
                                            name="sample_editable_1_length" aria-controls="sample_editable_1"
                                            class="form-control input-sm input-xsmall input-inline">
                                        <option value="5">5</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="-1">All</option>
                                    </select> records</label></div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div id="sample_editable_1_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control input-sm input-small input-inline"
                                            placeholder="" aria-controls="sample_editable_1"></label></div>
                        </div>
                    </div>
                    @include('admin.layouts._msg')

                    <div class="table-scrollable">
                        <table class="table table-striped table-hover table-bordered dataTable no-footer"
                               id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label=" Username : activate to sort column descending" style="width: 60px;">
                                                 编号
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                    colspan="1" aria-label=" Full Name : activate to sort column ascending"
                                    style="width: 176px;"> 品牌名称
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                    colspan="1" aria-label=" Points : activate to sort column ascending"
                                    style="width: 108px;"> 品牌LOGO
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                    colspan="1" aria-label=" Notes : activate to sort column ascending"
                                    style="width: 115px;"> 品牌网址
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                    colspan="1" aria-label=" Notes : activate to sort column ascending"
                                    style="width: 80px;"> 排序
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                    colspan="1" aria-label=" Notes : activate to sort column ascending"
                                    style="width: 10px;"> 是否显示
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                    colspan="1" aria-label=" Edit : activate to sort column ascending"
                                    style="width: 150px;"> 操作
                                </th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($brands as $brand)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">
                                        <label > <input type="checkbox" value="{{$brand->id}}">
                                        </label>
                                    </td>
                                    <td> {{$brand->name}}</td>
                                    <td><img src="{{$brand->logo}}" alt=""></td>
                                    <td class="center"><a href="{{$brand->url}}">{{$brand->url}}</a></td>
                                    <td class="center"><input type="text"  data-id="{{$brand->id}}" class="sort_order" value="{{$brand->sort_order}}" style="width: 45px"></td>
                                    <td class="center">

                                        <div class="fa-item col-md-3 col-sm-4">
                                            <i data-id="{{$brand->id}}" @if($brand->is_show==1) class="fa  is_show fa-check " value="1"
                                               @else class="fa is_show fa-times" value="0"
                                                    @endif></i> </div>
                                    </td>
                                    <td>
                                        <a href="brand/{{$brand->id}}/edit" class="btn btn-sm red"> edit
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="brand/{{$brand->id}}" class="btn btn-sm purple"  data-method="delete"
                                        data-token="{{csrf_token()}}" data-confirm="确认删除当前品牌吗?">
                                            <i class="fa fa-times"></i> delete </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="dataTables_info" id="sample_editable_1_info" role="status" aria-live="polite">
                                Showing 1 to 5 of 8 entries
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="dataTables_paginate paging_bootstrap_number" id="sample_editable_1_paginate">
                                <ul class="pagination" style="visibility: visible;">
                                    <li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">

      $(function () {
          $(".sort_order").change(function () {
              var info={
                  id :$(this).data("id"),
                  sort_order:$(this).val()
              }
              console.log(info);
              $.ajax({
                  type:"PATCH",
                  data:info,
                  url:"/admin/brand/sort_order",
              });
          })
      });


      $(function () {
          $(".is_show").click(function () {
              $is_show =$(this).attr("value");
              if($is_show==1){
                  $(this).attr("class","fa is_show fa-times").attr("value",0);
                  $is_show=0;
              }else{
                  $(this).attr("class","fa is_show fa-check").attr("value",1);
                  $is_show=1;
              }

              var info={
                  id :$(this).data("id"),
                  is_show:$(this).attr("value")
              }
              console.log(info);
              $.ajax({
                  type:"PATCH",
                  data:info,
                  url:"/admin/brand/is_show",
              });
//
          });
      })
        </script>
@endsection