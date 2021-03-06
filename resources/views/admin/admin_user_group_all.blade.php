@include('admin.header')
<div class="content-wrapper" ng-controller="usersGroup">
    @include('admin.modal.admin_user_group_all_power_modal')
    @include('admin.modal.admin_user_group_all_edit_modal')
    @include('admin.modal.admin_user_group_all_contribute_modal')
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
            <div class="col-xs-12">

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">所有用户组</h3>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover  table-bordered table-striped">
                            <tr>
                                <th>ID</th>
                                <th>名称</th>
                                <th>描述</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>

                            <tr ng-repeat="x in data">

                                <td>@{{ x.id }}</td>
                                <td>@{{ x.name }}</td>
                                <td>@{{ x.remark }}</td>
                                <td>@{{ x.status }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-xs btn-flat ng-hide"
                                            ng-click="startUsing(x.name)" ng-show="!x.status ">启用
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs btn-flat"
                                            ng-click="forbidden(x.name)" ng-hide="!x.status ">禁用
                                    </button>
                                    <button type="button" class="btn btn-primary btn-xs btn-flat" data-toggle="modal"
                                            data-target="#admin_user_group_all_edit_modal" ng-click="edit(x)">编辑
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs btn-flat" data-toggle="modal"
                                            data-target="#admin_user_group_all_power_modal" ng-click="setPower(x.name,x)">
                                        权限分配
                                    </button>
                                    <button type="button" class="btn btn-info btn-xs btn-flat" data-toggle="modal"
                                            data-target="#admin_user_group_all_contribute_modal">投稿分类
                                    </button>
                                </td>

                            </tr>

                        </table>
                    </div>

                </div>

            </div>
        </div>
    </section>

</div>
@include('admin.footer')