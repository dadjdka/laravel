@extends('admin.layout.master')
@section('content')
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="">标签列表</a></li>
            <li><a href="tag/create">新增标签</a></li>
        </ul>
        <form method="post" class="form-horzontal" action="changPassword" role="form">
            {{csrf_field()}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">视频播放器</h3>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="100">编号</th>
                                <th>标签</th>
                                <th width="120">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-default">编辑</a>
                                        <a class="btn btn-default">删除</a>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </form>
@endsection
