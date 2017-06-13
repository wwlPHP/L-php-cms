<!-- 模态框（Modal） -->
<div class="modal fade" id="admin_user_all_edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true"
     ng-click="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">提示</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" onsubmit="return false;">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">昵称</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="请输入昵称"
                                       ng-model="user.name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户组</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="pid" ng-model="pid"
                                        ng-options="x.id as x.name for x in pidOptions">
                                    <option value="">-- 请选择 --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">邮箱</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="请输入邮箱"
                                       ng-model="user.name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">手机号码</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="请输入邮箱"
                                       ng-model="user.name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">备注</label>
                            <div class="col-sm-10">
                                <textarea name="remark" class="form-control" rows="3" placeholder="请输入备注信息"
                                          ng-model="user.remark"></textarea>
                            </div>
                        </div>
                    </div>


                </form>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" ng-click="editCommit(user)">提交</button>
            </div>
        </div>

    </div>

</div>
