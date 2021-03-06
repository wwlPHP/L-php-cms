@include('install.header')

<div class="content-wrapper" ng-controller="environmentTest">

  <section class="content-header">
    <h1>
      安装程序
      <small>环境测试</small>
    </h1>

  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">服务器信息</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-bordered table-striped">
              <tr>
                <th>参数</th>
                <th>值</th>

              </tr>
              <tr>
                <td>服务器域名</td>
                <td><%= domain %></td>

              </tr>
              <tr>
                <td>服务器操作系统</td>
                <td><%= os %></td>

              </tr>
              <tr>
                <td>服务器解译引擎</td>
                <td><%= engine %></td>

              </tr>
              <tr>
                <td>nodeJS版本</td>
                <td><%= nodeVersion %></td>

              </tr>
              <tr>
                <td>系统安装目录</td>
                <td><%= path %></td>

              </tr>
            </table>
          </div>

        </div>
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">系统环境检测</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-bordered table-striped">
              <tr>
                <th>需开启的变量或函数</th>
                <th>要求</th>
                <th>实际状态及建议</th>

              </tr>
              <tr>
                <td>GD 支持</td>
                <td>Update software</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                  </div>
                </td>

              </tr>
              <tr>
                <td>MySQL 支持</td>
                <td>Clean database</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                  </div>
                </td>

              </tr>
              <tr>
                <td>MySqli 支持</td>
                <td>Cron job running</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                  </div>
                </td>

              </tr>

            </table>
          </div>

        </div>
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">目录权限检测</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-bordered table-striped">
              <tr>
                <th>                  目录名</th>
                <th>读取权限</th>
                <th>写入权限</th>

              </tr>
              <tr>
                <td>1.</td>
                <td>Update software</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                  </div>
                </td>

              </tr>
              <tr>
                <td>2.</td>
                <td>Clean database</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                  </div>
                </td>

              </tr>
              <tr>
                <td>3.</td>
                <td>Cron job running</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                  </div>
                </td>

              </tr>
              <tr>
                <td>4.</td>
                <td>Fix and squish bugs</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                  </div>
                </td>

              </tr>
            </table>
          </div>
          <div class="box-footer">
            <!--<button type="submit" class="btn btn-default" onclick="window.history.back()">后退</button>-->
            <button type="submit" class="btn btn-primary pull-right" ng-click="nextStep()">继续</button>
          </div>
        </div>

      </div>
    </div>
  </section>

</div>
@include('install.footer')