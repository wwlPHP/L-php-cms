@include('admin.header')
<div class="content-wrapper" ng-controller="bannerManage" ng-init="bannerGet()">
    @include('admin.modal.banner_item_add_modal')

    <section class="content-header">
        <h1>
            {{$cms}}
            <small>{{$item}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>主页</a></li>
            <li><a href="#">{{$category }}</a></li>
            <li class="active">{{$item}}</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <a href="" role="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#banner_add_modal">
                        <span class="fa fa-plus-square" aria-hidden="true">&nbsp;</span>新增轮播
                    </a>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$item}}</h3>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered  table-striped">
                            <tr>
                                <th style="width: 10px"><input type="checkbox" class="minimal"></th>
                                <th>轮播名称</th>
                                <th>轮播位置</th>
                                <th>描述</th>


                                <th>操作</th>
                            </tr>
                            <tr ng-repeat="x in bannerData">
                                <td><input type="checkbox" class="minimal"></td>
                                <td>@{{x.name}}</td>
                                <td>@{{x.location}}</td>
                                <td>@{{x.remark}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs btn-flat" data-toggle="modal"
                                            data-target="#category_all_edit_modal" ng-click="editBanner(x)">编辑</button>
                                    <button type="button" class="btn btn-danger btn-xs btn-flat" data-toggle="modal"
                                            data-target="#category_all_remove_modal" ng-click="remove(x)">删除</button>
                                </td>
                            </tr>

                        </table>
                    </div>

                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@include('admin.footer')