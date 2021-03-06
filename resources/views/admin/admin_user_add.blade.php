@include('admin.header')
<div class="content-wrapper" ng-controller="adminUserAdd">
  <!-- Content Header (Page header) -->
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

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{$item}}</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form name="myForm" class="form-horizontal"   onsubmit="return false;">
      <div class="box-body">
        <div class="form-group"
             ng-class="{'has-warning':myForm.adminUser_username.$invalid && !myForm.adminUser_username.$pristine,'has-success':myForm.adminUser_username.$valid && !myForm.adminUser_username.$pristine,'has-error':isUsernameExist}">
          <label for="adminUser_username" class="col-sm-2 control-label">用户名</label>

          <div class="col-sm-10">
            <input type="text"
                   class="form-control ng-invalid ng-touched ng-dirty ng-valid-parse ng-valid-required ng-invalid-pattern"
                   id="adminUser_username" name="adminUser_username" ng-model="adminUser_username"
                   placeholder="请输入用户名" ng-keyup="checkUsername(adminUser_username)" required
                   ng-pattern="/^[a-zA-Z]\w{5,19}$/">
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_username.$invalid && !myForm.adminUser_username.$pristine"><span
              class="glyphicon glyphicon-remove"></span>对不起，用户名格式不正确！</span>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_username.$valid && !myForm.adminUser_username.$pristine && isUsernameExist"><span
              class="glyphicon glyphicon-remove"></span>对不起，该用户名已经存在！</span>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_username.$valid && !myForm.adminUser_username.$pristine && !isUsernameExist"><span
              class="glyphicon glyphicon-ok"></span>恭喜您，该用户名可用！</span>
          </div>
        </div>
        <div class="form-group"
             ng-class="{'has-warning':myForm.adminUser_nickname.$invalid && !myForm.adminUser_nickname.$pristine,'has-success':myForm.adminUser_nickname.$valid && !myForm.adminUser_nickname.$pristine}">
          <label for="adminUser_nickname" class="col-sm-2 control-label">昵称</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="adminUser_nickname" name="adminUser_nickname"
                   ng-model="adminUser_nickname" placeholder="请输入昵称" ng-pattern="/[\u4e00-\u9fa5]/"
                   ng-minlength="2" ng-maxlength="6" required>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_nickname.$invalid && !myForm.adminUser_nickname.$pristine"><span
              class="glyphicon glyphicon-remove"></span>对不起，昵称必须为2~6个中文字！</span>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_nickname.$valid && !myForm.adminUser_nickname.$pristine"><span
              class="glyphicon glyphicon-ok"></span>恭喜您，该昵称可用！</span>
          </div>
        </div>


        <!--用户头像上传-->
        <!--<div class="form-group"-->
             <!--ng-class="{'has-warning':myForm.adminUser_avatar.$invalid && !myForm.adminUser_avatar.$pristine,'has-success':myForm.adminUser_avatar.$valid && !myForm.adminUser_avatar.$pristine}">-->
          <!--<label for="adminUser_avatar" class="col-sm-2 control-label">用户头像</label>-->
          <!--<div class="col-sm-10">-->
            <!--<input type="file" id="adminUser_avatar" name="adminUser_avatar" ng-model="adminUser_avatar" required>-->
            <!--<img ng-src="@{{imageSrc}}" style="max-width:300px;max-height:300px;margin:0 auto;display:block;"/>-->
            <!--<span class="help-block ng-hide"-->
                  <!--ng-show="myForm.adminUser_avatar.$invalid && !myForm.adminUser_avatar.$pristine"><span-->
              <!--class="glyphicon glyphicon-remove"></span>对不起，请选择一个头像文件！</span>-->
            <!--<span class="help-block ng-hide"-->
                  <!--ng-show="myForm.adminUser_avatar.$valid && !myForm.adminUser_avatar.$pristine"><span-->
              <!--class="glyphicon glyphicon-ok"></span>恭喜您，您已选择头像文件！</span>-->
          <!--</div>-->
        <!--</div>-->

        <div class="form-group">
          <label class="col-sm-2 control-label">头像</label>
          <div class="col-sm-10">
            <img src="@{{logo}}" alt="" class="img-circle col-sm-2" id="adminUser_avatar_preview"/>
            <p id="adminUser_avatar"></p>
          </div>
        </div>


        <div class="form-group"
             ng-class="{'has-warning':myForm.adminUser_password.$invalid && !myForm.adminUser_password.$pristine,'has-success':myForm.adminUser_password.$valid && !myForm.adminUser_password.$pristine}">
          <label for="adminUser_password" class="col-sm-2 control-label">密码</label>

          <div class="col-sm-10">
            <input type="password" class="form-control" id="adminUser_password" name="adminUser_password"
                   ng-model="adminUser_password" placeholder="请输入密码" ng-pattern="/^[_a-zA-Z]\w{5,21}$/" required>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_password.$invalid && !myForm.adminUser_password.$pristine"><span
              class="glyphicon glyphicon-remove"></span>对不起，密码必须为字母或者下划线_开头，只能包含字母、数字、下划线_，且长度为6~22位！</span>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_password.$valid && !myForm.adminUser_password.$pristine"><span
              class="glyphicon glyphicon-ok"></span>恭喜您，该密码可用！</span>
          </div>
        </div>

        <!--确认密码-->
        <div class="form-group"
             ng-class="{'has-warning':myForm.adminUser_repassword.$invalid && !myForm.adminUser_repassword.$pristine,'has-success':myForm.adminUser_repassword.$valid && !myForm.adminUser_repassword.$pristine}">
          <label for="adminUser_repassword" class="col-sm-2 control-label">确认密码</label>

          <div class="col-sm-10">
            <input type="password" class="form-control" pw-check="adminUser_password" id="adminUser_repassword"
                   name="adminUser_repassword" ng-model="adminUser_repassword" placeholder="请再次输入密码"
                   ng-pattern="/^[_a-zA-Z]\w{5,21}$/" required>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_repassword.$invalid && !myForm.adminUser_repassword.$pristine"><span
              class="glyphicon glyphicon-remove"></span>对不起，两次输入密码不相同！</span>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_repassword.$valid && !myForm.adminUser_repassword.$pristine"><span
              class="glyphicon glyphicon-ok"></span>恭喜您，两次密码输入一致！</span>
          </div>
        </div>


        <div class="form-group"
             ng-class="{'has-warning':myForm.adminUser_userGroup.$invalid && !myForm.adminUser_userGroup.$pristine,'has-success':myForm.adminUser_userGroup.$valid && !myForm.adminUser_userGroup.$pristine}">
          <label class="col-sm-2 control-label">用户组</label>
          <div class="col-sm-10">
            <select class="form-control" name="adminUser_userGroup" ng-model="adminUser_userGroup"
                    ng-options="x.id as x.name for x in userGroupOptions" required>
              <option value="">-- 请选择 --</option>
            </select>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_userGroup.$invalid && !myForm.adminUser_userGroup.$pristine"><span
              class="glyphicon glyphicon-remove"></span>对不起，您必须选择一项！</span>
          </div>
        </div>

        <div class="form-group"
             ng-class="{'has-warning':myForm.adminUser_status.$invalid && !myForm.adminUser_status.$pristine,'has-success':myForm.adminUser_status.$valid && !myForm.adminUser_status.$pristine}">
          <label class="col-sm-2 control-label">状态</label>
          <div class="col-sm-10">
            <select class="form-control" name="adminUser_status" ng-model="adminUser_status"
                    ng-options="x.id as x.name for x in statusOptions" required>
              <option value="">-- 请选择 --</option>
            </select>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_status.$invalid && !myForm.adminUser_status.$pristine"><span
                      class="glyphicon glyphicon-remove"></span>对不起，您必须选择一项！</span>
          </div>
        </div>


        <div class="form-group"
             ng-class="{'has-warning':myForm.adminUser_phone.$invalid && !myForm.adminUser_phone.$pristine,'has-success':myForm.adminUser_phone.$valid && !myForm.adminUser_phone.$pristine}">
          <label for="adminUser_phone" class="col-sm-2 control-label">电话</label>

          <div class="col-sm-10">
            <input type="tel" class="form-control" id="adminUser_phone" placeholder="请输入联系电话"
                   name="adminUser_phone" ng-model="adminUser_phone" required
                   ng-pattern="/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/">
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_phone.$invalid && !myForm.adminUser_phone.$pristine"><span
              class="glyphicon glyphicon-remove"></span>对不起，电话号码格式不正确！</span>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_phone.$valid && !myForm.adminUser_phone.$pristine"><span
              class="glyphicon glyphicon-ok"></span>恭喜您，电话号码格式符合要求！</span>
          </div>
        </div>
        <div class="form-group"
             ng-class="{'has-warning':myForm.adminUser_email.$invalid && !myForm.adminUser_email.$pristine,'has-success':myForm.adminUser_email.$valid && !myForm.adminUser_email.$pristine}">
          <label for="adminUser_email" class="col-sm-2 control-label">邮箱</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="adminUser_email" name="adminUser_email"
                   ng-model="adminUser_email" placeholder="请输入邮箱" required
                   ng-pattern="/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/">
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_email.$invalid && !myForm.adminUser_email.$pristine"><span
              class="glyphicon glyphicon-remove"></span>对不起，邮箱格式不正确！</span>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_email.$valid && !myForm.adminUser_email.$pristine"><span
              class="glyphicon glyphicon-ok"></span>恭喜您，邮箱格式符合要求！</span>
          </div>
        </div>
        <div class="form-group"
             ng-class="{'has-warning':myForm.adminUser_remark.$invalid && !myForm.adminUser_remark.$pristine,'has-success':myForm.adminUser_remark.$valid && !myForm.adminUser_remark.$pristine}">
          <label class="col-sm-2 control-label">备注</label>
          <div class="col-sm-10">
            <textarea class="form-control" rows="3" placeholder="请输入备注信息" name="adminUser_remark"
                      ng-model="adminUser_remark" required ng-minlength="5" ng-maxlength="30"></textarea>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_remark.$invalid && !myForm.adminUser_remark.$pristine"> <span
              class="glyphicon glyphicon-remove"></span>请输入5~30个字符！</span>
            <span class="help-block ng-hide"
                  ng-show="myForm.adminUser_remark.$valid && !myForm.adminUser_remark.$pristine"> <span
              class="glyphicon glyphicon-ok"></span>符合要求！</span>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">

        <button type="submit" class="btn btn-primary pull-right" ng-click="addAdminUser()" ng-disabled="myForm.$invalid">添加
        </button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
@include('admin.footer')